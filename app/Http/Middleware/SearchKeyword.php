<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Front\Entities\Search;

class SearchKeyword
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
        $search = Search::where('keywords', $request->keyword)->first();

        if ($request->keyword) {
            if (!$search) {
                Search::create([
                    'keywords' => $request->keyword,
                    'total' => 1,
                    'last_search_at' => now()->toDateTimeString(),
                ]);
            } else {
                $search->update([
                    'total' => $search->total += 1,
                    'last_search_at' => now()->toDateTimeString(),
                ]);
            }
        }

        return $next($request);
    }
}