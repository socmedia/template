<?php

namespace Modules\AccessLevel\Services\User;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;

class UserQuery extends User
{
    /**
     * Find specific user with trashed user
     *
     * @param  string $column
     * @param  string $value
     * @return void
     */
    public function findWithTrashed($column, $value)
    {
        $user = User::query();

        return $user->findWithTrashed((object) [
            'column' => $column,
            'value' => $value,
        ]);
    }

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
        $users = User::query();

        // Check if props below is true/not empty
        if ($request->role) {
            $users->whereRole($request);
        }

        // Check if props below is true/not empty
        if ($request->search) {
            $users->search($request);
        }

        // Check if props below is true/not empty
        if ($request->email_verified) {
            $users->emailVerified($request);
        }

        if ($request->onlyTrashed) {
            $users->onlyTrashed();
        }

        return $users->sort($request)->paginate($total);
    }
}