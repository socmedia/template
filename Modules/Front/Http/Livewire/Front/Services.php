<?php

namespace Modules\Front\Http\Livewire\Front;

use Livewire\Component;
use Modules\Service\Entities\Service;

class Services extends Component
{
    public $isHomePage;

    public function mount($isHomePage)
    {
        $this->isHomePage = $isHomePage;
    }

    public function getAll()
    {
        return Service::orderBy('position')->get();
    }

    public function render()
    {
        return view('front::livewire.front.services', [
            'services' => $this->getAll(),
        ]);
    }
}