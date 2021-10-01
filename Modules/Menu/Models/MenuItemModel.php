<?php

namespace Modules\Menu\Models;

use Closure;
use Illuminate\Pagination\Paginator;
use Modules\Menu\Models\Entities\MenuItem;

class MenuItemModel
{
    /**
     * Define variable
     *
     * @var MenuItem $menuItem
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

    /**
     * Find menu item from resource by using slug
     *
     * @param  int $slug
     * @param  Closure $condition
     * @return MenuItem
     */
    public function findBySlug($slug, Closure $condition = null): MenuItem
    {
        $menu = $this->menuItem->where('slug', $slug);

        // additional condition
        if ($condition) {
            call_user_func($condition, $menu);
        }

        return $menu->firstOrFail();
    }

    /**
     * Store menu item to resource
     *
     * @param  \Illuminate\Http\Request $request
     * @return MenuItem
     */
    public function store($request): MenuItem
    {
        return $this->menuItem->create([
            'menu_id' => $request->menu,
            'title' => $request->title,
            'slug' => slug($request->title),
            'url' => $request->url,
            'target' => $request->target,
            'icon' => $request->icon,
            'additional_class' => $request->additional_class,
            'color' => $request->color,
            'parent_id' => $request->parent,
            'order' => $request->order,
        ]);
    }

    /**
     * Update exisisting menu item from resource
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return MenuItem
     */
    public function update($request, $id): MenuItem
    {
        $menu = $this->menuItem->find($id);

        return $menu->update([
            'menu_id' => $request->menu,
            'title' => $request->title,
            'slug' => slug($request->title),
            'url' => $request->url,
            'target' => $request->target,
            'icon' => $request->icon,
            'additional_class' => $request->additional_class,
            'color' => $request->color,
            'parent_id' => $request->parent,
            'order' => $request->order,
        ]);
    }

    /**
     * Remove exisisting menu item from resource
     *
     * @param  int $id
     * @return MenuItem
     */
    public function delete($id): MenuItem
    {
        $menu = $this->menuItem->find($id);
        return $menu->delete();
    }
}