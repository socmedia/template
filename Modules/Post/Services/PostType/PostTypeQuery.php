<?php

namespace Modules\Post\Services\PostType;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\Post\Entities\PostType;

class PostTypeQuery
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
        $posts = PostType::query();

        // Check if props below is true/not empty
        if ($request->search) {
            $posts->search($request);
        }

        return $posts->sort($request)->paginate($total);
    }
}