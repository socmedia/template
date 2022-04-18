<?php

namespace Modules\Service\Services\Service;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\Service\Entities\Service;

class ServiceQuery extends Service
{
    /**
     * Get last service position
     *
     * @return void
     */
    public function getLastPosition()
    {
        $service = Service::query();
        return $service->getLastPosition()->first();
    }

    /**
     * Filter query
     * Use by calling static method and pass the request on array
     *
     * @param  object $request
     * @param  int $total
     * @return void
     */
    public function filters(object $request, int $total = 10): PaginationPaginator
    {
        $categories = Service::query();

        // Check if props below is true/not empty
        if ($request->search) {
            $categories->search($request);
        }

        return $categories->sort($request)->paginate($total);
    }
};