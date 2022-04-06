<?php

namespace Modules\Marketing\Traits\Faq;

trait Filterable
{
    /**
     * Handle query to get faq with specific category
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeCategoryBySlug($query, $request)
    {
        $request = (object) $request;

        return $query->whereHas('category', function ($category) use ($request) {
            return $category->where('table_reference', 'faqs')
                ->where('slug_name', 'like', '%' . $request->category . '%');
        });
    }

    /**
     * Handle query to get faq with verified email or not
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeIsShow($query, $request)
    {
        $request = (object) $request;

        if ($request->is_show == 'true') {
            return $query->where('is_active', 1);
        }

        if ($request->is_show == 'false') {
            return $query->where('is_active', 0);
        }
    }

    /**
     * Handle query to find in the table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeSearch($query, $request)
    {
        $request = (object) $request;

        return $query->where(function ($query) use ($request) {
            $query->where('question', 'like', '%' . $request->search . '%')
                ->orWhere('answer', 'like', '%' . $request->search . '%')
                ->orWhereHas('category', function ($category) use ($request) {
                    return $category->where('table_reference', 'faqs')
                        ->where('name', 'like', '%' . $request->search . '%');
                });
        });
    }

    /**
     * Handle query to find in the table
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