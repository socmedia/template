<?php

namespace Modules\Documentation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Documentation\Entities\Documentation;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('documentation::documentation.index', [
            'countTrash' => numberShortner(Documentation::onlyTrashed()->count()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('documentation::documentation.create');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Documentation $documentation, $id)
    {
        return view('documentation::documentation.edit', [
            'documentation' => $documentation->where('id', $id)->firstOrFail(),
        ]);
    }

    /**
     * Show trashed documentation from database
     *
     * @return void
     */
    public function trash()
    {
        return view('documentation::documentation.trash');
    }

}
