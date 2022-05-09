<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostType;
use Modules\Post\Services\Post\PostQuery;

class FrontController extends Controller
{
    /**
     * Display a sitemap.
     *
     * @return \Illuminate\Http\Response
     */
    public function sitemap()
    {
        $types = PostType::all();
        $posts = [];

        foreach ($types as $type) {
            $posts[$type->slug_name] = Post::published()->select(['title', 'slug_title', 'type_id', 'updated_at'])->where('type_id', $type->id)->get();
        }

        return response()->view('front::sitemap', [
            'posts' => $types,
            'posts' => collect($posts),
        ])->header('Content-Type', 'text/xml');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function posts(Request $request)
    {
        return (new PostQuery())->filters((object) [
            'category' => $request->category,
            'type' => $request->type,
            'status' => $request->status,
            'sort' => $request->sort,
            'order' => $request->order,
            'search' => $request->search,
        ], 10);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function showPost($slug_title)
    {
        return (new PostQuery())->showPost($slug_title);
    }

}