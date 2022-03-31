<?php

namespace Modules\AppSetting\Database\Seeders;

use App\Constants\DefaultAppSettings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Modules\AppSetting\Entities\AppSetting;

class AppSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $settings = DefaultAppSettings::allSettings();

        foreach ($settings as $setting) {
            Cache::forever($setting['key'], $setting['value']);
        }

        AppSetting::insert($settings);
    }
}