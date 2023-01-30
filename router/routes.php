<?php

use App\Services\Router;
use App\Controllers\Auth;
use App\Utils\RouteConsts;
use \App\Controllers\PostManagerController;
use App\Controllers\PostsController;

Router::page(RouteConsts::INDEX_ROUTE, 'index');
Router::page(RouteConsts::LOGIN_ROUTE, 'login');
Router::page(RouteConsts::REGISTRATION_ROUTE, 'registration');
Router::page(RouteConsts::CREATE_POST_ROUTE, 'create-post', true);

Router::page(RouteConsts::POSTS_ROUTE . "/", 'post');


Router::post('/auth/registration', Auth::class, 'registration', true, false);
Router::post('/auth/login', Auth::class, 'login', true, false);
Router::post('/auth/logout', Auth::class,'logout',);
Router::post("/create/post", PostManagerController::class, "store", true, true );

Router::enable();
