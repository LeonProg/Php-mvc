<?php

namespace App\Models;

use App\Middleware\Authenticate;

class User extends Authenticate
{
    public static function getUser()
    {
        $id = $_SESSION["AUTH_USER_ID"];
        $user = \R::findOne("users", "id = ?", [$id]);

        if (isset($user)) {
            return [
                "name" => $user->name,
                "email" => $user->email,
            ];
        }
        return false;


    }


}