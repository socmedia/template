<?php

namespace Modules\Menu\Models;

use Closure;
use Illuminate\Pagination\Paginator;
use Modules\Menu\Models\Entities\MenuItem;

class MenuItemModel
{
    /**
     * Define general variable
     *
     * @var mixed
     */
    public $menuItem;

    /**
     * Class construct
     *
     * @param  \Modules\Menu\Models\Entities\MenuItem $menuItem
     * @return void
     */
    public function __construct(MenuItem $menuItem)
    {
        $this->menuItem = $menuItem;
    }

    /**
     * Get all menu from resource
     *
     * @param  \Illuminate\Http\Request $request
     * @return Paginator
     */
    public function getAll($request): Paginator
    {
        $menus = $this->menuItem->select('*');

        if (property_exists($request, 'filters')) {
            // Do something
        }

        return $menus->orderBy(
            property_exists($request, 'orderBy') ? $request->orderBy : 'created_at',
            property_exists($request, 'sort') ? $request->sort : 'desc'
        )->simplePaginate(
            property_exists($request, 'perPage') ? $request->perPage : 15
        );
    }

    /**
     * Find menu item from resource by using id
     *
     * @param  int $id
     * @param  Closure $condition
     * @return MenuItem
     */
    public function findById($id, Closure $condition = null): MenuItem
    {
        $menu = $this->menuItem->where('id', $id);

        // additional condition
        if ($condition) {
            call_user_func($condition, $menu);
        }

        return $menu->firstOrFail();
    }
}