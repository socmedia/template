<?php

namespace Modules\Lead\Services\Lead;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\Lead\Entities\Lead;

class LeadQuery
{
    /**
     * Filter query
     * Use by calling static method and pass the request on array
     *
     * @param  object $request
     * @param  int $total
     * @return void
     */
    public function filters(object $request, $total = 10): PaginationPaginator
    {
        $leads = Lead::query();

        // Check if props below is true/not empty
        if ($request->category) {
            $leads->category($request);
        }

        // Check if props below is true/not empty
        if ($request->status) {
            $leads->status($request);
        }

        // Check if props below is true/not empty
        if ($request->is_readed) {
            $leads->readStatus($request);
        }

        // Check if props below is true/not empty
        if ($request->search) {
            $leads->search($request);
        }

        return $leads->sort($request)->paginate($total);
    }
}
