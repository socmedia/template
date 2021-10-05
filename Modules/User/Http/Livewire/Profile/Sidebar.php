<?php

namespace Modules\User\Http\Livewire\Profile;

use Livewire\Component;

class Sidebar extends Component
{
    public $active;

    public function mount($active)
    {
        $this->active = $active;
    }

    public function changeSidebar($sidebar)
    {
        $this->active = $sidebar;
        $this->emit('activeSidebar', $sidebar);
    }

    public function render()
    {
        return view('user::livewire.profile.sidebar');
    }
}