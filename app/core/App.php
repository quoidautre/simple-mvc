<?php
class App
{
    public function call($controller, $method)
    {
        require_once 'app/controllers/' . $controller . '.php';
        $c = new $controller;
        $c->$method();
    }
}