<?php
/* modello article con un metodo get data che si collega al db e fa una querry di tutti i record al itnerno della tabella  */
class Article 
{
    public function getData()
    {
        /* variabile per la connessione al db con tutti i dettagli */
        $conn = mysqli_connect("localhost", 'root', 'root', 'mvc');
        /* variabile result con la query all interno e passaggio della variabile conn come parametro della stessa */
        $result = mysqli_query($conn, 'SELECT * FROM article');
        /* ritorno dei record all interno del db tramite array associativo usando il metodo mysqli_assoc */
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}