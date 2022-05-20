<?php

namespace Modules\AccessLevel\Http\Livewire\User;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    /**
     * Define personal props in this component
     *
     * @var mixed
     */
    public $user;

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
    public function mount($user)
    {
        $this->user = $user;

        $roles = Role::all();

        // Get role names
        $pluckRoles = array_map(function ($role) {
            return $role['name'];
        }, $roles->toArray());

        $this->roles = $roles;
        $this->pluckRoles = implode(',', $pluckRoles);

        $this->personal['name'] = $user->name;
        $this->personal['gender'] = $user->gender;
        $this->personal['place_of_birth'] = $user->place_of_birth;
        $this->personal['date_of_birth'] = $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : null;
        $this->personal['address'] = $user->address;
        $this->account['email'] = $user->email;
        $this->account['phone'] = $user->phone;
        $this->account['verified'] = $user->email_verified_at;
        $this->access['role'] = $user->getRoleNames()->first();
    }

    public function updated($component, $value)
    {
        //
    }

    /**
     * Update user data
     *
     * @return void
     */
    public function update()
    {
        $rules = [
            'personal.name' => 'required|min:3|max:191',
            'personal.gender' => 'nullable|max:191|in:Male,Female,-',
            'personal.place_of_birth' => 'nullable|max:191',
            'personal.date_of_birth' => 'nullable|date',
            'personal.address' => 'nullable|max:500',
            'account.email' => 'required|email|max:191|' . Rule::unique('users', 'email')->ignore($this->user->id),
            'account.phone' => 'nullable|regex:/^[0-9]+$/|max:15',
            'security.password' => 'nullable|min:8|max:191|confirmed',
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

        // User data
        $data = [
            'name' => $this->personal['name'],
            'email' => $this->account['email'],
            'gender' => $this->personal['gender'],
            'place_of_birth' => $this->personal['place_of_birth'],
            'date_of_birth' => $this->personal['date_of_birth'],
            'address' => $this->personal['address'],
            'phone' => phone($this->account['phone']),
            'email_verified_at' => $this->account['verified'] ? now()->toDateTimeString() : null,
        ];

        // Check if password is not null
        if ($this->security['password']) {
            $data['password'] = bcrypt($this->security['password']);
        }

        // Update user
        $this->user->update($data);

        // Sync user roles
        if ($this->access['role']) {
            $this->user->syncRoles($this->access['role']);
        }

        session()->flash('success', 'Data user berhasil diperbarui.');
    }

    public function render()
    {
        return view('accesslevel::livewire.user.edit');
    }
}