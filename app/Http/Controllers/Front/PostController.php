<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Post\Services\PostQuery;

class PostController extends Controller
{
    private $model;

    /**
     * Class constructor.
     */
    public function __construct(PostQuery $postQuery)
    {
        $this->model = $postQuery;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Illuminate\Http\Request $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        return $this->model->publicPosts((object) [
            'search' => $request->search,
            'tag' => $request->tag,
            'type' => $request->type,
            'category' => $request->category,
        ]);
    }

    /**
     * Show the specified resource.
     *
     * @param Illuminate\Http\Request $request
     * @return Renderable
     */
    public function show(Request $request)
    {
        return $this->model->showPublicPost($request->slug_title);
    }

    /**
     * Show popular posts
     *
     * @param Illuminate\Http\Request $request
     * @return void
     */
    public function populars(Request $request)
    {
        return $this->model->getPopularPosts('Berita', 'this-year');
    }
}