<?php

namespace Modules\Documentation\Traits;

trait Filterable
{

    /**
     * Find specific sub category with trashed sub category
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
     * Handle query to get child by specific parent
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeGetChilds($query, $request)
    {
        $request = (object) $request;
        return $query->where('parent_id', $request->parent_id)->orderBy('position');
    }
    /**
     * Handle query to get childs sub categories only
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeChildsOnly($query)
    {
        return $query->whereNotNull('parent_id');
    }

    /**
     * Handle query to get parent sub categories only
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeParentsOnly($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Handle query to get last category position
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeGetParentLastPosition($query, $request)
    {
        $request = (object) $request;
        return $query->whereNull('parent_id')
            ->orderBy('position', 'desc');
    }

    /**
     * Handle query to get child last category position
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeGetChildLastPosition($query, $request)
    {
        $request = (object) $request;
        return $query->where('parent_id', $request->parent)
            ->orderBy('position', 'desc')->first();
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
            $query->where('page_title', 'like', '%' . $request->search . '%')
                ->orWhere('slug_page_title', 'like', '%' . $request->search . '%');
        });
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
