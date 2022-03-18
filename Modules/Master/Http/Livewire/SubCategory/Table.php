<?php

namespace Modules\Master\Http\Livewire\SubCategory;

use App\Contracts\DatabaseTable;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Master\Entities\Category;
use Modules\Master\Entities\SubCategory;

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
    public $sort, $order, $search, $category;

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
     * Define filters for filter component
     *
     * @var array
     */
    public $filters = [
        'search' => [
            'query' => null,
            'reset_method' => 'resetSearch',
        ],
        'category' => [
            'query' => null,
            'reset_method' => 'resetCategory',
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
        $this->search = request('search');
        $this->category = request('category');

        $this->filters['category']['query'] = request('category');
        $this->filters['search']['query'] = request('search');
        $this->filters['sort']['query'] = [request('sort'), request('order')];

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
     * Livewire hooks, when search props has been updated
     * This action will be update category props and filters.category.query
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedCategory($value)
    {
        $this->resetPage();
        $this->category = $value;
        $this->filters['category']['query'] = $value;

        if (!$value) {
            $this->category = null;
            $this->filters['category']['query'] = null;
        }
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
     * Reset filter category method
     * Triggered when the button in the filter section has been clicked
     *
     * @return void
     */
    public function resetCategory()
    {
        $this->reset('category');
        $this->filters['category']['query'] = null;
    }

    /**
     * Get all Sub Categories
     * Showing Sub Categories data from database
     *
     * @return void
     */
    public function getAll()
    {
        $sub_categories = SubCategory::query()->with(['category']);

        // Check if props search is not empty/null
        if ($this->search) {
            // Search condition
            $sub_categories->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug_name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        // Check if category is available in the category list
        if ($this->category) {
            // Class condition
            $sub_categories->whereHas('category', function ($query) {
                $query->where('name', $this->category);
            });
        }

        // Check if props below is true/not empty
        if ($this->sort && $this->order) {
            $columns = $this->getTableColumns('sub_categories');

            // Check if column is exist in database table column
            // Handle errors column not found
            if (in_array($this->sort, $columns)) {

                // Check if order like asc or desc
                // Data will only show if column is available and order is available
                if ($this->order == 'asc' || $this->order == 'desc') {
                    $sub_categories->orderBy($this->sort, $this->order);
                }

            } else {
                // If column found, will return empty array
                return [];
            }
        }

        // If onlyTrashed props is true
        // System only show trashed data from resource
        if ($this->onlyTrashed) {
            $sub_categories->onlyTrashed();
        }

        return $sub_categories->paginate();
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

    public function render()
    {
        return view('master::livewire.sub-category.table', [
            'sub_categories' => $this->getAll(),
            'categories' => Category::all(),
        ]);
    }
}
