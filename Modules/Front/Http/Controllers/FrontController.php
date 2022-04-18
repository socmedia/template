<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Modules\Service\Entities\Service;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return view('front::pages.index', [
            'isHomePage' => request()->routeIs('front.index'),
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function about()
    {
        return view('front::pages.about');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function receipt()
    {
        return view('front::pages.receipt', [
            'isHomePage' => request()->routeIs('front.index'),
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function shippingRate()
    {
        return view('front::pages.shippingRate', [
            'isHomePage' => request()->routeIs('front.index'),
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function agentLocation()
    {
        return view('front::pages.agent', [
            'isHomePage' => request()->routeIs('front.index'),
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function promo()
    {
        return view('front::pages.index', [
            'isHomePage' => request()->routeIs('front.index'),
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function blog()
    {
        return view('front::pages.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function event()
    {
        return view('front::pages.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function showPromo($slug)
    {
        return view('front::pages.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function showBlog($slug)
    {
        return view('front::pages.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function showEvent($slug)
    {
        return view('front::pages.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function service()
    {
        return view('front::pages.service', [
            'isHomePage' => request()->routeIs('front.index'),
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function showService(Service $service)
    {
        return view('front::pages.show-service', [
            'service' => $service,
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function sohib()
    {
        return view('front::pages.sohib');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function career()
    {
        return view('front::pages.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function tnc()
    {
        return view('front::pages.tnc');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function partnership()
    {
        return view('front::pages.partnership');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function bussinessSolution()
    {
        return view('front::pages.bussiness-solution');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function contact()
    {
        return view('front::pages.contact');
    }

}