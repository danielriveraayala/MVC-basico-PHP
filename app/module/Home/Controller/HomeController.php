<?php


namespace Home\Controller;


use View\View;

class HomeController
{
    public function __construct()
    {
        //echo __CLASS__;
    }


    public function index()
    {
        return new View(__METHOD__);
    }

    public function contacto()
    {
        return new View(__METHOD__, ["nombre" => 'daniel rivera']);
    }
}