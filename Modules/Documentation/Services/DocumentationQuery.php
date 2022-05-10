<?php

namespace Modules\Documentation\Services;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\Documentation\Entities\Documentation;

class SettingsQuery extends Documentation
{
    /**
     * Get group column
     *
     * @param  int $total
     * @param  boolean $paginated
     * @return void
     */
    public function getGroupField(?int $total = 10, $paginated = false)
    {
        $Documentations = Documentation::query()->groupByGroup()->orderBy('group');

        if ($paginated) {
            return $Documentations->paginate($total);
        }

        return $Documentations->get();
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
        $Documentations = Documentation::query();

        // Check if props below is true/not empty
        if ($request->group) {
            $Documentations->group($request);
        }

        // Check if props below is true/not empty
        if ($request->search) {
            $Documentations->search($request);
        }

        return $Documentations->sort($request)->paginate($total);
    }

    /**
     * Filter query by group front
     * Use by calling static method and pass the request on array
     *
     * @param  object $request
     * @param  int $total
     * @return void
     */
    public function filtersFront(object $request, int $total = 10): PaginationPaginator
    {
        $Documentations = Documentation::query()->where('group', 'like', 'front%');

        // Check if props below is true/not empty
        if ($request->search) {
            $Documentations->search($request);
        }

        return $Documentations->sort($request)->paginate($total);
    }

    /**
     * Filter query by group seo
     * Use by calling static method and pass the request on array
     *
     * @param  object $request
     * @param  int $total
     * @return void
     */
    public function filtersSeo(object $request, int $total = 10): PaginationPaginator
    {
        $Documentations = Documentation::query()->where('group', 'seo');

        // Check if props below is true/not empty
        if ($request->search) {
            $Documentations->search($request);
        }

        return $Documentations->sort($request)->paginate($total);
    }
}