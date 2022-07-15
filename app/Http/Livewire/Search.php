<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Front\Entities\Search as EntitiesSearch;

class Search extends Component
{
    public function getMostSearch()
    {
        return EntitiesSearch::query()->orderBy('total', 'desc')->limit(10)->get();
    }

    public function render()
    {
        return view('livewire.search', [
            'searches' => $this->getMostSearch(),
        ]);
    }
}
