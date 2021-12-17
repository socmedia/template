<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

function activeRouteIs($routeName, $active = 'mm-active')
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
    return $date ? Carbon::parse($date)->age . ' y.o' : null;
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

function numberShortner($n)
{
    if ($n >= 0 && $n < 1000) {
        // 1 - 999
        $n_format = floor($n);
        $suffix = '';
    } else if ($n >= 1000 && $n < 1000000) {
        // 1k-999k
        $n_format = floor($n / 1000);
        $suffix = 'K+';
    } else if ($n >= 1000000 && $n < 1000000000) {
        // 1m-999m
        $n_format = floor($n / 1000000);
        $suffix = 'M+';
    } else if ($n >= 1000000000 && $n < 1000000000000) {
        // 1b-999b
        $n_format = floor($n / 1000000000);
        $suffix = 'B+';
    } else if ($n >= 1000000000000) {
        // 1t+
        $n_format = floor($n / 1000000000000);
        $suffix = 'T+';
    }

    return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
}