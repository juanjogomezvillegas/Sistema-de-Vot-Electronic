<?php

class PactometrePDO extends ModelPDO
{
    public function get($posicio)
    {
        $query = "select IFNULL(sum(a.escons), 0) as total
        from (select c.posicio, IFNULL(round((c.vots / (select sum(vots) from candidat)) * (select numEscons from config limit 1)), 0) as escons
        from candidat c order by c.vots desc) as a
        where a.posicio like :posicio;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':posicio' => $posicio]);

        $registres = $stm->fetch(\PDO::FETCH_ASSOC);

        return $registres;
    }

    public function updatePosicio($id, $posicio)
    {
        $query = "update candidat set posicio = :posicio where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id,':posicio' => $posicio]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}
