<?php

namespace Modules\AccessLevel\Http\Livewire\User;

use App\Models\User;
use App\Utillities\Generate;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\User\Models\Entities\UsersSetting;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    /**
     * Define form props in this component
     *
     * @var mixed
     */
    public $name, $email, $password, $password_confirmation, $role;

    /**
     * Define data props
     *
     * @var array
     */
    public $roles, $pluckRoles = [];

    /**
     * Define props before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $roles = Role::all();

        // Get role names
        $pluckRoles = array_map(function ($role) {
            return $role['name'];
        }, $roles->toArray());

        $this->roles = $roles;
        $this->pluckRoles = implode(',', $pluckRoles);
    }

    /**
     * Form validation rules
     *
     * @return void
     */
    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'email' => 'required|email|max:191|' . Rule::unique('users', 'email'),
            'password' => 'required|min:8|max:191|confirmed',
            'role' => 'required|in:' . $this->pluckRoles,
        ];
    }

    /**
     * Store new user to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $id = Generate::ID(32);

        // Get user avatar by initial
        $img = Http::get('https://ui-avatars.com/api/?format=png&name=' . $this->name . '&background=f1f1f1&color=636363');

        // Create new user
        $user = User::create([
            'id' => $id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => now()->toDateTimeString(),
            'avatar_url' => 'data:image/png;base64,' . base64_encode($img),
            'password' => bcrypt($this->password),
        ]);

        // Create  default user setting
        UsersSetting::create([
            'user_id' => $id,
            'lang' => 'en',
        ]);

        // Set user role
        $user->assignRole($this->role);

        // Reset all props
        $this->reset('name', 'email', 'password', 'role');

        // Flash message
        session()->flash('success', 'Role berhasil ditambahkan.');
    }

    public function render()
    {
        return view('accesslevel::livewire.user.create');
    }
}