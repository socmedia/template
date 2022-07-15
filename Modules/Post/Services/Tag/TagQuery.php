<?php

namespace Modules\Post\Services\Tag;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\Post\Entities\Tag;

class TagQuery
{
    public function getFeaturedTags($total = 5)
    {
        $tag = Tag::where('is_featured', 1)->where('hot_topic', 1);
        return $tag->limit($total)->get();
    }

    public function findBySlug($slug)
    {
        $tag = Tag::where('slug_name', $slug);
        return $tag->first();
    }

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
        $tags = Tag::query();

        // Check if props below is true/not empty
        if ($request->search) {
            $tags->search($request);
        }

        return $tags->sort($request)->paginate($total);
    }
}