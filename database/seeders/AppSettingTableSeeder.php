<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
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
        $settings = [
            [
                'group' => 'app',
                'key' => 'name',
                'value' => config('app.name'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'app',
                'key' => 'copyright',
                'value' => 'Copyright © ' . config('app.name') . ' ' . date('Y') . '. All rights reserved.',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_logo_square',
                'value' => '/assets/default/images/brand_logo_square.png',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_logo_16_9',
                'value' => '/assets/default/images/brand_logo_long.png',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'favicon',
                'value' => '/assets/default/images/brand_logo_square.png',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_user_avatar',
                'value' => '/assets/default/images/user_avatar.png',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_thumbnail_square',
                'value' => '/assets/default/images/thumbnail_square.png',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_thumbnail_16_9',
                'value' => '/assets/default/images/thumbnail_16_9.png',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'login',
                'key' => 'title',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'login',
                'key' => 'caption',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'login',
                'key' => 'poster',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'title',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'caption',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'poster',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'title',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'caption',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'poster',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'title',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'caption',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'poster',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'title',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'caption',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'poster',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'title',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'caption',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'poster',
                'value' => null,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];

        AppSetting::insert($settings);

        $groups = [];

        foreach ($settings as $i => $setting) {
            in_array($setting['group'], $groups) ?: $groups[$setting['group']] = [];
        }

        foreach ($groups as $i => $group) {
            foreach ($settings as $j => $setting) {
                $setting['group'] != $i ?: array_push($groups[$i], $setting);
            }
        }

        Cache::forever('app_settings', $groups);
    }
}