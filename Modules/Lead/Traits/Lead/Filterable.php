<?php

namespace Modules\Lead\Traits\Lead;

trait Filterable
{
    /**
     * Handle query to find published lead
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeStatus($query, $request)
    {
        $request = (object) $request;
        return $query->where('status', $request->status);
    }

    /**
     * Handle query to find archived lead
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeReadStatus($query, $request)
    {
        $request = (object) $request;

        if ($request->is_readed == 'true') {
            return $query->whereNotNull('is_readed');
        }

        if ($request->is_readed == 'false') {
            return $query->whereNull('is_readed');
        }

        return;
    }

    /**
     * Handle query to find lead category
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
     * Handle query to find lead
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
                ->orWhere('phone', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->orWhere('question', 'like', '%' . $request->search . '%');
        });
    }

    /**
     * Handle query to find lead
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