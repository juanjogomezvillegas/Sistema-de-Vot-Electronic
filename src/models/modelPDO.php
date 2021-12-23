<?php

class ModelPDO
{
    protected $sql;

    public function __construct($connexio)
    {
        $this->sql = $connexio->getConnexio();
    }

    public function resetPrimarykeyModel($taula)
    {
        $stm = $this->sql->prepare("alter table $taula AUTO_INCREMENT = 1;");
        $result = $stm->execute([]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function llistatModel($taula)
    {
        $query = "select * from $taula;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);
 
        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$registre["id"]] = $registre;
        }
 
        return $registres;
    }

    public function countRegistresModel($taula)
    {
        $query = "select count(*) as total from $taula;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);
        
        $total = $stm->fetch(\PDO::FETCH_ASSOC);

        return $total;
    }
}