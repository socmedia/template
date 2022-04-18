<?php

namespace Modules\Front\Http\Livewire\Front;

use Livewire\Component;
use Modules\Post\Services\Post\PostQuery;

class Promos extends Component
{
    public function getAll()
    {
        return (new PostQuery())->publicPosts((object) [
            'type' => 'promo',
            'search' => null,
            'category' => null,
            'tag' => null,
            'order' => null,
            'sort' => null,
        ]);
    }

    public function render()
    {
        return view('front::livewire.front.promos', [
            'promos' => $this->getAll(),
        ]);
    }
}