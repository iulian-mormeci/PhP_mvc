<?php 
/* namespace  */
namespace App\Controllers;
/* uso del metodo use all interno del file per poter usare il model all interno del file senza dover richiamare il percorso completo, usando la keyword use non abbiamo bisogno di inserire il backslash al inizio, mentre se utilizziamo il percorso completo all interno del inizializazione del oggetto dobbiamo usare anche il backslash all inizio per dire a php che dobbiamo ricercare il file dal root e non dal namespace dove siamo */
use App\Models\Product;
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