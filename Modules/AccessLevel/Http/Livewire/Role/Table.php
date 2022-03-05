<?php

namespace Modules\AccessLevel\Http\Livewire\Role;

use App\Contracts\DatabaseTable;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

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
            'cell_name' => 'Guard',
            'column_name' => 'guard_name',
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Dibuat Pada',
            'column_name' => 'created_at',
            'sortable' => true,
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
    public $destroyId, $sort, $order, $search;

    /**
     * Define livewire query string
     *
     * @var array
     */
    protected $queryString = [
        'sort',
        'order',
        'search',
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
        $this->sort = request('sort');
        $this->order = request('order');
        $this->search = request('search');

        $this->filters['search']['query'] = request('search');
        $this->filters['sort']['query'] = [request('sort'), request('order')];
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
     * Get al roles
     * Showing roles data from database
     *
     * @return void
     */
    public function getAll()
    {
        $role = Role::query();

        // Check if props search is not empty/null
        if ($this->search) {
            // Search condition
            $role->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('guard_name', 'like', '%' . $this->search . '%')
                    ->orWhere('created_at', 'like', '%' . $this->search . '%');
            });
        }

        // Check if props below is true/not empty
        if ($this->sort && $this->order) {
            $columns = $this->getTableColumns('roles');

            // Check if column is exist in database table column
            // Handle errors column not found
            if (in_array($this->sort, $columns)) {

                // Check if order like asc or desc
                // Data will only show if column is available and order is available
                if ($this->order == 'asc' || $this->order == 'desc') {
                    $role->orderBy($this->sort, $this->order);
                }

            } else {
                // If column found, will return empty array
                return [];
            }
        }

        return $role->paginate();
    }

    /**
     * Remove existing data from database at roles table
     *
     * @return void
     */
    public function destroy()
    {
        $role = Role::find($this->destroyId);

        if ($role) {
            $role->delete();

            // Flash message
            $this->reset('destroyId');
            return session()->flash('success', 'Role berhasil dihapus.');
        }

        // Flash message
        $this->reset('destroyId');
        return session()->flash('failed', 'Penghapusan role gagal, karena role tidak ditemukan.');
    }

    public function render()
    {
        return view('accesslevel::livewire.role.table', [
            'roles' => $this->getAll(),
        ]);
    }
}
