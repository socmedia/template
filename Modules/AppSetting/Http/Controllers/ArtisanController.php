<?php

namespace Modules\AppSetting\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('appsetting::artisan.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function optimize()
    {
        try {
            $this->artisan('optimize');
            return redirect()->back()->with('success', 'Website berhasil di optimasi.');
        } catch (Exception $exception) {
            return redirect()->back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function storageLink()
    {
        try {
            $this->artisan('storage:link');
            return redirect()->back()->with('success', 'Symlink berhasil dibuat.');
        } catch (Exception $exception) {
            return redirect()->back()->with('failed', $exception->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function keyGenerate()
    {
        try {
            $this->artisan('key:generate');
            return redirect()->back()->with('success', 'Id aplikasi berhasil digenerate.');
        } catch (Exception $exception) {
            return redirect()->back()->with('failed', $exception->getMessage());
        }
    }

    public function artisan($message)
    {
        return Artisan::call($message);
    }
}