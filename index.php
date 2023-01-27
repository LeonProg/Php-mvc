<?php

use App\Services\App;
use App\Services\Session;

require_once __DIR__ . "/vendor/autoload.php";
App::start();
Session::startSession();
require_once __DIR__ . "/router/routes.php";

