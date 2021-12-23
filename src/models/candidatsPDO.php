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

    public function countRegistres()
    {
        $total = parent::countRegistresModel("candidat");
 
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

    public function add($dni, $nom, $lema)
    {
        $query = "insert into candidat (dni,nom,lema_campanya) values (:dni,:nom,:lema);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':dni' => $dni,':nom' => $nom,':lema' => $lema]);

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

    public function update($id, $dni, $nom, $lema)
    {
        $query = "update candidat set dni = :dni,nom = :nom,lema_campanya = :lema where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id,':dni' => $dni,':nom' => $nom,':lema' => $lema]);

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