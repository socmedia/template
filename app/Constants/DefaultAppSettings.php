<?php

namespace App\Constants;

use Illuminate\Support\Facades\Schema;
use Modules\AppSetting\Entities\AppSetting;

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
                'key' => 'app_name',
                'alias' => 'app_name',
                'value' => config('app.name'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'app',
                'key' => 'copyright',
                'alias' => 'copyright',
                'value' => 'Copyright © ' . config('app.name') . ' ' . date('Y') . '. All rights reserved.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_logo_square',
                'alias' => 'default_logo_square',
                'value' => '/assets/default/images/brand_logo_square.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_logo_16_9',
                'alias' => 'default_logo_16_9',
                'value' => '/assets/default/images/brand_logo_long.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'favicon',
                'alias' => 'favicon',
                'value' => '/assets/default/images/brand_logo_square.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_user_avatar',
                'alias' => 'default_user_avatar',
                'value' => '/assets/default/images/user_avatar.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_thumbnail_square',
                'alias' => 'default_thumbnail_square',
                'value' => '/assets/default/images/thumbnail_square.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'asset',
                'key' => 'default_thumbnail_16_9',
                'alias' => 'default_thumbnail_16_9',
                'value' => '/assets/default/images/thumbnail_16_9.png',
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'login',
                'key' => 'login_title',
                'alias' => 'login_title',
                'value' => 'Login',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'login',
                'key' => 'login_caption',
                'alias' => 'login_caption',
                'value' => 'Use your registered account.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'login',
                'key' => 'login_poster',
                'alias' => 'login_poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'register_title',
                'alias' => 'register_title',
                'value' => 'Register',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'register_caption',
                'alias' => 'register_caption',
                'value' => 'Create a new account.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'register',
                'key' => 'register_poster',
                'alias' => 'register_poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'forgot_password_title',
                'alias' => 'forgot_password_title',
                'value' => 'Forgot Password',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'forgot_password_caption',
                'alias' => 'forgot_password_caption',
                'value' => 'Enter your registered email ID to reset the password.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'forgot_password',
                'key' => 'forgot_password_poster',
                'alias' => 'forgot_password_poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'confirm_password_title',
                'alias' => 'confirm_password_title',
                'value' => 'Confirm Password',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'confirm_password_caption',
                'alias' => 'confirm_password_caption',
                'value' => 'This is a secure area of the application. Please confirm your password before continuing.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'confirm_password',
                'key' => 'confirm_password_poster',
                'alias' => 'confirm_password_poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'reset_password_title',
                'alias' => 'reset_password_title',
                'value' => 'Generate New Password',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'reset_password_caption',
                'alias' => 'reset_password_caption',
                'value' => 'We received your reset password request. Please enter your new password!',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'reset_password',
                'key' => 'reset_password_poster',
                'alias' => 'reset_password_poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'verify_email_title',
                'alias' => 'verify_email_title',
                'value' => 'Verify Your Email',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'verify_email_caption',
                'alias' => 'verify_email_caption',
                'value' => 'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'verify_email',
                'key' => 'verify_email_poster',
                'alias' => 'verify_email_poster',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'key' => 'company_address',
                'alias' => 'Alamat Kantor',
                'value' => 'Jl. Mawar Raya No.A42, Baturan, Kec. Colomadu, Kab. Karanganyar, Jawa Tengah 57171',
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'key' => 'whatsapp_icon',
                'alias' => 'whatsapp_icon',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'key' => 'instagram_icon',
                'alias' => 'instagram_icon',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'key' => 'facebook_icon',
                'alias' => 'facebook_icon',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'key' => 'email_icon',
                'alias' => 'email_icon',
                'value' => null,
                'type' => 'image',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'key' => 'whatsapp_link',
                'alias' => 'whatsapp_link',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'key' => 'whatsapp_message',
                'alias' => 'whatsapp_message',
                'value' => null,
                'type' => 'string',
                'form_type' => 'textarea',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'key' => 'instagram_link',
                'alias' => 'instagram_link',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'key' => 'facebook_link',
                'alias' => 'facebook_link',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'key' => 'email',
                'alias' => 'email',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'contact',
                'key' => 'location',
                'alias' => 'location',
                'value' => null,
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
        ];
    }

    /**
     * Handle default app settings
     *
     * @return array
     */
    public static function allSeo(): array
    {
        return [
            [
                'group' => 'seo',
                'key' => 'seo.keywords',
                'value' => 'Digital Marketing,Digital Marketing Agency,Digital Marketing Agency Surakarta',
                'alias' => unslug('keywords'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'key' => 'seo.index.title',
                'value' => 'SOC Lyfe',
                'alias' => unslug('homepage_title'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'key' => 'seo.index.description',
                'value' => 'Deskripsi SOCLyfe',
                'alias' => unslug('homepage_description'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'key' => 'seo.category.title',
                'value' => 'Kanal',
                'alias' => unslug('category_title'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'key' => 'seo.category.description',
                'value' => 'Deskripsi Kanal SOCLyfe',
                'alias' => unslug('category_description'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'key' => 'seo.post.category.title',
                'value' => 'Post Kanal',
                'alias' => unslug('post_category_title'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'key' => 'seo.post.category.description',
                'value' => 'Deskripsi Post Kanal SOCLyfe',
                'alias' => unslug('post_category_description'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'key' => 'seo.search.title',
                'value' => 'Pencarian',
                'alias' => unslug('search_title'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'key' => 'seo.search.description',
                'value' => 'Deskripsi Pencarian SOCLyfe',
                'alias' => unslug('search_description'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'key' => 'seo.contact.title',
                'value' => 'Pencarian',
                'alias' => unslug('contact_title'),
                'type' => 'string',
                'form_type' => 'input',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ],
            [
                'group' => 'seo',
                'key' => 'seo.contact.description',
                'value' => 'Deskripsi Pencarian SOCLyfe',
                'alias' => unslug('contact_description'),
                'type' => 'string',
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
