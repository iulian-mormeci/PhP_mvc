<?php
/* variabile che contiene l url della pagina, preso usando il metodo parse_url e all interno usando la funzione request_uri all interno della variabile _server associata all interno dell array alla voce request uri poi usando il metodo php_url_path */
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
/* uso della funzione explode per delimitare il path usando come separatore /  */
$segments = explode("/", $path);
/* passaggio dei pezi del path all interno del action e del controller */
$action = $segments[2];
$controller = $segments[1];
/* importazione del controller in modo dinamico attraverso la variabile controller */
require "src/controllers/$controller.php";
/* nuovo oggetto creato usando la variabile controller di prima, che aiuta a creare una nuova istanza in modo dinamico del controller che ci serve */
$controller_object = new $controller;
/* richiamo del metodo che ci serve sul oggeto creato prima in modo dinamico, questo richiamo di metodo e anche lui dinamico attraverso la variabile action */
$controller_object->$action();