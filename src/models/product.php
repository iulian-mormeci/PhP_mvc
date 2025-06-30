<?php
/* classe product con all interno un solo metodo get data */
class Product
{
/* metodo get data, si collega al db e fa una query di tutti i record all interno */
    public function getData(): array
    {
        /* variabile dsn con i dettagli per collegarsi al db, posizione del db, username, password, set caratteri utf8 e porta dsn sta per data source name */
        $dsn = "mysql:host=localhost;dbname=product_db;charset=utf8;port=3306";
        /* pdo o php data object, si instazia un nuovo oggetto pdo e si passa come parametri dsn e poi username e password, all interno dell array poi si passa un metodo per gli errori */
        $pdo = new PDO($dsn, 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        /* stmt che contiene la query che vogliamo fare tramite il pdo e il metodo query() */
        $stmt = $pdo->query('SELECT * FROM product');
        /* ritorno del stmt con metodo fetch all e all interno pdo::fetch assoc che ritorna un array associativo */
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}