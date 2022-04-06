<?php

namespace Modules\AccessLevel\Http\Livewire\User;

use App\Contracts\DatabaseTable;
use App\Models\User;
use App\Services\ImageService;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\AccessLevel\Services\User\TableConfig;
use Modules\AccessLevel\Services\User\TableFilterActions;
use Modules\AccessLevel\Services\User\UserQuery;
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
    public $sort = 'created_at', $order = 'desc', $role, $search, $email_verified, $perPage = 10;

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
        'email_verified',
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
     * Get al Users
     * Showing Users data from database
     *
     * @return void
     */
    public function getAll()
    {
        return (new UserQuery())->filters((object) [
            'role' => $this->role,
            'search' => $this->search,
            'email_verified' => $this->email_verified,
            'onlyTrashed' => $this->onlyTrashed,
            'sort' => $this->sort,
            'order' => $this->order,
        ], $this->perPage);
    }

    /**
     * Restore user from the trash
     *
     * @param  string $id
     * @return void
     */
    public function restore($id)
    {
        $user = (new UserQuery())->findWithTrashed('id', $id);

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
        $user = (new UserQuery())->findWithTrashed('id', $this->destroyId);

        if ($user) {
            if ($user->avatar_url) {
                $path = explode('/', $user->avatar_url);
                if (count($path) >= 4) {
                    $shortPath = implode('/', array_slice($path, 3, 2));
                    (new ImageService)->removeImage('images', $shortPath);
                }

            }

            $user->forceDelete();

            // Flash message
            $this->reset('destroyId');
            return session()->flash('success', 'User berhasil dihapus.');
        }

        // Flash message
        $this->reset('destroyId');
        return session()->flash('failed', 'Penghapusan User gagal, karena user tidak ditemukan.');
    }

    public function render()
    {
        return view('accesslevel::livewire.user.table', [
            'users' => $this->getAll(),
            'roles' => Role::all(),
        ]);
    }
}