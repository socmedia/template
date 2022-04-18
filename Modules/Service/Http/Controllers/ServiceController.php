<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Service\Entities\Service;
use Illuminate\Contracts\Support\Renderable;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('service::service.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('service::service.create');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('service::service.edit', [
            'service'=> $service
        ]);
    }
}
