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
     * Define personal props in this component
     *
     * @var mixed
     */
    public $personal = [
        'name' => null,
        'gender' => null,
        'place_of_birth' => null,
        'date_of_birth' => null,
        'address' => null,
    ];

    /**
     * Define role props in this component
     *
     * @var array
     */
    public $access = [
        'role' => null,
    ];

    /**
     * Define account props in this component
     *
     * @var array
     */
    public $account = [
        'email' => null,
        'phone' => null,
        'verified' => false,
    ];

    /**
     * Define security props in this component
     *
     * @var array
     */
    public $security = [
        'password' => null,
        'password_confirmation' => null,
    ];

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

    public function updated($component, $value)
    {
        //
    }

    /**
     * Store new user to database
     *
     * @return void
     */
    public function store()
    {
        $rules = [
            'personal.name' => 'required|min:3|max:191',
            'personal.gender' => 'nullable|max:191|in:Male,Female,-',
            'personal.place_of_birth' => 'nullable|max:191',
            'personal.date_of_birth' => 'nullable|date',
            'personal.address' => 'nullable|max:500',
            'account.email' => 'required|email|max:191|' . Rule::unique('users', 'email'),
            'account.phone' => 'nullable|regex:/^[0-9]+$/|max:15',
            'security.password' => 'required|min:8|max:191|confirmed',
            'access.role' => 'required|in:' . $this->pluckRoles,
        ];

        $attributes = [
            'personal.name' => 'name',
            'personal.gender' => 'gender',
            'personal.place_of_birth' => 'place of birth',
            'personal.date_of_birth' => 'date of birth',
            'personal.address' => 'address',
            'account.email' => 'email',
            'account.phone' => 'phone',
            'security.password' => 'password',
            'access.role' => 'role',
        ];

        $this->validate($rules, [], $attributes);

        $id = Generate::ID(32);

        // Get user avatar by initial
        $img = Http::get('https://ui-avatars.com/api/?format=png&name=' . $this->personal['name'] . '&background=f1f1f1&color=636363');

        // Create new user
        $user = User::create([
            'id' => $id,
            'name' => $this->personal['name'],
            'email' => $this->account['email'],
            'gender' => $this->personal['gender'],
            'place_of_birth' => $this->personal['place_of_birth'],
            'date_of_birth' => $this->personal['date_of_birth'],
            'address' => $this->personal['address'],
            'phone' => '+62' . phone($this->account['phone']),
            'email_verified_at' => now()->toDateTimeString(),
            'avatar_url' => 'data:image/png;base64,' . base64_encode($img),
            'password' => bcrypt($this->security['password']),
        ]);

        // Create  default user setting
        UsersSetting::create([
            'user_id' => $id,
            'lang' => 'en',
        ]);

        // Set user role
        $user->assignRole($this->access['role']);

        // Reset all props
        $this->reset('personal', 'access', 'account', 'security');

        // Flash message
        session()->flash('success', 'User berhasil ditambahkan.');
    }

    public function render()
    {
        return view('accesslevel::livewire.user.create');
    }
}