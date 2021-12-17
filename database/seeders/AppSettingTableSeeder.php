<?php

namespace Database\Seeders;

use App\Constants\DefaultAppSettings;
use Illuminate\Database\Seeder;
use Modules\AppSetting\Models\Entities\AppSetting;

class AppSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = DefaultAppSettings::allSettings();
        AppSetting::insert($settings);
    }
}