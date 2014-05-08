<?php
class HomeController extends Controller
{
    public function index()
    {
        $name = 'Alex';
        $this->view('home/index', array('name' => $name));
    }
}