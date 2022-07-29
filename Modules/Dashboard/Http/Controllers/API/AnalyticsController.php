<?php

namespace Modules\Dashboard\Http\Controllers\API;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Dashboard\Traits\GoogleAnalytics;

class AnalyticsController extends Controller
{
    use GoogleAnalytics;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $data = $this->sessionAndPageViews($request->label);
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $data,
            ]);
        } catch (Exception $execption) {
            return response()->json([
                'status' => $execption->getCode(),
                'message' => $execption->getMessage(),
            ], $execption->getCode());
        }
    }
}