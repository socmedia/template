<?php

namespace Modules\Master\Http\Livewire\SubCategory;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Master\Entities\Category;
use Modules\Master\Entities\SubCategory;
use Modules\Master\Services\SubCategory\SubCategoryQuery;
use Modules\Master\Services\SubCategory\TableConfig;
use Modules\Master\Services\SubCategory\TableFilterActions;

class Table extends Component
{
    use WithPagination, TableConfig, TableFilterActions;

    /**
     * Define table headers
     *
     * @var array
     */
    public $headers = [
        [
            'cell_name' => 'Kategori',
            'column_name' => 'sub-category.category',
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
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
            'cell_name' => 'Induk',
            'column_name' => 'parent',
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
            'cell_name' => 'Total Child',
            'column_name' => null,
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
    public $sort = 'position', $order = 'asc', $search, $category, $perPage = 10, $childs, $modalTitle;

    /**
     * Define component main props
     *
     * @var bool
     */
    public $destroyId, $onlyTrashed = false;

    /**
     * Define livewire query string
     *
     * @var array
     */
    protected $queryString = [
        'sort',
        'order',
        'category',
        'search',
        'page',
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
     * Get all Sub Categories
     * Showing Sub Categories data from database
     *
     * @return void
     */
    public function getAll()
    {
        return (new SubCategoryQuery())->filters((object) [
            'search' => $this->search,
            'category' => $this->category,
            'sort' => $this->sort,
            'order' => $this->order,
            'onlyTrashed' => $this->onlyTrashed,
        ], $this->perPage);
    }

    public function show($id)
    {
        $this->childs = (new SubCategoryQuery())->getChilds((object) [
            'parent' => $id,
        ]);

        $sub_category = SubCategory::find($id);
        $this->modalTitle = $sub_category ? $sub_category->name : null;
    }

    public function resetModal()
    {
        $this->modalTitle = null;
        $this->childs = null;
    }

    /**
     * Restore sub_category from the trash
     *
     * @param  string $id
     * @return void
     */
    public function restore($id)
    {
        $sub_category = SubCategory::where('id', $id)->withTrashed()->first();

        if (!$sub_category) {
            return session()->flash('failed', 'Sub Kategori tidak ditemukan.');
        }

        $sub_category->restore();
        return session()->flash('success', 'Sub Kategori berhasil dipulihkan.');
    }

    /**
     * Bring selected sub_category to trash
     *
     * @param  string $id
     * @return void
     */
    public function trash($id)
    {
        $sub_category = SubCategory::find($id);
        $sub_category->delete();

        if (!$sub_category) {
            // Flash message
            return session()->flash('failed', 'Sub Kategori tidak ditemukan.');
        }

        // Flash message
        return session()->flash('success', 'Sub Kategori berhasil dipindahkan ke tong sampah.');
    }

    /**
     * Remove existing data from database at Sub Categories table
     *
     * @return void
     */
    public function destroy()
    {
        $sub_category = SubCategory::where('id', $this->destroyId)->withTrashed()->firstOrFail();

        if ($sub_category) {
            $sub_category->forceDelete();

            // Flash message
            $this->reset('destroyId');
            return session()->flash('success', 'Sub Kategori berhasil dihapus.');
        }

        // Flash message
        $this->reset('destroyId');
        return session()->flash('failed', 'Penghapusan sub kategori gagal, karena sub kategori tidak ditemukan.');
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
            SubCategory::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }

        $sub_category = SubCategory::where('name', $this->modalTitle)->first();
        $this->childs = (new SubCategoryQuery())->getChilds((object) [
            'parent' => $sub_category ? $sub_category->id : null,
        ]);

    }

    public function render()
    {
        return view('master::livewire.sub-category.table', [
            'sub_categories' => $this->getAll(),
            'categories' => Category::all(),
        ]);
    }
}