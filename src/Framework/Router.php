<?php 

namespace Framework;

/* classe router con all interno un attributo e due metodi */
class Router
{
    /* attributo array vuoto che conterra le rotte */
    private array $routes = [];
/* metodo che aggiunge le rotte e che vuole come parametri una stringa path e i parametri */
    public function add(string $path, array $params = []): void
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
        $path = trim($path, "/");

        foreach($this->routes as $route)
        {
            /* variabile con all interno il pattern di controllo per il path usando il metodo preg_match, il pattern viene inserito all interno di hastag, il simbolo ^ viene usato per l inizio della stringa, poi si passa uno slash per dire che la stringa deve iniziare per forza con uno slash, le parentesi tonde con all interno le quadre e la denominazione a-z e all esterno delle quadre un piu significa una sequenza di una o piu caratteri minuscoli all interno del gruppo catturato, mentre il simbolo $ serve per indicare la fine della stringa. Aggiungendo all interno delle tonde un punto interogativo seguito da un minore e maggiore con all interno un nome, si andra a dare un nome al gruppo catturato all interno del array */
            /* $pattern = "#^/(?<controller>[a-z]+)/(?<action>[a-z]+)$#"; */

            $pattern = $this->getDataFromRoutePath($route["path"]);
            /* controllo se all interno del path abbiamo trovato una corrispondenza */
            if(preg_match($pattern, $path, $matches))
            {
                /* andiamo a filtrare i risultati all interno dell array degli match per vedere soltanto le chiavi che abbiamo denominato prima all interno dell pattern */
                $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);

                return $matches;
            }
        }
        /* in caso di non match ritorna un valore booleano false */
        return false;
    }

    private function getDataFromRoutePath(string $route_path): string
    {
        $route_path = trim($route_path, "/");
        $segments = explode("/", $route_path);

        $segments = array_map(function(string $segment){

            if(preg_match("#^\{([a-z][a-z0-9]*)\}$#", $segment, $matches)){
                
                $segment = "(?<" . $matches[1] . ">[a-z]+)";

                return $segment;
            };

            

        },$segments);

        return "#^" . implode("/", $segments) . "$#";
        
    }
}