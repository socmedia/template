<?php

namespace Modules\AccessLevel\Http\Livewire\User;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    /**
     * Define form props in this component
     *
     * @var mixed
     */
    public $user, $name, $email, $password, $password_confirmation, $role;

    /**
     * Define data props
     *
     * @var array
     */
    public $roles, $pluckRoles = [];

    /**
     * Define props before component rendered
     *
     * @param  App\Models\User $user
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

        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->getRoleNames()->first();
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
            'email' => 'required|min:3|max:191|email|' . Rule::unique('users', 'email')->ignore($this->user->id),
            'password' => 'nullable|min:8|max:191|confirmed',
            'role' => 'required|in:' . $this->pluckRoles,
        ];
    }

    /**
     * Update user data
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        // User data
        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        // Check if password is not null
        if ($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        // Update user
        $this->user->update($data);

        // Sync user roles
        if ($this->role) {
            $this->user->syncRoles($this->role);
        }

        session()->flash('success', 'Data user berhasil diperbarui.');
    }

    public function render()
    {
        return view('accesslevel::livewire.user.edit');
    }
}