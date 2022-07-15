<?php

namespace Modules\Post\Traits\Post;

trait Filterable
{
    /**
     * Handle query to find published post
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
            ->whereNull('archived_at');
    }

    /**
     * Handle query to find archived post
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeArchived($query)
    {
        return $query->whereNotNull('archived_at');
    }

    /**
     * Handle query to find draft post
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeDraft($query)
    {
        return $query->whereNull('published_at')
            ->whereNull('archived_at');
    }

    /**
     * Handle query to find tag post
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeTag($query, $request)
    {
        $request = (object) $request;
        return $query->where('tags', 'like', '%' . $request->tag . '%');
    }

    /**
     * Handle query to find post category
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */

    public function scopeCategory($query, $request)
    {
        $request = (object) $request;
        return $query->whereHas('category', function ($query) use ($request) {
            $query->where('slug_name', $request->category);
        });
    }

    /**
     * Handle query to find post category
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */

    public function scopeSubcategory($query, $request)
    {
        $request = (object) $request;
        return $query->whereHas('subCategory', function ($query) use ($request) {
            $query->where('slug_name', $request->subCategory);
        });
    }

    /**
     * Handle query to find post type
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeType($query, $request)
    {
        $request = (object) $request;
        return $query->whereHas('type', function ($query) use ($request) {
            $query->where('slug_name', $request->type);
        });
    }

    /**
     * Handle query to find post author
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeAuthor($query, $request)
    {
        $request = (object) $request;
        return $query->whereHas('writer', function ($query) use ($request) {
            $query->where('id', $request->author);
        });
    }

    /**
     * Handle query to find post
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeSearch($query, $request)
    {
        $request = (object) $request;
        return $query->where(function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('slug_title', 'like', '%' . $request->search . '%')
                ->orWhere('subject', 'like', '%' . $request->search . '%')
                ->orWhere('tags', 'like', '%' . $request->search . '%');
        });
    }

    /**
     * Handle query to find post
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeSort($query, $request)
    {
        $request = (object) $request;
        $columns = $query->getModel()->getFillable();

        // Check if column is exist in database table column
        // Handle errors column not found
        if (in_array($request->sort, $columns)) {

            // Check if order like asc or desc
            // Data will only show if column is available and order is available
            if ($request->order == 'asc' || $request->order == 'desc') {
                $query->orderBy($request->sort, $request->order);
            }

        } else {
            // If column found, will return empty array
            return $query;
        }

    }
}