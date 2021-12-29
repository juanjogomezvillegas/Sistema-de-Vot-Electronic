<?php

class CandidatsPDO extends ModelPDO
{
    public function llistat()
    {
        $query = "select * from candidat order by vots desc;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);
 
        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$registre["id"]] = $registre;
        }
 
        return $registres;
    }

    public function resultats()
    {
        $query = "select c.*, IFNULL(round((c.vots / (select sum(vots) from candidat)) * (select numEscons from config limit 1)), 0) as escons
        from candidat c order by c.vots desc;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);
 
        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$registre["id"]] = $registre;
        }
 
        return $registres;
    }

    public function reiniciarResultats()
    {
        $query = "update candidat set vots = :vots;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':vots' => 0]);

        $query = "update candidat set posicio = :posicio;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':posicio' => 'no']);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function countRegistres()
    {
        $total = parent::countRegistresModel("candidat");
 
        return $total;
    }

    public function countVots()
    {
        $query = "select IFNULL(sum(vots), 0) total from candidat;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);
        
        $total = $stm->fetch(\PDO::FETCH_ASSOC);

        return $total;
    }

    public function get($id)
    {
        $query = "select * from candidat where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function add($nom, $lema)
    {
        $query = "insert into candidat (nom,lema_campanya) values (:nom,:lema);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nom' => $nom,':lema' => $lema]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $query = "delete from candidat where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        parent::resetPrimarykeyModel("candidat");

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $nom, $lema)
    {
        $query = "update candidat set nom = :nom,lema_campanya = :lema where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id,':nom' => $nom,':lema' => $lema]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function votar($id)
    {
        $query = "update candidat set vots = vots + 1 where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}