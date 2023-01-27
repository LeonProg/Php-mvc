<?php

namespace App\Services;

class App
{
    /**
     * start function libs and function db
     *
     * @return void
     */
    public static function start() : void
    {
        self::libs();
        self::db();
    }

    /**
     * Connect libs
     *
     * @return void
     */
    public static function libs() : void
    {
        $config = require_once "config/app.php";
        foreach ($config["libs"] as $lib)
        {
            require_once "libs/" . $lib . ".php";
        }
    }

    /**
     * Connect to Database
     *
     * @return void
     */
    public static function db() : void
    {
        $config = require_once "config/db.php";

        if ($config["enable"])
        {
            \R::setup( "mysql:host={$config['host']};dbname={$config['db_name']}",
                $config['username'], $config['password'] );

            if (!\R::testConnection())
            {
                die("Error database connect");
            }
        }
    }

}