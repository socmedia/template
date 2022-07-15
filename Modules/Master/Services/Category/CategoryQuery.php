<?php

namespace Modules\Master\Services\Category;

use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Modules\Master\Entities\Category;

class CategoryQuery extends Category
{
    /**
     * Find specific category with trashed category
     *
     * @param  string $column
     * @param  string $value
     * @return void
     */
    public function findWithTrashed($column, $value)
    {
        $category = Category::query();

        return $category->findWithTrashed((object) [
            'column' => $column,
            'value' => $value,
        ]);
    }

    /**
     * Get last position from specific table reference
     *
     * @param  string $tableReference
     * @return void
     */
    public function getLastPosition($tableReference)
    {
        $category = Category::query();

        return $category->getLastPosition((object) [
            'table_reference' => $tableReference,
        ]);
    }

    /**
     * Get featured position from specific table reference
     *
     * @param  string $tableReference
     * @return void
     */
    public function getFeatured($tableReference, $limit = 4)
    {
        $category = Category::query()
            ->with('subCategory')
            ->where(function ($query) use ($tableReference) {
                $query->featured()
                    ->where('table_reference', $tableReference);
            });
        return $category->orderBy('position', 'asc')
            ->limit($limit)->get();
    }

    public function getAllCategory()
    {
        $category = Category::query();
        return $category->orderBy('position', 'asc')->get();
    }

    public function getByTableReference($tableReference)
    {
        $category = Category::query();
        $category->where('table_reference', $tableReference);
        return $category->orderBy('position', 'asc')->get();
    }

    /**
     * Get table_reference group
     *
     * @param  int $total
     * @param  boolean $paginated
     * @return void
     */
    public function getTableReferences(?int $total = 10, $paginated = false)
    {
        $tableReferences = Category::query()->groupByTableReference()->orderBy('table_reference');

        if ($paginated) {
            return $tableReferences->paginate($total);
        }

        return $tableReferences->get();
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
        $categories = Category::query();

        // Check if props below is true/not empty
        if ($request->table_reference) {
            $categories->tableReference($request);
        }

        // Check if props below is true/not empty
        if ($request->search) {
            $categories->search($request);
        }

        if ($request->onlyTrashed) {
            $categories->onlyTrashed();
        }

        return $categories->sort($request)->paginate($total);
    }
};