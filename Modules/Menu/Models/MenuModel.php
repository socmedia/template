<?php

namespace Modules\Menu\Models;

use Closure;
use Illuminate\Pagination\Paginator;
use Modules\Menu\Models\Entities\Menu;

class MenuModel
{
    /**
     * Define variable
     *
     * @var Menu $menu
     */
    public $menu;

    /**
     * Class construct
     *
     * @param  \Modules\Menu\Models\Entities\Menu $menu
     * @return void
     */
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Get all menu from resource
     *
     * @param  \Illuminate\Http\Request $request
     * @return Paginator
     */
    public function getAll($request): Paginator
    {
        $menus = $this->menu->select('*');

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
     * Find menu from resource by using id
     *
     * @param  int $id
     * @param  Closure $condition
     * @return Menu
     */
    public function findById($id, Closure $condition = null): Menu
    {
        $menu = $this->menu->where('id', $id);

        // additional condition
        if ($condition) {
            call_user_func($condition, $menu);
        }

        return $menu->firstOrFail();
    }

    /**
     * Find menu from resource by using slug
     *
     * @param  int $slug
     * @param  Closure $condition
     * @return Menu
     */
    public function findBySlug($slug, Closure $condition = null): Menu
    {
        $menu = $this->menu->where('slug', $slug);

        // additional condition
        if ($condition) {
            call_user_func($condition, $menu);
        }

        return $menu->firstOrFail();
    }

    /**
     * Store menu to resource
     *
     * @param  \Illuminate\Http\Request $request
     * @return Menu
     */
    public function store($request): Menu
    {
        return $this->menu->create([
            'name' => $request->name,
        ]);
    }

    /**
     * Update exisisting menu from resource
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return Menu
     */
    public function update($request, $id): Menu
    {
        $menu = $this->menu->find($id);

        return $menu->update([
            'name' => $request->name,
        ]);
    }

    /**
     * Remove exisisting menu from resource
     *
     * @param  int $id
     * @return Menu
     */
    public function delete($id): Menu
    {
        $menu = $this->menu->find($id);
        return $menu->delete();
    }
}