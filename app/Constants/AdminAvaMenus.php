<?php

namespace App\Constants;

use Exception;

class AdminAvaMenus
{
    protected static function menus()
    {
        return [
            'profile' => [
                'display_name' => 'Profile',
                'path' => route('adm.user.profile.index'),
                'route_name' => 'adm.user.profile.index',
                'visible' => true,
                'role' => 'Developer|Admin|User|Dealer',
                'icon' => 'bx bx-user',
            ],
            'site_settings' => [
                'display_name' => 'Site Settings',
                'path' => route('adm.user.apps.index'),
                'route_name' => 'adm.user.apps.index',
                'visible' => true,
                'role' => 'Developer|Admin',
                'icon' => 'bx bx-cog',
            ],
            'menu_manager' => [
                'display_name' => 'Menu Manager',
                'path' => 'javascript:void(0)',
                'route_name' => null,
                'visible' => true,
                'role' => 'Developer|Admin',
                'icon' => 'bx bx-layer',
            ],
            'template' => [
                'display_name' => 'Template',
                'path' => url('/template'),
                'route_name' => null,
                'visible' => true,
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