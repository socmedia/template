<?php

namespace Modules\AppSetting\Models;

use Closure;
use Illuminate\Contracts\Pagination\Paginator;
use Modules\AppSetting\Models\Entities\AppSetting;

class AppSettingModel
{
    /**
     * Defines variable
     *
     * @var AppSetting $appSetting
     */
    public $appSetting;

    /**
     * Class constructor.
     */
    public function __construct(AppSetting $appSetting)
    {
        $this->model = $appSetting;
    }

    /**
     * Get all app settings from resource
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $condition
     * @return Paginator
     */
    public function getAll($request, Closure $condition = null): Paginator
    {
        $settings = $this->appSetting->select('*');

        // If any filters requests?
        if (property_exists($request, 'filters')) {
            // do something
        }

        // Additional conditions
        if ($condition) {
            call_user_func($condition, 'query');
        }

        return $settings->orderBy(
            property_exists($request, 'orderBy') ? $request->orderBy : 'created_at',
            property_exists($request, 'sort') ? $request->sort : 'desc',
        )->simplePaginate(
            property_exists($request, 'perPage') ? $request->perPage : 10
        );
    }

    /**
     * Find setting from resource by using id
     *
     * @param  int $id
     * @param  \Closure $condition
     * @return AppSetting
     */
    public function findById($id, Closure $condition = null): AppSetting
    {
        $setting = $this->appSetting->where('id', $id);

        // Additional conditions
        if ($condition) {
            call_user_func($condition, 'query');
        }

        return $setting->firstorFail();
    }

    /**
     * Store new setting to resource
     *
     * @param  \Illuminate\Http\Request $request
     * @return AppSetting
     */
    public function store($request): AppSetting
    {
        return $this->appSetting->create([
            'name' => $request->name,
            'key' => $request->key,
            'value' => $request->value,
        ]);
    }

    /**
     * Update exsisting setting from resource
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return AppSetting
     */
    public function update($request, $id): AppSetting
    {
        $setting = $this->appSetting->find($id);
        return $setting->update([
            'name' => $request->name,
            'key' => $request->key,
            'value' => $request->value,
        ]);
    }

    /**
     * Remove exsisting setting from resource
     *
     * @param  int $id
     * @return AppSetting
     */
    public function delete($id): AppSetting
    {
        $setting = $this->appSetting->find($id);
        return $setting->delete();
    }
}