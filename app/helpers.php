<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

function activeRouteIs($routeName, $active = 'active')
{
    return request()->routeIs($routeName) ? $active : '';
}

function slug($string)
{
    return Str::slug($string);
}

function unSlug($slug)
{
    return str_replace('-', ' ', $slug);
}

function xssFilter($text)
{
    return preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $text);
}

function age($date)
{
    return Carbon::parse($date)->age;
}

function user($column = null)
{
    $user = auth()->user();

    if ($user && $column) {
        return $user->$column;
    }
    return $user ? $user : null;
}