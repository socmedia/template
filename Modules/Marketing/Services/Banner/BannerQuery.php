<?php

namespace Modules\Marketing\Services\Banner;

use Modules\Marketing\Entities\Banner;

class BannerQuery extends Banner
{
    /**
     * Get public banners
     *
     * @return void
     */
    public function getPublicBanners()
    {
        return Banner::query()
            ->where('is_active', 1)
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
        $banners = Banner::query();

        // Check if props below is true/not empty
        if ($request->is_show) {
            // Search query
            $banners->isShow($request);
        }

        // Check if props below is true/not empty
        if ($request->search) {
            // Search query
            $banners->search($request);
        }

        return $banners->sort($request)->paginate($total);
    }
}