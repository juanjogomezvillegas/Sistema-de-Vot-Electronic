<?php

/**
    * Exemple per a M07.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Classe contenidor,  té la responsabilitat d'instaciar els models i altres objectes.
    *
**/

namespace Emeset;

/**
    * Contenidor: Classe contenidor.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Classe contenidor, la responsabilitat d'instaciar els models i altres objectes.
    *
**/
class Contenidor
{
    public $config = [];
    public $rols = [];
    public $connexio;
    public $options;

    /**
     * __construct:  Crear contenidor
     *
     * @param $config paràmetres de configuració de l'aplicació.
     *
    **/
    public function __construct($config, $rols, $options)
    {
        $this->config = $config;
        $this->rols = $rols;
        $this->connexio = new \Connexio($config);
        $this->options = $options;
    }

    public function resposta()
    {
        return new \Emeset\Http\Resposta();
    }

    public function peticio()
    {
        return new \Emeset\Http\Peticio();
    }

    public function ruter()
    {
        return new \Emeset\Ruters\RuterParam($this);
    }

    public function connexio()
    {
       return $this->connexio;
    }

    public function modelPDO()
    {
        return new \ModelPDO($this->connexio);
    }

    public function usuarisPDO()
    {
        return new \UsuarisPDO($this->connexio);
    }

    public function candidatsPDO()
    {
        return new \CandidatsPDO($this->connexio);
    }

    public function configPDO()
    {
        return new \ConfigPDO($this->connexio);
    }

    public function options()
    {
        return $this->options;
    }
}