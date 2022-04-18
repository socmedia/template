<?php

namespace Modules\Post\Services\Post;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\Post\Entities\Post;

class PostQuery
{
    /**
     * Get popular posts
     * used by calling static method and pass string time
     * In: [this-week, this-month, this-year ]
     *
     * @param  string $postTypeName
     * @param  string $time in [this-week, this-month, this-year]
     * @param  int $total
     * @return void
     */
    public function getPopularPosts(?string $postTypeName = null, ?string $time = null, $total = 5)
    {
        $posts = Post::query();

        $posts->published()
            ->where(function ($post) {
                $post->where('number_of_views', '>', 50)
                    ->orWhere('number_of_shares', '>', 20);
            });

        if ($time == 'this-week') {
            $posts->whereBetween('created_at', [
                now()->startOfWeek()->toDateString(),
                now()->endOfWeek()->toDateString(),
            ]);
        } elseif ($time == 'this-month') {
            $posts->whereBetween('created_at', [
                now()->startOfMonth()->toDateTimeString(),
                now()->endOfMonth()->toDateTimeString(),
            ]);
        } elseif ($time == 'this-year') {
            $posts->whereBetween('created_at', [
                now()->startOfYear()->toDateTimeString(),
                now()->endOfYear()->toDateTimeString(),
            ]);
        }

        if ($postTypeName) {
            $posts->type((object) [
                'type' => $postTypeName,
            ]);
        }

        return $posts->orderBy('number_of_views', 'desc')
            ->limit($total)->get();
    }

    /**
     * Get public blogs
     * Use by calling static method and pass the request on array
     *
     * @param  object $request
     * @param  int $total
     * @return void
     */
    public function publicPosts(object $request, $total = 10): PaginationPaginator
    {
        $posts = Post::with('writer')->published();

        // Check if props below is true/not empty
        if ($request->search) {
            $posts->search($request);
        }

        // Check if props below is true/not empty
        if ($request->type) {
            $posts->type($request);
        }

        // Check if props below is true/not empty
        if ($request->tag) {
            $posts->tag($request);
        }

        // Check if props below is true/not empty
        if ($request->category) {
            $posts->category($request);
        }

        return $posts->orderBy('created_at', 'desc')
            ->paginate($total);
    }

    /**
     * Show public post
     * Used by calling static metho and pass string slug title
     *
     * @param  string $slug_title
     * @return void
     */
    public function showPublicPost(string $slug_title)
    {
        return Post::where('slug_title', $slug_title)
            ->published()
            ->firstOrFail();
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
        $posts = Post::query();

        // Check if props below is true/not empty
        if ($request->search) {
            $posts->search($request);
        }

        // Check if props below is true/not empty
        if ($request->category) {
            $posts->category($request);
        }

        // Check if props below is true/not empty
        if ($request->type) {
            $posts->type($request);
        }

        // Check if props below is true/not empty
        if ($request->status) {

            if ($request->status == 'published') {
                $posts->published();
            }

            if ($request->status == 'draft') {
                $posts->draft();
            }

            if ($request->status == 'archived') {
                $posts->archived();
            }

        }

        return $posts->sort($request)->paginate($total);
    }
}