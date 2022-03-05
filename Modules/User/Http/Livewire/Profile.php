<?php

namespace Modules\User\Http\Livewire;

use App\Services\ImageService;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    /**
     * Define personal props in this component
     *
     * @var mixed
     */
    public $user;
    public $avatar;
    public $personal = [
        'name' => null,
        'gender' => null,
        'place_of_birth' => null,
        'date_of_birth' => null,
        'address' => null,
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
     * Define data props
     *
     * @var array
     */
    public $dealers, $pluckDealers;
    public $dealersGroup, $pluckDealersGroup;

    /**
     * Define props before component rendered
     *
     * @return void
     */
    public function mount($user)
    {
        $this->user = $user;
        $this->personal['name'] = $user->name;
        $this->personal['gender'] = $user->gender;
        $this->personal['place_of_birth'] = $user->place_of_birth;
        $this->personal['date_of_birth'] = $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : null;
        $this->personal['address'] = $user->address;
        $this->account['email'] = $user->email;
        $this->account['phone'] = $user->phone;
        $this->account['verified'] = $user->email_verified_at;
    }

    /**
     * Update user data
     *
     * @return void
     */
    public function update()
    {
        $rules = [
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg|max:256',
            'personal.name' => 'required|min:3|max:191',
            'personal.gender' => 'nullable|max:191|in:Male,Female,-',
            'personal.place_of_birth' => 'nullable|max:191',
            'personal.date_of_birth' => 'nullable|date',
            'personal.address' => 'nullable|max:500',
            'account.email' => 'required|email|max:191|' . Rule::unique('users', 'email')->ignore($this->user->id),
            'account.phone' => 'nullable|regex:/^[0-9]+$/|max:15',
            'security.password' => 'nullable|min:8|max:191|confirmed',
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
        ];

        $this->validate($rules, [], $attributes);

        $service = new ImageService();
        $user = user();

        // User data
        $data = [
            'name' => $this->personal['name'],
            'email' => $this->account['email'],
            'gender' => $this->personal['gender'],
            'place_of_birth' => $this->personal['place_of_birth'],
            'date_of_birth' => $this->personal['date_of_birth'],
            'address' => $this->personal['address'],
            'phone' => phone($this->account['phone']) ?: null,
        ];

        if ($this->avatar) {
            // remove old avatar
            if ($user->avatar_url) {
                $path = explode('/', $user->avatar_url);
                if (count($path) >= 4) {
                    $shortPath = implode('/', array_slice($path, 3, 2));
                    $service->removeImage('images', $shortPath);
                }
            }

            $data['avatar_url'] = $service->storeImage($this->avatar);
            $this->dispatchBrowserEvent('avatar-changed', ['url' => $user->avatar_url]);
        }

        // Check if password is not null
        if ($this->security['password']) {
            $data['password'] = bcrypt($this->password);
        }

        // Update user
        $this->user->update($data);

        return session()->flash('success', 'Data user berhasil diperbarui.');
    }

    public function render()
    {
        return view('user::livewire.profile');
    }
}