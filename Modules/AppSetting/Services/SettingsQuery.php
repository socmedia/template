<?php

namespace Modules\AppSetting\Services;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\AppSetting\Entities\AppSetting;

class SettingsQuery extends AppSetting
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
        $AppSettings = AppSetting::query()->groupByGroup()->orderBy('group');

        if ($paginated) {
            return $AppSettings->paginate($total);
        }

        return $AppSettings->get();
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
        $AppSettings = AppSetting::query();

        // Check if props below is true/not empty
        if ($request->group) {
            $AppSettings->group($request);
        }

        // Check if props below is true/not empty
        if ($request->search) {
            $AppSettings->search($request);
        }

        return $AppSettings->sort($request)->paginate($total);
    }
}