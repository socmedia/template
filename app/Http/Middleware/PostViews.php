<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostsView;

class PostViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $post = Post::where('slug_title', $request->slug_title)->first();

        if ($post) {
            $views = PostsView::where(function ($query) use ($post) {
                $query->where('ip_address', request()->ip())->where('posts_id', $post->id);
            })->orderBy('created_at', 'desc')->first();

            // 2022-07-06 12:32:31

            if (!$views) {
                PostsView::create([
                    'ip_address' => request()->ip(),
                    'posts_id' => $post->id,
                    'last_open_at' => now()->toDateTimeString(),
                ]);
            } else {
                $next_count = Carbon::parse($views->last_open_at);
                $now = now()->toDateTimeString();
                if ($next_count->diffInMinutes($now) >= 30) {
                    PostsView::create([
                        'ip_address' => request()->ip(),
                        'posts_id' => $post->id,
                        'last_open_at' => now()->toDateTimeString(),
                    ]);
                }
            }
        }

        return $next($request);
    }
}