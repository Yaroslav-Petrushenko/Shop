<?php
    spl_autoload_register();

    // use app\config\routes;
    use app\vendor\Route;

    $route = new app\vendor\Route();
    $route->startApp();
