<?php

namespace Modules\Marketing\Services\Testimonial;

use Modules\Marketing\Entities\Testimonial;

class TestimonialQuery extends Testimonial
{
    /**
     * Get public testimonials
     *
     * @return void
     */
    public function getPublicTestimonials()
    {
        return Testimonial::query()
            ->where('is_active', 1)
            ->orderBy('position')
            ->get();
    }

    /**
     * Get last position of testimonials
     *
     * @return void
     */
    public function getLastPosition()
    {
        return Testimonial::query()
            ->getLastPosition()->first();
    }

    /**
     * Filter query
     * Use by calling static method and pass the request on array
     *
     * @param  object $request
     * @param  int $total
     * @return void
     */
    public function filters(object $request, $total = 10)
    {
        $testimonials = Testimonial::query();

        // Check if props below is true/not empty
        if ($request->is_active) {
            // Search query
            $testimonials->isActive($request);
        }

        // Check if props below is true/not empty
        if ($request->search) {
            // Search query
            $testimonials->search($request);
        }

        return $testimonials->sort($request)->paginate($total);
    }
}