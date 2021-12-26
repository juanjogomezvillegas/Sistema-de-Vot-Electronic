<?php

class ConfigPDO extends ModelPDO
{
    public function getNumEscons()
    {
        $query = "select numEscons from config;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateNumEscons($num)
    {
        $query = "update config set numEscons = :num;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':num' => $num]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}