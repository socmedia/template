<?php

namespace Modules\User\Http\Livewire\Profile\Child;

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
        $this->emitTo('user::profile.main', 'activeSidebar', $sidebar);
    }

    public function render()
    {
        return view('user::livewire.profile.child.sidebar');
    }
}