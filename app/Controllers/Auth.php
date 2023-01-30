<?php

namespace App\Controllers;

use App\Services\Router;
use App\Services\Session;
use App\Utils\ErrorConsts;
use App\Utils\RouteConsts;

class Auth extends Controller
{

    public function registration($data)
    {
        Session::sessionErrors();

        $name = $data["name"];
        $email = $data["email"];
        $password = $data["password"];
        $password_confirmed = $data["password_confirmed"];

        $user = \R::findOne("users", "email = ?", [$email]);

        /**
         * Validate email
         */
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            Session::setErrors("email",ErrorConsts::VALID_EMAIL);
        }
        /**
          * Check email
         */
        if ($user)
        {
            Session::setErrors("email", ErrorConsts::VALID_EMAIL_UNIQUE);
        }

        /**
         * Validate password
         */
        if (strlen($password) < 6)
        {
            Session::setErrors("password",ErrorConsts::VALID_PASSWORD_MIN . '6');
        }

        /**
         * Validate password confirmed
         */
        if ($password !== $password_confirmed)
        {
            Session::setErrors("password_confirmed", ErrorConsts::VALID_PASSWORD_CONFIRMED);
        }
        /**
         * Registration user
         */
        if (Session::countErrors() === 0)
        {
            $user = \R::dispense('users',);
            $user->name = $name;
            $user->email = $email;
            $user->password = md5($password);
            $user->is_admin = 0;
            \R::store($user);
            unset($_SESSION["errors"]);
            Router::redirect(RouteConsts::LOGIN_ROUTE);
            die();
        }
        Router::redirect(RouteConsts::REGISTRATION_ROUTE);
    }

    public function login($data)
    {
        Session::sessionErrors();

        $email = $data["email"];
        $password = $data["password"];

        $user = \R::findOne("users", "email = ?", [$email]);

        if(!$user)
        {
            Session::setErrors("email", ErrorConsts::VALID_EMAIL_AND_PASSWORD);
        }

        if (md5($password) !== $user->password)
        {
            Session::setErrors("email", ErrorConsts::VALID_EMAIL_AND_PASSWORD);
        }

        if (Session::countErrors() === 0)
        {
            Session::set("AUTH_USER_ID", $user->id);
            Router::redirect('/');
            die();
        }

        Router::redirect(RouteConsts::LOGIN_ROUTE);
    }

    public function logout()
    {
        Session::unseSession();
        Router::redirect(RouteConsts::LOGIN_ROUTE);
        die();
    }
}
