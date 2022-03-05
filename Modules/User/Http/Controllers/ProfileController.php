<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return view('user::profile.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function theme(Request $request)
    {
        return view('user::profile.theme');
    }
}