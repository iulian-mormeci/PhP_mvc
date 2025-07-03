<?php
/* variabile che contiene l url della pagina, preso usando il metodo parse_url e all interno usando la funzione request_uri all interno della variabile _server associata all interno dell array alla voce request uri poi usando il metodo php_url_path */
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
/* uso della funzione di autoload di php, all interno abbiamo una funzione con una stringa e parametro class name all interno della funzione passiamo la variabile class name all interno del require */
spl_autoload_register(function (string $class_name)
{
    require "src/" . str_replace("\\", "/", $class_name) . ".php";
});

/* inizializazione di un nuovo oggetto router */
$router = new Framework\Router;
/* aggiunta delle rotte del sito web usando il metodo della classe router add() e passando come parametro all interno path */
$router->add("/{controller}/{action}");
$router->add("/home/index", ["controller" => "home", "action" => "index"]); /* rotta per la home index */
$router->add("/products", ["controller" => "products", "action" => "index"]);/* rotta per i products */
$router->add("/", ["controller" => "home", "action" => "index"]);/* rotta per la home page */

/* creazione variabile e esecuzione del metodo match con passaggio della variabile path all interno */
$params = $router->match($path);


/* controllo se all interno della variabile params e presente un valore booleano false per rotta non trovata, se trova false esce e ritorna il messaggio rotta non trovata */
if($params === false)
{
    exit("No route to match");
}

/* passaggio dei pezi del path all interno del action e del controller */
$action = $params["action"];
$controller = "App\Controllers\\" . ucwords($params["controller"]) ;

/* nuovo oggetto creato usando la variabile controller di prima, che aiuta a creare una nuova istanza in modo dinamico del controller che ci serve */
$controller_object = new $controller;
/* richiamo del metodo che ci serve sul oggeto creato prima in modo dinamico, questo richiamo di metodo e anche lui dinamico attraverso la variabile action */
$controller_object->$action();