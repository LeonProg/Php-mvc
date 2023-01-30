<?php

namespace App\Services;

use App\Middleware\Authenticate;
use App\Utils\RouteConsts;


class Router extends Authenticate
{
    private static array $list = [];

    /**
     * @param string $uri
     * @param string $page_name
     * @param bool $isAuth
     * @return void
     */
    public static function page(string $uri, string $page_name, bool $isAuth = false, ) : void
    {

        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name,
            "post" => false,
            "isAuth" => $isAuth,
        ];
    }

    /**
     * @param string $uri
     * @param $class
     * @param string $method
     * @param bool $formData
     * @param bool $files
     * @return void
     */
    public static function post(string $uri,$class,string $method, bool $formData = false, bool $files = false) : void
    {
        self::$list[] = [
            "uri" => $uri,
            "class" => $class,
            "method" => $method,
            "formData" => $formData,
            "files" => $files,
            "post" => true,
        ];
    }

    /**
     * Routing
     *
     * @return void
     */
    public static function enable() : void
    {
        $query = $_GET['q'] ?? '';
        $params = explode('/', $query);


        foreach (self::$list as $route) {

//            if ($route["isAuth"])
//            {
//                if (self::isAuth())
//                {
//                    self::require($route["page"]);
//                } else {
//                    self::errorPage();
//                    die();
//                }
//            }

            if (isset($params[1]) && $route["uri"] . $params[1] === '/'.$query)
            {
                self::require($route["page"]);
                die();
            } elseif ($route["uri"] === '/'.$query) {

                if ($route["post"])
                {
                    $action = new $route["class"];
                    $method = $route["method"];

                    if ($route["formData"] && $route["files"])
                    {
                        $action->$method($_POST, $_FILES);
                    } elseif ($route["formData"] && !$route["files"]) {
                        $action->$method($_POST);
                    } else {
                        $action->$method();
                    }
                } else {
                    self::require($route["page"]);
                }
                die();
            }
        }
        self::errorPage();
    }

    /**
     * Error page
     *
     * @return void
     */
    private static function errorPage() : void
    {
        require_once "views/pages/error.php";
    }

    private static function require($route)
    {
        require_once "views/pages/" . $route . ".php";
    }

    /**
     * Redirect function
     *
     * @param string $uri
     * @return void
     */
    public static  function redirect(string $uri) : void
    {
        header('Location:' . $uri);
    }
}