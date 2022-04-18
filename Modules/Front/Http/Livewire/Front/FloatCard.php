<?php

namespace Modules\Front\Http\Livewire\Front;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class FloatCard extends Component
{
    public $tabs = [
        'tracking' => true,
        'shipping_rate' => false,
        'agents' => false,
    ], $isHomePage;

    public function mount($isHomePage)
    {
        $this->updateCitiesCache();
        $this->isHomePage = $isHomePage;
    }

    public function updateCitiesCache()
    {
        if (!cache('cities')) {
            $res = Http::get('https://ica.rosin-group.com/olive/public_api/kota_json');

            $mapped = array_map(function ($array) {
                return (object) $array;
            }, $res->json());

            Cache::remember('cities', 28800, function () use ($mapped) {
                return $mapped;
            });
        }
    }

    public function changeTab($tab)
    {
        if (array_key_exists($tab, $this->tabs)) {

            if ($this->tabs[$tab]) {
                return;
            }

            foreach ($this->tabs as $index => $value) {
                $this->tabs[$index] = false;
            }

            $this->tabs[$tab] = true;
        }

        $this->dispatchBrowserEvent('init-select');
    }

    public function render()
    {
        return view('front::livewire.front.float-card');
    }
}