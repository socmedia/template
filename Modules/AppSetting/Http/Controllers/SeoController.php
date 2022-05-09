<?php

namespace Modules\AppSetting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\AppSetting\Services\SettingsQuery;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('appsetting::seo.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $setting = SettingsQuery::find($id);
        return view('appsetting::seo.edit', [
            'setting' => $setting,
        ]);
    }
}