<?php

namespace App\Utils;

class dd
{
    public static function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";

    }
}