<?php

namespace App\Constants;

use Illuminate\Support\Facades\Schema;
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
                'key' => 'login_title',
                'value' => 'Login',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'login',
                'key' => 'login_caption',
                'value' => 'Use your registered account.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'login',
                'key' => 'login_poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'register_title',
                'value' => 'Register',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'register_caption',
                'value' => 'Create a new account.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'register_poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'forgot_password_title',
                'value' => 'Forgot Password',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'forgot_password_caption',
                'value' => 'Enter your registered email ID to reset the password.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'forgot_password_poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'confirm_password_title',
                'value' => 'Confirm Password',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'confirm_password_caption',
                'value' => 'This is a secure area of the application. Please confirm your password before continuing.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'confirm_password_poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'reset_password_title',
                'value' => 'Generate New Password',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'reset_password_caption',
                'value' => 'We received your reset password request. Please enter your new password!',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'reset_password_poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'verify_email_title',
                'value' => 'Verify Your Email',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'verify_email_caption',
                'value' => 'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'verify_email_poster',
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
        $settingsData = Schema::hasTable('app_settings') ? AppSetting::all()->toArray() : [];

        // Check default app settings
        // If $settingsData is null, then static::allSettings will be share to the views
        $settings = count($settingsData) > 0 ? $settingsData : static::allSettings();

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