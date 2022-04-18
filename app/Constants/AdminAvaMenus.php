<?php

namespace App\Constants;

use Exception;

class AdminAvaMenus
{
    protected static function menus()
    {
        return [
            // 'front.profile' => [
            //     'display_name' => 'Profile',
            //     'path' => route('front.profile'),
            //     'route_name' => 'front.profile',
            //     'visible' => true,
            //     'role' => 'Dealer|Dealer Group',
            //     'icon' => 'bx bx-user',
            // ],
            'profile' => [
                'display_name' => 'Profile',
                'path' => route('adm.user.profile.index'),
                'route_name' => 'adm.user.profile.index',
                'visible' => true,
                'role' => 'Developer|Admin',
                'icon' => 'bx bx-user',
            ],
            'admin-preferences' => [
                'display_name' => 'Preferences',
                'path' => route('adm.user.theme.index'),
                'route_name' => 'adm.user.theme.index',
                'visible' => true,
                'role' => 'Developer|Admin',
                'icon' => 'bx bx-paint',
            ],
            // 'preferences' => [
            //     'display_name' => 'Preferences',
            //     'path' => route('front.theme'),
            //     'route_name' => 'front.theme',
            //     'visible' => true,
            //     'role' => 'Dealer|Dealer Group',
            //     'icon' => 'bx bx-paint',
            // ],
            'settings' => [
                'display_name' => 'Settings',
                'path' => route('adm.settings.index'),
                'route_name' => 'adm.settings.index',
                'visible' => true,
                'role' => 'Developer',
                'icon' => 'bx bx-shield-quarter',
            ],
            'site_settings' => [
                'display_name' => 'Site Settings',
                'path' => route('adm.apps.index'),
                'route_name' => 'adm.apps.index',
                'visible' => true,
                'role' => 'Developer|Admin',
                'icon' => 'bx bx-cog',
            ],
            'artisan' => [
                'display_name' => 'Artisan',
                'path' => route('adm.artisan.index'),
                'route_name' => 'adm.artisan.index',
                'visible' => true,
                'role' => 'Developer',
                'icon' => 'bx bx-command',
            ],
            'menu_manager' => [
                'display_name' => 'Menu Manager',
                'path' => 'javascript:void(0)',
                'route_name' => null,
                'visible' => false,
                'role' => 'Developer|Admin',
                'icon' => 'bx bx-layer',
            ],
            'template' => [
                'display_name' => 'Template',
                'path' => url('/template'),
                'route_name' => null,
                'visible' => false,
                'role' => 'Developer|Admin',
                'icon' => 'bx bx-devices',
            ],
        ];
    }

    public static function getAll()
    {
        return static::menus();
    }

    public static function whereName(string $name)
    {
        try {
            return static::menus()[$name];
        } catch (Exception $exception) {
            abort(404, 'Sorry, menu with name ' . $name . ' was not found');
        }
    }
}