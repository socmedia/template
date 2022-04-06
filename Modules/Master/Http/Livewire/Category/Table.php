<?php

namespace Modules\Master\Http\Livewire\Category;

use App\Contracts\DatabaseTable;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Master\Entities\Category;
use Modules\Master\Services\Category\CategoryQuery;
use Modules\Master\Services\Category\TableConfig;
use Modules\Master\Services\Category\TableFilterActions;

class Table extends Component
{
    use WithPagination, DatabaseTable, TableConfig, TableFilterActions;

    /**
     * Define table headers
     *
     * @var array
     */
    public $headers = [
        [
            'cell_name' => 'Nama',
            'column_name' => 'name',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Slug',
            'column_name' => 'slug_name',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Tabel Referensi',
            'column_name' => 'table_reference',
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Posisi',
            'column_name' => 'position',
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Aksi',
            'column_name' => null,
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
    ];

    /**
     * Devine props for livewire query string
     *
     * @var mixed
     */
    public $sort = 'position', $order = 'asc', $table_reference, $search, $destroyId, $onlyTrashed = false, $perPage = 10;

    /**
     * Define livewire query string
     *
     * @var array
     */
    protected $queryString = [
        'table_reference',
        'sort',
        'order',
        'search',
    ];

    /**
     * Define props before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->mountDefaultValues();
    }

    /**
     * Get al Categories
     * Showing Categories data from database
     *
     * @return void
     */
    public function getAll()
    {
        return (new CategoryQuery())->filters((object) [
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
            'table_reference' => $this->table_reference,
            'onlyTrashed' => $this->onlyTrashed,
        ], $this->perPage);
    }

    /**
     * Restore categories from the trash
     *
     * @param  string $id
     * @return void
     */
    public function restore($id)
    {
        $category = Category::where('id', $id)->withTrashed()->first();

        if (!$category) {
            return session()->flash('failed', 'Kategori tidak ditemukan.');
        }

        $category->restore();
        return session()->flash('success', 'Kategori berhasil dipulihkan.');
    }

    /**
     * Bring selected category to trash
     *
     * @param  string $id
     * @return void
     */
    public function trash($id)
    {
        $category = Category::find($id);
        $category->delete();

        if (!$category) {
            // Flash message
            return session()->flash('failed', 'Kategori tidak ditemukan.');
        }

        // Flash message
        return session()->flash('success', 'Kategori berhasil dipindahkan ke tong sampah.');
    }

    /**
     * Remove existing data from database at categories table
     *
     * @return void
     */
    public function destroy()
    {
        $category = Category::where('id', $this->destroyId)->withTrashed()->firstOrFail();

        if ($category) {
            $category->forceDelete();

            // Flash message
            $this->reset('destroyId');
            return session()->flash('success', 'Kategori berhasil dihapus.');
        }

        // Flash message
        $this->reset('destroyId');
        return session()->flash('failed', 'Penghapusan kategori gagal, karena kategori tidak ditemukan.');
    }

    /**
     * Update banner position while drag n drop
     *
     * @param  mixed $list
     * @return void
     */
    public function updateOrder($list)
    {
        foreach ($list as $item) {
            Category::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }
    }

    public function render()
    {
        return view('master::livewire.category.table', [
            'categories' => $this->getAll(),
            'tableReferences' => (new CategoryQuery())->getTableReferences(),
        ]);
    }
}