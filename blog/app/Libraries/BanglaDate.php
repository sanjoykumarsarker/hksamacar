<?php

namespace App\Libraries;

class BanglaDate
{

    private static $replace_array = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারি", "ফেব্রুয়ারি", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর"];
    private static $search_array = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    public static function trans($date)
    {
        return str_replace(static::$search_array, static::$replace_array, $date);
    }
}
