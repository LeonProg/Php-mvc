<?php

use App\Services\Router;
use App\Controllers\Auth;
use App\Utils\RouteConsts;

Router::page(RouteConsts::INDEX_ROUTE, 'index');
Router::page(RouteConsts::LOGIN_ROUTE, 'login');
Router::page(RouteConsts::REGISTRATION_ROUTE, 'registration');
Router::page(RouteConsts::POSTS_ROUTE . "/", 'post');
Router::page(RouteConsts::CREATE_POST_ROUTE, 'create-post', true);

Router::post('/auth/registration', Auth::class, 'registration', true, false);
Router::post('/auth/login', Auth::class, 'login', true, false);
Router::post('/auth/logout', Auth::class,'logout',);

Router::enable();
