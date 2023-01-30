<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\Router;
use App\Utils\dd;
use App\Utils\RouteConsts;

class PostManagerController
{
    public function store($data, $files)
    {
        $title = $data["title"];
        $description = $data["description"];
        $content = $data["content"];

        $image = $files["images"];

        $filename = str_replace(" ", "_",time(). $image["name"]);
        $path = "store/posts/" . $filename;


        if (move_uploaded_file($image["tmp_name"], $path))
        {
            $post = \R::dispense("posts");
            $post->title = $title;
            $post->description = $description;
            $post->content = $content;
            $post->status = "on-cheack";
            $post->user_id = User::getUserId();

            $post->cover_path = $path;

            \R::store($post);

            Router::redirect(RouteConsts::INDEX_ROUTE);
        }
        die();
    }


}