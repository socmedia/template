<?php

namespace App\Constants;

use Modules\AppSetting\Models\Entities\AppSetting;

class DefaultAppSettings
{
    /**
     * Handle default app settings
     *
     * @return array
     */
    public static function allSettings(): array
    {
        return [
            [
                'group' => 'app',
                'key' => 'name',
                'value' => config('app.name'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'app',
                'key' => 'copyright',
                'value' => 'Copyright © ' . config('app.name') . ' ' . date('Y') . '. All rights reserved.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_logo_square',
                'value' => '/assets/default/images/brand_logo_square.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_logo_16_9',
                'value' => '/assets/default/images/brand_logo_long.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'favicon',
                'value' => '/assets/default/images/brand_logo_square.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_user_avatar',
                'value' => '/assets/default/images/user_avatar.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_thumbnail_square',
                'value' => '/assets/default/images/thumbnail_square.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_thumbnail_16_9',
                'value' => '/assets/default/images/thumbnail_16_9.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'login',
                'key' => 'title',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'login',
                'key' => 'caption',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'login',
                'key' => 'poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'title',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'caption',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'title',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'caption',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'title',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'caption',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'title',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'caption',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'title',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'caption',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }

    /**
     * Share settings to view
     *
     * @return void
     */
    public static function handle()
    {
        $groupbBySettings = static::groupedSettings();

        // Share grouped settings data to views
        foreach ($groupbBySettings as $groups) {
            foreach ($groups as $setting) {
                view()->share($setting['key'], $setting['value']);
            }
        }
    }

    /**
     * Group default settings data
     *
     * @return array
     */
    public static function groupedSettings(): array
    {
        $settingsData = AppSetting::all()->toArray();

        // Check default app settings
        // If $settingsData is null, then static::allSettings will be share to the views
        $settings = $settingsData ?: static::allSettings();

        // Define variable as empty array
        $groupbBySettings = [];

        // Creating group by settings data
        foreach ($settings as $i => $setting) {
            in_array($setting['group'], $groupbBySettings) ?: $groupbBySettings[$setting['group']] = [];
        }

        // Push data to existing group data
        foreach ($groupbBySettings as $i => $group) {
            foreach ($settings as $j => $setting) {
                $setting['group'] != $i ?: array_push($groupbBySettings[$i], $setting);
            }
        }

        return $groupbBySettings;
    }
}