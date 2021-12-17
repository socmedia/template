<?php

namespace Modules\AccessLevel\Http\Controllers;

use App\Exports\UserExport;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('accesslevel::user.index', [
            'countTrash' => numberShortner(User::onlyTrashed()->count()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('accesslevel::user.create');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('accesslevel::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $user, $id)
    {
        return view('accesslevel::user.edit', [
            'user' => $user->where('id', $id)->withTrashed()->first(),
        ]);
    }

    /**
     * Show trashed user from database
     *
     * @return void
     */
    public function trash()
    {
        return view('accesslevel::user.trash');
    }

    /**
     * Downlaod excel from database
     *
     * @param  string $type
     * @return void
     */
    public function download($type)
    {
        $formats = ['xlsx', 'csv'];

        if (in_array($type, $formats)) {
            return (new UserExport)->download('users_' . date('dmyhis') . '.' . $type);
        }

        abort(404);
    }
}