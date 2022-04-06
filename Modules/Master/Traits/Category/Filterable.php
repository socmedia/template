<?php

namespace Modules\Master\Traits\Category;

trait Filterable
{
    /**
     * Handle query to get table_reference by group field in the table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeGroupByTableReference($query)
    {
        return $query->select('table_reference')->groupBy('table_reference');
    }

    /**
     * Handle query to find table_reference in the table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeTableReference($query, $request)
    {
        $request = (object) $request;
        return $query->where('table_reference', $request->table_reference);
    }

    /**
     * Find specific user with trashed user
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  string $column
     * @param  string $value
     * @return void
     */
    public function scopeFindWithTrashed($query, $request)
    {
        $request = (object) $request;
        return $query->where($request->column, $request->value)->withTrashed()->first();
    }

    /**
     * Handle query to search category
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
                ->orWhere('table_reference', 'like', '%' . $request->search . '%');
        });
    }

    /**
     * Handle query to get last category position
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeGetLastPosition($query, $request)
    {
        $request = (object) $request;
        return $query->where('table_reference', $request->table_reference)
            ->orderBy('position', 'desc')->first();
    }

    /**
     * Handle query to find category
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