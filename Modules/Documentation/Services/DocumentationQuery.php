<?php

namespace Modules\Documentation\Services;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\Documentation\Entities\Documentation;

class DocumentationQuery extends Documentation
{
    /**
     * Find specific documentation with trashed documentation
     *
     * @param  string $column
     * @param  string $value
     * @return void
     */
    public function findWithTrashed($column, $value)
    {
        $documentation = Documentation::query();

        return $documentation->findWithTrashed((object) [
            'column' => $column,
            'value' => $value,
        ]);
    }

    /**
     * Query to get parent sub categories only
     *
     * @return void
     */
    public function getParents()
    {
        $docs = Documentation::query();
        return $docs->parentsOnly()->get();
    }

    /**
     * Query to get childs from specific parent only
     *
     * @param  object $request
     * @return void
     */
    public function getChilds($request)
    {
        $docs = Documentation::query();
        return $docs->getChilds($request)->get();
    }

    /**
     * Get last position by specific category
     *
     * @param  string $tableReference
     * @return void
     */
    public function getParentLastPosition(object $request)
    {
        $docs = Documentation::query();
        return $docs->getParentLastPosition($request)->first();
    }

    /**
     * Get last position by specific parent
     *
     * @param  string $tableReference
     * @return void
     */
    public function getChildLastPosition(object $request)
    {
        $docs = Documentation::query();
        return $docs->getChildLastPosition($request)->first();
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
        $documentations = Documentation::query()->whereNull('parent_id');

        if ($request->search) {
            $documentations->search($request);
        }

        if ($request->onlyTrashed) {
            $documentations->onlyTrashed();
        }

        return $documentations->orderBy('position')->paginate($total);
    }
}
