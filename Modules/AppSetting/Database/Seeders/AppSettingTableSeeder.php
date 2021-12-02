<?php

namespace Modules\AppSetting\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();

        $data = [
            [
                'name' => 'app',
                'key' => 'app_name',
                'value' => config('app.name'),
            ],
            [
                'name' => 'app',
                'key' => 'copyright',
                'value' => 'Copyright © ' . config('app.name') . ' ' . date('Y') . '. All rights reserved.',
            ],
            [
                'name' => 'app',
                'key' => 'default_logo_square',
                'value' => asset('assets/default/images/brand_logo_square.png'),
            ],
            [
                'name' => 'app',
                'key' => 'default_logo_16_9',
                'value' => asset('assets/default/images/thumbnail_16_9.png'),
            ],
            [
                'name' => 'app',
                'key' => 'default_user_avatar',
                'value' => asset('assets/default/images/user_avatar.png'),
            ],
            [
                'name' => 'app',
                'key' => 'default_thumbnail_square',
                'value' => asset('assets/default/images/thumbnail_square.png'),
            ],
            [
                'name' => 'app',
                'key' => 'default_thumbnail_16_9',
                'value' => asset('assets/default/images/thumbnail_16_9.png'),
            ],
        ];

        AppSetting::insert($data);
    }
}