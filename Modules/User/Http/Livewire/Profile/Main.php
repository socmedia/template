<?php

namespace Modules\User\Http\Livewire\Profile;

use Livewire\Component;

class Main extends Component
{
    public $active = 'overview';

    protected $listeners = [
        'activeSidebar',
    ];

    public function activeSidebar($sidebar)
    {
        $this->active = $sidebar;
    }

    public function render()
    {
        return view('user::livewire.profile.main');
    }
}