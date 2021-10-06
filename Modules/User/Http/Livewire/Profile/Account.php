<?php

namespace Modules\User\Http\Livewire\Profile;

use Livewire\Component;

class Account extends Component
{
    public $email, $phone;

    public function render()
    {
        return view('user::livewire.profile.account');
    }
}