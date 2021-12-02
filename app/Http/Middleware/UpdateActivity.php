<?php

namespace App\Http\Middleware;

use App\Services\ActivityService;
use Closure;
use Illuminate\Http\Request;

class UpdateActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $activity, ActivityService $activityService)
    {
        $activities = explode('|', $activity);

        foreach ($activities as $activity) {
            $activityService->generateUserActivity(user(), $activity);
        }

        return $next($request);
    }
}