<?php

namespace App\Services;

class Session
{
    public static function startSession()
    {
        session_start();
    }

    public static function sessionErrors()
    {
        unset($_SESSION["errors"]);
        $_SESSION["errors"] = [];
    }

    public static function setErrors($key,$error)
    {
        $_SESSION["errors"][$key] = $error;
    }

    public static function get($key, $value)
    {
        if (isset($_SESSION[$key][$value])) {
            echo $_SESSION[$key][$value];
        }
    }

    public static function countErrors() : int
    {
        return count($_SESSION["errors"]);
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function setUserId($id)
    {
        $_SESSION["AUTH_USER_ID"] = $id;
    }

    public static function unseSession()
    {
        session_unset();
        session_destroy();
    }

}