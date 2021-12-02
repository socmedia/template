<?php

namespace Modules\AppSetting\Http\Livewire\Settings;

use Livewire\Component;

class Main extends Component
{
    public $step = '', $sidebars = [], $active;

    public function mount()
    {
        //
    }

    public function render()
    {
        return view('appsetting::livewire.settings.main');
    }
}