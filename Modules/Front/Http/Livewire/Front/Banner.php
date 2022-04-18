<?php

namespace Modules\Front\Http\Livewire\Front;

use Livewire\Component;
use Modules\Marketing\Services\Banner\BannerQuery;

class Banner extends Component
{
    public function getAll()
    {
        return (new BannerQuery())->getPublicBanners();
    }

    public function render()
    {
        return view('front::livewire.front.banner', [
            'banners' => $this->getAll(),
        ]);
    }
}