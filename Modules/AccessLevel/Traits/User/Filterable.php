<?php

namespace Modules\AccessLevel\Traits\User;

trait Filterable
{
    /**
     * Handle query to get user with verified email or not
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeEmailVerified($query, $request)
    {
        $request = (object) $request;

        if ($request->email_verified == 'true') {
            return $query->whereNotNull('email_verified_at');
        }

        if ($request->email_verified == 'false') {
            return $query->whereNull('email_verified_at');
        }
    }

    /**
     * Handle query to get spatie laravel permissions and roles relation
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeWhereRole($query, $request)
    {
        $request = (object) $request;

        return $query->whereHas('roles', function ($query) use ($request) {
            $query->where('name', $request->role);
        });
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
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('email_verified_at', 'like', '%' . $request->search . '%')
                ->orWhere('created_at', 'like', '%' . $request->search . '%');
        });
    }

    /**
     * Handle query to find in the table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeGroup($query, $request)
    {
        $request = (object) $request;
        return $query->where('group', $request->group);
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