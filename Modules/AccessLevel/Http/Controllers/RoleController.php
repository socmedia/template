<?php

namespace Modules\AccessLevel\Http\Controllers;

use App\Exports\RoleExport;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('accesslevel::role.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('accesslevel::role.create');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Role $role, $id)
    {
        return view('accesslevel::role.edit', [
            'role' => $role->findOrFail($id),
        ]);
    }

    /**
     * Download roles data from database
     *
     * @param  string $type
     * @return void
     */
    public function download($type)
    {
        $formats = ['xlsx', 'csv'];

        if (in_array($type, $formats)) {
            return (new RoleExport)->download('roles_' . date('dmyhis') . '.' . $type);
        }

        abort(404);
    }
}
