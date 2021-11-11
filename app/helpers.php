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
    return Carbon::parse($date)->age . ' y.o';
}

function socialMedia($type = null, $socialMediaValue)
{
    switch ($type) {
        case 'facebook':
            return 'https://facebook.com/' . $socialMediaValue;
            break;

        case 'instagram':
            return 'https://instagram.com/' . $socialMediaValue;
            break;

        case 'linkedin':
            return 'https://linkedin.com/in/' . $socialMediaValue;
            break;

        case 'tiktok':
            return 'https://tiktok.com/' . $socialMediaValue;
            break;

        default:
            return null;
            break;
    }

}

function user($column = null)
{
    $user = auth()->user();

    if ($user && $column) {
        return $user->$column;
    }
    return $user ? $user : null;
}