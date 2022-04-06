<?php

namespace Modules\AccessLevel\Services\Permission;

use App\Contracts\DatabaseTable;
use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Spatie\Permission\Models\Permission;

class PermissionQuery extends Permission
{
    use DatabaseTable;

    /**
     * Filter query
     * Use by calling static method and pass the request on array
     *
     * @param  object $request
     * @param  int $total
     * @return void
     */
    public function filters(object $request, int $total = 10): PaginationPaginator
    {
        $permissions = Permission::query();

        // Check if props search is not empty/null
        if ($request->search) {
            // Search condition
            $permissions->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('guard_name', 'like', '%' . $request->search . '%')
                    ->orWhere('created_at', 'like', '%' . $request->search . '%');
            });

        }

        // Check if props below is true/not empty
        if ($request->sort && $request->order) {
            $columns = $this->getTableColumns('permissions');

            // Check if column is exist in database table column
            // Handle errors column not found
            if (in_array($request->sort, $columns)) {

                // Check if order like asc or desc
                // Data will only show if column is available and order is available
                if ($request->order == 'asc' || $request->order == 'desc') {
                    $permissions->orderBy($request->sort, $request->order);
                }

            } else {
                // If column found, will return empty array
                return [];
            }
        }

        return $permissions->paginate($total);
    }
}