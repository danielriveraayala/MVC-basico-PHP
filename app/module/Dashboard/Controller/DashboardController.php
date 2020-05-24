<?php


namespace Dashboard\Controller;


use View\View;

class DashboardController
{
    public function __construct()
    {

    }

    public function index()
    {
        return new View(__METHOD__);
    }
}