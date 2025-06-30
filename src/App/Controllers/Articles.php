<?php
/* classe article delcontroller con una function che ritorna semplicemente la view articles index */
class Articles
{
    public function index()
    {
        require "views/articles_index.php";
    }
}