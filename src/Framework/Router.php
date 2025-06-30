<?php 

namespace Framework;

/* classe router con all interno un attributo e due metodi */
class Router
{
    /* attributo array vuoto che conterra le rotte */
    private array $routes = [];
/* metodo che aggiunge le rotte e che vuole come parametri una stringa path e i parametri */
    public function add(string $path, array $params): void
    {
        /* prende i parametri passati al metodo e li inserisce all interno dell attributo aray vuoto */
        $this->routes[] = [
            "path" => $path,
            "params" => $params
        ];
    }
/* metodo match che controlla se all interno dell array corrisponde il path e ne ritorna la variabile con i parametri altrimenti ritorna un valore booleano false */
    public function match(string $path): array|bool
    {
        foreach($this->routes as $route)
        {
            if($route["path"] === $path)
            {
                return $route["params"];
            }

        }
        /* in caso di non match ritorna un valore booleano false */
        return false;
    }
}