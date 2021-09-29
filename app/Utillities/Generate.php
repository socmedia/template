<?php

namespace App\Utillities;

use Illuminate\Support\Facades\Crypt;

class Generate
{
    /**
     * Generate unique id
     *
     * @param  int $length
     * @return string
     */
    public static function ID(int $length = 16): string
    {
        $crypt = Crypt::encrypt(substr(sha1(rand(0, 9)), 0, 10));
        return substr($crypt, rand(0, 180), $length);
    }
}