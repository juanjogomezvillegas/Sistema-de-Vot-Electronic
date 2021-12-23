<?php

/**
    * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
    * Classe que gestiona l'aplicació.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Emeset,  permet instanciar un objecte de l'aplicació definir el ruter que s'utilitzarà,
    * les rutes, la configuració i finalment executa l'aplicació.
    *
**/

namespace Emeset;

/**
    * Emeset: objecte que encapsula l'aplicació web.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Permet definir quin ruter utilitzem les rutes, la configuració i finalment
    * executar l'aplicació.
    *
**/
class Emeset
{

    public $contenidor;
    public $ruter = null;
    public $config = [];
    public $constructor = null;
    public $modelPDO;

    public function __construct($contenidor)
    {
        $this->contenidor = $contenidor;

        $this->resposta = $contenidor->resposta();
        $this->peticio = $contenidor->peticio();
        $this->ruter = $contenidor->ruter();
        $this->modelPDO = $contenidor->modelPDO();
    }

    public function ruta($id, $callback, $midelware = false)
    {
        $this->ruter->ruta($id, $callback, $midelware);
    }

    public function executa()
    {
        $resposta = $this->ruter->executa($this->peticio, $this->resposta);
        $resposta->resposta();
    }
}
