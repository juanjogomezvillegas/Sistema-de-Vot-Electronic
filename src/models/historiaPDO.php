<?php

class HistoriaPDO extends ModelPDO
{
    public function get()
    {
        $query = "select * from historia order by data_event desc;";
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

    public function getEvent($id)
    {
        $query = "select * from historia where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([":id" => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function getUltim()
    {
        $query = "select * from historia where data_event = (select max(data_event) from historia);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function add($data, $nom, $color, $govern)
    {
        $query = "insert into historia (data_event,nom_event,color,govern) values (:data,:nom,:color,:govern);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':data' => $data,':nom' => $nom,':color' => $color,":govern" => $govern]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $nom, $color, $govern)
    {
        $query = "update historia set nom_event = :nom,color = :color,govern = :govern where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id,':nom' => $nom,':color' => $color,":govern" => $govern]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $query = "delete from historia where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        parent::resetPrimarykeyModel("historia");

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function deleteAll()
    {
        $query = "delete from historia;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        parent::resetPrimarykeyModel("historia");

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}
