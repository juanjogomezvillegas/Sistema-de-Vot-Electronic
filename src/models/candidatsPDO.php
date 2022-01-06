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
        from candidat c order by c.posicio desc, c.vots desc;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);

        $comptador = 0;
        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$comptador] = $registre;
            $comptador++;
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

    public function add($nom, $lema, $ideologia, $color)
    {
        $query = "insert into candidat (nom,lema_campanya,ideologia,color) values (:nom,:lema,:ideologia,:color);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nom' => $nom,':lema' => $lema,':ideologia' => $ideologia,':color' => $color]);

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

    public function update($id, $nom, $lema, $ideologia, $color)
    {
        $query = "update candidat set nom = :nom,lema_campanya = :lema,ideologia = :ideologia,color = :color where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id,':nom' => $nom,':lema' => $lema,':ideologia' => $ideologia,':color' => $color]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function sumaVots($id)
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

    public function restaVots($id)
    {
        $query = "update candidat set vots = vots - 1 where id = :id and vots > 0;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateImatge($id, $imatge)
    {
        $query = "update candidat set icona = :icona where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id,':icona' => $imatge]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}
