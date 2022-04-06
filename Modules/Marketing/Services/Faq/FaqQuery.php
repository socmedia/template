<?php

namespace Modules\Marketing\Services\Faq;

use Modules\Marketing\Entities\Faq;

class FaqQuery extends Faq
{
    /**
     * Get public faqs
     *
     * @return void
     */
    public function getPublicFaqs()
    {
        return Faq::query()
            ->where('is_show', 1)
            ->orderBy('position')
            ->get();
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
        $faqs = Faq::query();

        // Check if props below is true/not empty
        if ($request->is_show) {
            // Search query
            $faqs->isShow($request);
        }

        // Check if props below is true/not empty
        if ($request->category) {
            // Search query
            $faqs->categoryBySlug($request);
        }

        // Check if props below is true/not empty
        if ($request->search) {
            // Search query
            $faqs->search($request);
        }

        return $faqs->sort($request)->paginate($total);
    }
}