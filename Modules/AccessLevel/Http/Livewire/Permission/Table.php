<?php

namespace Modules\AccessLevel\Http\Livewire\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\AccessLevel\Services\Permission\PermissionQuery;
use Modules\AccessLevel\Services\Permission\TableConfig;
use Modules\AccessLevel\Services\Permission\TableFilterActions;
use Spatie\Permission\Models\Permission;

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
     * Get al permissions
     * Showing permissions data from database
     *
     * @return void
     */
    public function getAll()
    {
        return (new PermissionQuery())->filters((object) [
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
        ], $this->perPage);
    }

    /**
     * Remove existing data from database at permissions table
     *
     * @return void
     */
    public function destroy()
    {
        $permission = Permission::find($this->destroyId);

        if ($permission) {
            $permission->delete();

            // Flash message
            $this->reset('destroyId');
            return session()->flash('success', 'Permission berhasil dihapus.');
        }

        // Flash message
        $this->reset('destroyId');
        return session()->flash('failed', 'Penghapusan permission gagal, karena permission tidak ditemukan.');
    }

    public function render()
    {
        return view('accesslevel::livewire.permission.table', [
            'permissions' => $this->getAll(),
        ]);
    }
}