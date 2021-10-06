<?php

namespace Modules\User\Http\Livewire\Profile;

use Livewire\Component;

class Security extends Component
{
    public $info, $agreement;

    public function mount()
    {
        if (auth()->user()) {
            $this->info = auth()->user()->login_info ? unserialize(auth()->user()->login_info) : null;
        }
    }

    public function render()
    {
        return view('user::livewire.profile.security');
    }
}