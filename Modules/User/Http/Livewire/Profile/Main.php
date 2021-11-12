<?php

namespace Modules\User\Http\Livewire\Profile;

use Livewire\Component;

class Main extends Component
{
    public $sub = 'overview';

    protected $listeners = [
        'activeSidebar',
    ];

    protected $queryString = [
        'sub',
    ];

    public function activeSidebar($sidebar)
    {
        $this->sub = $sidebar;
    }

    public function render()
    {
        return view('user::livewire.profile.main');
    }
}