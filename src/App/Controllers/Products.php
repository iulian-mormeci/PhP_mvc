<?php 

namespace App\Controllers;
use \App\Models\Product;
/* classe products con all interno due metodi index e show */
class Products
{
/* metodo index che importa il file del modello product e ne inizializza un nuovo oggetto poi usa il metodo getData per avere i dati dal interno del db poi ritorna la vista products index */
    public function index()
    {

        $model = new Product;

        $products = $model->getData();

        require "views/products_index.php";
    }
/* metodo show che ritorna semplicemente la vista show.php */
    public function show()
    {
        require "views/show.php";
    }
}