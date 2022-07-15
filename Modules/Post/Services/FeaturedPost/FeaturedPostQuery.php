<?php

namespace Modules\Post\Services\FeaturedPost;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\Post\Entities\FeaturedPost;

class FeaturedPostQuery extends FeaturedPost
{
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
        $featuredposts = FeaturedPost::query();

        if ($request->search) {
            $featuredposts->search($request);
        }

        return $featuredposts->paginate($total);
    }
}