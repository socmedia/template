<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $settings = cache()->get('app_settings');

        if (count($settings) > 0) {
            foreach ($settings as $groups) {
                foreach ($groups as $setting) {
                    view()->share($setting['key'], $setting['value']);
                }
            }
        }
    }
}