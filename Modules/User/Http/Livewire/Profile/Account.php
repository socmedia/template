<?php

namespace Modules\User\Http\Livewire\Profile;

use Livewire\Component;

class Account extends Component
{
    public $user, $email, $areaCode = '+62', $phone;

    public function mount()
    {
        $this->user = user();
        $this->email = user('email');
        $this->phone = user('phone');
    }

    public function saveAccount()
    {
        $this->user->update([
            'email' => $this->email,
            'area_code' => $this->areaCode,
            'phone' => $this->phone,
        ]);

        session()->flash('success', 'Your account updated successfully.');
    }

    public function render()
    {
        return view('user::livewire.profile.account');
    }
}