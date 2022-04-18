<?php

namespace Modules\Service\Traits\Service;

trait Filterable
{
    /**
     * Handle query to search service
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
                ->orWhere('slug_name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        });
    }

    /**
     * Handle query to get last service position
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeGetLastPosition($query)
    {
        return $query->orderBy('position', 'desc');
    }

    /**
     * Handle query to find service
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