<?php

namespace Modules\Master\Services\SubCategory;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\Master\Entities\SubCategory;

class SubCategoryQuery extends SubCategory
{
    /**
     * Find specific subcategory with trashed subcategory
     *
     * @param  string $column
     * @param  string $value
     * @return void
     */
    public function findWithTrashed($column, $value)
    {
        $subcategory = SubCategory::query();

        return $subcategory->findWithTrashed((object) [
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
        $category = SubCategory::query();
        return $category->parentsOnly()->get();
    }

    /**
     * Query to get childs from specific parent only
     *
     * @param  object $request
     * @return void
     */
    public function getChilds($request)
    {
        $category = SubCategory::query();
        return $category->getChilds($request)->get();
    }

    /**
     * Get last position by specific category
     *
     * @param  string $tableReference
     * @return void
     */
    public function getParentLastPosition(object $request)
    {
        $category = SubCategory::query();
        return $category->getParentLastPosition($request)->first();
    }

    /**
     * Get last position by specific parent
     *
     * @param  string $tableReference
     * @return void
     */
    public function getChildLastPosition(object $request)
    {
        $category = SubCategory::query();
        return $category->getChildLastPosition($request)->first();
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
        $subcategorys = SubCategory::query()
            ->with('childs')->parentsOnly();

        // Check if props below is true/not empty
        if ($request->category) {
            $subcategorys->category($request);
        }

        if ($request->search) {
            $subcategorys->search($request);
        }

        if ($request->onlyTrashed) {
            $subcategorys->onlyTrashed();
        }

        return $subcategorys->orderBy('position')->paginate($total);
    }
}