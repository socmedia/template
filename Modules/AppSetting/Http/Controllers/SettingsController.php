<?php

namespace Modules\AppSetting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\AppSetting\Services\SettingsQuery;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('appsetting::settings.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('appsetting::settings.create');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $setting = SettingsQuery::find($id);
        return view('appsetting::settings.edit', [
            'setting' => $setting,
        ]);
    }
}