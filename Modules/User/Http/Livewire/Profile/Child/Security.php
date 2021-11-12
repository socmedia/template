<?php

namespace Modules\User\Http\Livewire\Profile\Child;

use Livewire\Component;

class Security extends Component
{
    public $activities, $agreement;

    public function mount()
    {
        if (auth()->user()) {

            $loginActivities = auth()->user()->activities()->where(['activity' => 'login'])->get();
            if ($loginActivities->count() > 0) {
                $this->activities = $loginActivities;
            }
        }
    }

    public function render()
    {
        return view('user::livewire.profile.child.security');
    }
}