<?php

namespace Modules\Post\Services;

use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\Post;

trait PostQueriesService
{
    /**
     * Get popular posts
     * used by calling static method and pass string time
     * In: [this-week, this-month, this-year ]
     *
     * @param  string $postTypeName
     * @param  string $time
     * @return void
     */
    public static function getPopularPosts(string $postTypeName = '', string $time = '')
    {
        $query = static::query()
            ->whereNotNull('published_at')
            ->whereNull('archived_at')
            ->where(function ($post) {
                $post->where('number_of_views', '>', 50)
                    ->orWhere('number_of_shares', '>', 20);
            });

        if ($time == 'this-week') {
            $query->whereBetween('created_at', [
                now()->startOfWeek()->toDateString(),
                now()->endOfWeek()->toDateString(),
            ]);
        } elseif ($time == 'this-month') {
            $query->whereBetween('created_at', [
                now()->startOfMonth()->toDateTimeString(),
                now()->endOfMonth()->toDateTimeString(),
            ]);
        } elseif ($time == 'this-year') {
            $query->whereBetween('created_at', [
                now()->startOfYear()->toDateTimeString(),
                now()->endOfYear()->toDateTimeString(),
            ]);
        }

        if ($postTypeName) {
            $query->whereHas('type', function ($type) use ($postTypeName) {
                return $type->where('name', 'like', '%' . $postTypeName . '%');
            });
        }

        return $query->orderBy('number_of_views', 'desc');
    }

    /**
     * Get public blogs
     * Use by calling static method and pass the request on array
     *
     * @param  array $request
     * @return void
     */
    public static function publicPosts($request)
    {
        $posts = static::query()->with('writer')
            ->whereNotNull('published_at')
            ->whereNull('archived_at');

        // Check if props below is true/not empty
        if ($request['search']) {

            // Search query
            $posts->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request['search'] . '%')
                    ->orWhere('slug_title', 'like', '%' . $request['search'] . '%')
                    ->orWhere('subject', 'like', '%' . $request['search'] . '%')
                    ->orWhere('tags', 'like', '%' . $request['search'] . '%');
            });

        }

        // Check if props below is true/not empty
        if ($request['type']) {
            // Filter type by type name
            $posts->whereHas('type', function ($query) use ($request) {
                $query->where('slug_name', $request['type']);
            });
        }

        // Check if props below is true/not empty
        if ($request['tag']) {
            // Filter tag by tag name
            $posts->where('tags', 'like', '%' . $request['tag'] . '%');
        }

        // Check if props below is true/not empty
        if ($request['category']) {

            // Filter category by category name
            $posts->whereHas('category', function ($query) use ($request) {
                $query->where('slug_name', $request['category']);
            });
        }

        return $posts->orderBy('created_at', 'desc');
    }

    /**
     * Show public post
     * Used by calling static metho and pass string slug title
     *
     * @param  string $slug_title
     * @return void
     */
    public static function showPublicPost(string $slug_title)
    {
        return static::query()
            ->where('slug_title', $slug_title)
            ->whereNotNull('published_at')
            ->whereNull('archived_at')
            ->firstOrFail();
    }

    /**
     * Filter query
     * Use by calling static method and pass the request on array
     *
     * @param  array $request
     * @return void
     */
    public static function filters(array $request)
    {
        $posts = static::query();

        // Check if props below is true/not empty
        if ($request['search']) {

            // Search query
            $posts->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request['search'] . '%')
                    ->orWhere('slug_title', 'like', '%' . $request['search'] . '%')
                    ->orWhere('subject', 'like', '%' . $request['search'] . '%')
                    ->orWhere('description', 'like', '%' . $request['search'] . '%')
                    ->orWhere('tags', 'like', '%' . $request['search'] . '%');
            });

        }

        // Check if props below is true/not empty
        if ($request['category']) {

            // Filter category by category name
            $posts->whereHas('category', function ($query) use ($request) {
                $query->where('slug_name', $request['category']);
            });
        }

        // Check if props below is true/not empty
        if ($request['type']) {
            // Filter type by type name
            $posts->whereHas('type', function ($query) use ($request) {
                $query->where('slug_name', $request['type']);
            });
        }

        // Check if props below is true/not empty
        if ($request['status']) {

            if ($request['status'] == 'published') {
                $posts->whereNotNull('published_at')
                    ->whereNull('archived_at');
            }

            if ($request['status'] == 'draft') {
                $posts->whereNull('published_at')
                    ->whereNull('archived_at');
            }

            if ($request['status'] == 'archived') {
                $posts->whereNotNull('archived_at');
            }

        }

        // Check if props below is true/not empty
        if ($request['sort'] && $request['order']) {
            $columns = Schema::getColumnListing('posts');

            // Check if column is exist in database table column
            // Handle errors column not found
            if (in_array($request['sort'], $columns)) {

                // Check if order like asc or desc
                // Data will only show if column is available and order is available
                if ($request['order'] == 'asc' || $request['order'] == 'desc') {
                    $posts->orderBy($request['sort'], $request['order']);
                }

            } else {
                // If column found, will return empty array
                return $posts;
            }
        } else {

            // By default, the data results will be order by
            // created_at = desc
            $posts->orderBy('created_at', 'desc');
        }

        return $posts;
    }
}