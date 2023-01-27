<?php

namespace App\Services;

class Page
{
    /**
     * loader components
     *
     * @param $part_name
     * @return void
     */
    public static function part($part_name) : void
    {
        require_once "views/components/" . $part_name . ".php";
    }
}