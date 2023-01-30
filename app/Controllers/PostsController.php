<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\User;


class PostsController extends Controller
{
    public static function getPost(int $id)
    {

        $post =  self::Post()->findOne($id);


        return [
          "title" => $post->title,
          "description" => $post->description,
          "content" => $post->content,
          "cover_path" => $post->cover_path,
          "status" => $post->status,
        ];



    }



    public static function getPosts()
    {
        $posts =  self::Post()->all();
        $array = [];
        $user = new User();

        foreach ($posts as $post)
        {
            $array[]= [
                "id" => $post->id,
                "title" => $post->title,
                "description" => $post->description,
                "content" => $post->content,
                "cover_path" => $post->cover_path,
                "status" => $post->status,
                "user" => [
                    "id" => $post->user_id,
                    "name" => $user->findItem($post->user_id)->name,
                ]
            ];
        }

        return $array;

    }

    private static function Post()
    {
        return new Post();
    }



}