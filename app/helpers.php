<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
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
    return str_replace('_', ' ', str_replace('-', ' ', $slug));
}

function xssFilter($text)
{
    return preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $text);
}

function age($date)
{
    return $date ? Carbon::parse($date)->age . ' y.o' : null;
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

function number($number, $decimals)
{
    try {
        return number_format(str_replace(',', '', str_replace('.', '', $number)), $decimals, ',', '.');
    } catch (Exception $exeception) {
        return null;
    }
}

function dateTimeTranslated($date, $format = 'D d, M Y', $locale = 'id')
{
    try {
        return Carbon::parse($date)->locale($locale)->translatedFormat($format);
    } catch (Exception $exeception) {
        return null;
    }
}

function cacheQuery($key, $value = null, $time = null)
{
    if (Cache::has($key)) {
        return Cache::get($key);
    }

    Cache::put($key, $value, $time ?: now()->addHours(1));
    return Cache::get($key);
}

function removeFromStorage($disk = '', $filename = '')
{
    $path = storage_path('app/public/' . $disk . '/' . $filename);

    if (!File::exists($path)) {
        return false;
    }

    return File::delete($path);
}

function phone($number)
{
    return substr($number, 0, 1) == 0 ? substr($number, 1) : $number;
}

function title($text)
{
    try {
        return Str::title($text);
    } catch (Exception $exeception) {
        return null;
    }
}