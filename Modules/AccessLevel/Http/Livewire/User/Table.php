<?php

namespace Modules\AccessLevel\Http\Livewire\User;

use App\Contracts\DatabaseTable;
use App\Models\User;
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
            'cell_name' => 'Email',
            'column_name' => 'email',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Terverifikasi',
            'column_name' => 'email_verified_at',
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Role',
            'column_name' => 'user.roles',
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
    public $sort, $order, $role, $search;

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
        'role',
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
        'role' => [
            'query' => null,
            'reset_method' => 'resetRole',
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
        $this->role = request('role');

        $this->filters['search']['query'] = request('search');
        $this->filters['sort']['query'] = [
            request('sort') ?: 'created_at',
            request('order') ?: 'desc',
        ];
        $this->filters['role']['query'] = request('role');

        request()->segment(3) != 'sampah' ? false : $this->onlyTrashed = true;
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
     * Livewire hooks, when search props has been updated
     * This action will be update role props and filters.role.query
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedRole($value)
    {
        $this->role = $value;
        $this->filters['role']['query'] = $value;

        if (!$value) {
            $this->role = null;
            $this->filters['role']['query'] = null;
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
     * Reset filter role method
     * Triggered when the button in the filter section has been clicked
     *
     * @return void
     */
    public function resetRole()
    {
        $this->reset('role');
        $this->filters['role']['query'] = null;
    }

    /**
     * Get al Users
     * Showing Users data from database
     *
     * @return void
     */
    public function getAll()
    {
        $user = User::query();

        // Check if props search is not empty/null
        if ($this->search) {
            // Search condition
            $user->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('email_verified_at', 'like', '%' . $this->search . '%')
                    ->orWhere('created_at', 'like', '%' . $this->search . '%');
            });
        }

        // Check if role is available in the role list
        if ($this->role) {
            // Role condition
            $user->whereHas('roles', function ($query) {
                $query->where('name', $this->role);
            });
        }

        // Check if props below is true/not empty
        if ($this->sort && $this->order) {
            $columns = $this->getTableColumns('Users');

            // Check if column is exist in database table column
            // Handle errors column not found
            if (in_array($this->sort, $columns)) {

                // Check if order like asc or desc
                // Data will only show if column is available and order is available
                if ($this->order == 'asc' || $this->order == 'desc') {
                    $user->orderBy($this->sort, $this->order);
                }

            } else {
                // If column found, will return empty array
                return [];
            }
        }

        // If onlyTrashed props is true
        // System only show trashed data from resource
        if ($this->onlyTrashed) {
            $user->onlyTrashed();
        }

        return $user->paginate();
    }

    /**
     * Restore user from the trash
     *
     * @param  string $id
     * @return void
     */
    public function restore($id)
    {
        $user = User::where('id', $id)->withTrashed()->first();

        if (!$user) {
            return session()->flash('failed', 'User tidak ditemukan.');
        }

        $user->restore();
        return session()->flash('success', 'User berhasil dipulihkan.');
    }

    /**
     * Bring selected user to trash
     *
     * @param  string $id
     * @return void
     */
    public function trash($id)
    {
        $user = User::find($id);
        $user->delete();

        if (!$user) {
            // Flash message
            return session()->flash('failed', 'User tidak ditemukan.');
        }

        // Flash message
        return session()->flash('success', 'User berhasil dipindahkan ke tong sampah.');
    }

    /**
     * Remove existing data from database at Users table
     *
     * @return void
     */
    public function destroy()
    {
        $user = User::where('id', $this->destroyId)->withTrashed()->first();

        if ($user) {
            $user->forceDelete();

            // Flash message
            $this->reset('destroyId');
            return session()->flash('success', 'User berhasil dihapus.');
        }

        // Flash message
        $this->reset('destroyId');
        return session()->flash('failed', 'Penghapusan User gagal, karena tole tidak ditemukan.');
    }

    public function render()
    {
        return view('accesslevel::livewire.user.table', [
            'users' => $this->getAll(),
            'roles' => Role::all(),
        ]);
    }
}