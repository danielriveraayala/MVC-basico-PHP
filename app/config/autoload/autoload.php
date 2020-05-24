<?php
require_once "../app/Router.php";
require_once "../app/View.php";
spl_autoload_register(function ($clase) {
    $route = "../app/module/".str_replace("\\", "/", $clase).".php";
    if (file_exists($route)) {
        require_once $route;
    }

});