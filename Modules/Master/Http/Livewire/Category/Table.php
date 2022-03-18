<?php

namespace Modules\Master\Http\Livewire\Category;

use App\Contracts\DatabaseTable;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Master\Entities\Category;

class Table extends Component
{
    use WithPagination, DatabaseTable;

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
    public $sort, $order, $search;

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
        'search',
        'page',
    ];

    /**
     * Define filters for filter component
     *
     * @var array
     */
    public $filters = [
        'search' => [
            'query' => null,
            'reset_method' => 'resetSearch',
        ],
        'sort' => [
            'query' => [null, null],
            'reset_method' => 'resetFilter',
        ],
    ];

    /**
     * Define props before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->sort = request('sort') ?: 'created_at';
        $this->order = request('order') ?: 'desc';
        $this->search = request('search');

        $this->filters['search']['query'] = request('search');
        $this->filters['sort']['query'] = [
            request('sort') ?: 'created_at',
            request('order') ?: 'desc',
        ];
        // $this->filters['sort']['query'] = [request('sort'), request('order')];

        request()->segment(4) != 'sampah' ? false : $this->onlyTrashed = true;
    }

    /**
     * Handling query string
     * If table header sorting is triggered, this method will be run
     *
     * @param  string $column
     * @return void
     */
    public function sort($column)
    {
        $this->sort = $column;

        if (!$this->order) {
            $this->order = 'asc';
        } elseif ($this->order == 'asc') {
            $this->order = 'desc';
        } elseif ($this->order == 'desc') {
            $this->sort = null;
            $this->order = null;
        }

        $this->filters['sort']['query'] = [$this->sort, $this->order];
    }

    /**
     * Livewire hooks, when search props has been updated
     * This action will be update search props and filters.search.query
     *
     * @param  string $value
     * @return void
     */
    public function updatedSearch($value)
    {
        $this->resetPage();
        $this->search = $value;
        $this->filters['search']['query'] = $value;
    }

    /**
     * Reset filter sort method
     * Triggered when the button in the filter section has been clicked
     *
     * @return void
     */
    public function resetFilter()
    {
        $this->reset('sort', 'order');
        $this->filters['sort']['query'] = [null, null];
    }

    /**
     * Reset filter search method
     * Triggered when the button in the filter section has been clicked
     *
     * @return void
     */
    public function resetSearch()
    {
        $this->reset('search');
        $this->filters['search']['query'] = null;
    }

    /**
     * Get al Categories
     * Showing Categories data from database
     *
     * @return void
     */
    public function getAll()
    {
        $categories = Category::query();

        // Check if props search is not empty/null
        if ($this->search) {
            // Search condition
            $categories->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug_name', 'like', '%' . $this->search . '%')
                    ->orWhere('table_reference', 'like', '%' . $this->search . '%');
            });
        }

        // Check if props below is true/not empty
        if ($this->sort && $this->order) {
            $columns = $this->getTableColumns('categories');

            // Check if column is exist in database table column
            // Handle errors column not found
            if (in_array($this->sort, $columns)) {

                // Check if order like asc or desc
                // Data will only show if column is available and order is available
                if ($this->order == 'asc' || $this->order == 'desc') {
                    $categories->orderBy($this->sort, $this->order);
                }

            } else {
                // If column found, will return empty array
                return [];
            }
        }

        // If onlyTrashed props is true
        // System only show trashed data from resource
        if ($this->onlyTrashed) {
            $categories->onlyTrashed();
        }

        return $categories->paginate();
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

    public function render()
    {
        return view('master::livewire.category.table', [
            'categories' => $this->getAll(),
        ]);
    }
}
