<?php

namespace Modules\AppSetting\Http\Livewire\Settings;

use Exception;
use Illuminate\Support\Facades\Artisan as ArtisanCommand;
use Livewire\Component;

class Artisan extends Component
{
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
        return ArtisanCommand::call($message);
    }

    public function render()
    {
        return view('appsetting::livewire.settings.artisan');
    }
}