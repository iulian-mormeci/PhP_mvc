<?php
/* classe home con un solo metodo index che ritorna la view home.php */
class Home
{
    public function index()
    {
        require "views/home.php";
    }
}