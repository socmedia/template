<?php

namespace Modules\Post\Services\Post;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\Post\Entities\Post;

class PostQuery
{
    /**
     * Get popular posts
     * used by calling static method and pass string
     * In: [this-week, this-month, this-year ]
     *
     * @param  array $request
     * @param  int $total
     * @return void
     */
    public function getPopularPosts(array $request, $total = 5, $time = null)
    {
        $posts = Post::query()->withCount('views')->published();

        if (array_key_exists('type', $request)) {
            if ($request['type']) {
                $posts->type((object) [
                    'type' => $request['type'],
                ]);
            }
        }

        if (array_key_exists('category', $request)) {
            if ($request['category']) {
                $posts->category((object) [
                    'category' => $request['category'],
                ]);
            }
        }

        if ($time == 'this-week') {
            $posts->whereBetween('published_at', [
                now()->startOfWeek()->toDateString(),
                now()->endOfWeek()->toDateString(),
            ]);
        } elseif ($time == 'this-month') {
            $posts->whereBetween('published_at', [
                now()->startOfMonth()->toDateTimeString(),
                now()->endOfMonth()->toDateTimeString(),
            ]);
        } elseif ($time == 'this-year') {
            $posts->whereBetween('published_at', [
                now()->startOfYear()->toDateTimeString(),
                now()->endOfYear()->toDateTimeString(),
            ]);
        }

        /** OLD QUERY */
        // $posts->where(function ($post) {
        //     $post->has('views', '>=', 20)
        //         ->orWhere('number_of_shares', '>=', 20);
        // });

        return $posts->orderBy('views_count', 'desc')
            ->limit($total)->get();
    }

    public function relatedPosts(array $tags, $total = 5)
    {
        $posts = Post::query()->published();

        $posts->where(function ($query) use ($tags) {
            foreach ($tags as $i => $tag) {
                if ($i == 0) {
                    $query->where('tags', 'like', '%' . $tag . '%');
                } else {
                    $query->orWhere('tags', 'like', '%' . $tag . '%');
                }
            }
        });

        return $posts->orderBy('published_at', 'desc')
            ->limit($total)->get();
    }

    /**
     * Get public blogs
     * Use by calling static method and pass the request on array
     *
     * @param  object $request [search, type, tag, category]
     * @param  int $total
     * @return void
     */
    public function publicPosts(object $request, $total = 10): PaginationPaginator
    {
        $posts = Post::with('writer')->published();

        // Check if props below is true/not empty
        if (property_exists($request, 'search')) {
            if ($request->search) {
                $posts->search($request);
            }
        }

        // Check if props below is true/not empty
        if (property_exists($request, 'type')) {
            if ($request->type) {
                $posts->type($request);
            }
        }

        // Check if props below is true/not empty
        if (property_exists($request, 'tag')) {
            if ($request->tag) {
                $posts->tag($request);
            }
        }

        // Check if props below is true/not empty
        if (property_exists($request, 'category')) {
            if ($request->category) {
                $posts->category($request);
            }
        }

        // Check if props below is true/not empty
        if (property_exists($request, 'subCategory')) {
            if ($request->subCategory) {
                $posts->subcategory($request);
            }
        }

        // Get by author
        if (property_exists($request, 'author')) {
            if ($request->author) {
                $posts->author($request);
            }
        }

        // Get by date
        if (property_exists($request, 'date_start') && property_exists($request, 'date_end')) {
            if ($request->date_start && $request->date_end) {
                $posts->whereBetween('published_at', [$request->date_start, $request->date_end]);
            }

            if (!$request->date_start && $request->date_end) {
                $posts->whereDate('published_at', '<=', $request->date_end);
            }

            if ($request->date_start && !$request->date_end) {
                $posts->whereDate('published_at', '>=', $request->date_start);
            }
        }

        return $posts->orderBy('published_at', 'desc')
            ->paginate($total);
    }

    public function getByCategory($category, $paginated = false, $total = 6, $subCategory = null)
    {
        $posts = Post::with('writer', 'views')
            ->published()
            ->category((object) [
                'category' => $category,
            ])
            ->orderBy('published_at', 'desc');

        if ($subCategory) {
            $posts->subcategory((object) [
                'subCategory' => $subCategory,
            ]);
        }

        if ($paginated) {
            return $posts->paginate($total);
        }

        return $posts->limit($total)->get();
    }

    public function getLatestPosts($exceptSlug = null, $type = null, $total = 5)
    {
        $posts = Post::with('writer')->published();

        if ($type) {
            $posts->whereHas('type', function ($query) use ($type) {
                $query->where('slug_name', $type);
            });
        }

        if ($exceptSlug) {
            $posts->where('slug_title', '!=', $exceptSlug);
        }

        return $posts->orderBy('created_at', 'desc')->paginate($total);

    }

    public function getLatestPostsByCategory(array $request, $total = 5)
    {
        $posts = Post::with('writer')->published();

        if (array_key_exists('type', $request)) {
            if ($request['type']) {
                $posts->type((object) [
                    'type' => $request['type'],
                ]);
            }
        }

        if (array_key_exists('category', $request)) {
            if ($request['category']) {
                $posts->category((object) [
                    'category' => $request['category'],
                ]);
            }
        }

        return $posts->orderBy('published_at', 'desc')->limit($total)->get();

    }

    public function getRandomPosts($exceptSlug = null, $type = null, $total = 5)
    {
        $posts = Post::with('writer')->published();

        if ($type) {
            $posts->whereHas('type', function ($query) use ($type) {
                $query->where('slug_name', $type);
            });
        }

        if ($exceptSlug) {
            $posts->where('slug_title', '!=', $exceptSlug);
        }

        return $posts->inRandomOrder()->limit($total)->get();

    }

    /**
     * Show public post
     * Used by calling static metho and pass string slug title
     *
     * @param  string $slug_title
     * @return void
     */
    public function showPublicPost(string $slug_title, $category)
    {
        return Post::whereHas('type', function ($query) use ($category) {
            $query->where('slug_name', $category);
        })
            ->where('slug_title', $slug_title)
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
        $posts = Post::query()
            ->withCount('views');

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

    public function notYetApproved()
    {
        $posts = Post::query()
            ->whereNull('approved_at');

        return $posts->orderBy('created_at', 'desc')->get();
    }

}
