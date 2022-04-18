<?php

namespace Modules\Front\Http\Livewire\Front;

use Livewire\Component;
use Modules\Marketing\Services\Testimonial\TestimonialQuery;

class Reviews extends Component
{
    public function getAll()
    {
        return (new TestimonialQuery())->getPublicTestimonials();
    }

    public function render()
    {
        return view('front::livewire.front.reviews', [
            'reviews' => $this->getAll(),
        ]);
    }
}