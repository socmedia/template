<?php

namespace Modules\Marketing\Traits\Banner;

trait Filterable
{
    /**
     * Handle query to get banner with verified email or not
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
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('thumbnail', 'like', '%' . $request->search . '%')
                ->orWhere('references_url', 'like', '%' . $request->search . '%');
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
