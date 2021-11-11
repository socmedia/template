<?php

namespace App\Constants;

use Exception;

class AdminAvaMenus
{
    protected static function menus()
    {
        return [
            'profile' => [
                'path' => route('adm.user.profile.index'),
                'route_name' => 'adm.user.profile.index',
            ],
            'settings' => [
                'path' => '',
                'route' => '',
            ],
            'menu_manager' => [
                'path' => '',
                'route' => '',
            ],
            'template' => [
                'path' => '',
                'route' => '',
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