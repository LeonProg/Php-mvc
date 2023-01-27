<?php

namespace App\Middleware;

use App\Models\User;

class Authenticate
{
    public static function isAuth()
    {
        if (isset($_SESSION["AUTH_USER_ID"]))
        {
            return true;
        }
        return false;
    }
}