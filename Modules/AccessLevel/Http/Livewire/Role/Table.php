<?php

namespace Modules\AccessLevel\Http\Livewire\Role;

use App\Contracts\DatabaseTable;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\AccessLevel\Services\Role\RoleQuery;
use Modules\AccessLevel\Services\Role\TableConfig;
use Modules\AccessLevel\Services\Role\TableFilterActions;
use Spatie\Permission\Models\Role;

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
    public $destroyId, $sort = 'created_at', $order = 'desc', $search, $perPage = 10;

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
     * Define props before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->mountDefaultValues();
    }

    /**
     * Get al roles
     * Showing roles data from database
     *
     * @return void
     */
    public function getAll()
    {
        return (new RoleQuery())->filters((object) [
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
        ], $this->perPage);
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