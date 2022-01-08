<?php

class HistoriaPDO extends ModelPDO
{
    public function get()
    {
        $query = "select * from historia order by data_event desc;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);

        $registres = $stm->fetch(\PDO::FETCH_ASSOC);

        return $registres;
    }

    public function delete()
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
