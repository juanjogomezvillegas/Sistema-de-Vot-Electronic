<?php

class UsuarisPDO extends ModelPDO
{
    public function llistat()
    {
        $registres = parent::llistatModel("usuari");
 
        return $registres;
    }

    public function countRegistres()
    {
        $total = parent::countRegistresModel("usuari");
 
        return $total;
    }

    public function isLogin($usuari, $password, $options)
    {
        $query = "select id,username,contrasenya from usuari where username = :nom;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nom' => $usuari]);
 
        $usuariLogat = $stm->fetch(\PDO::FETCH_ASSOC);

        $exists = false;
        if (isset($usuariLogat["username"]) && isset($usuariLogat["contrasenya"])) {
            $exists = true;
        } else {
            $exists = false;
        }

        if ($exists) {
            if (password_verify($password, $usuariLogat["contrasenya"])) {
                if (password_needs_rehash($usuariLogat["contrasenya"], PASSWORD_DEFAULT, $options)) {
                    $nouHash = password_hash($password, PASSWORD_DEFAULT, $options);

                    $this->updatePassword($usuariLogat["id"], $nouHash);
                }
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function get($nom)
    {
        $query = "select * from usuari where username = :nom;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nom' => $nom]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function add($username, $contrasenya, $rol)
    {
        $query = "insert into usuari (username,contrasenya,rol) values (:user,:pass,:rol);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':user' => $username,':pass' => $contrasenya,':rol' => $rol]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $query = "delete from usuari where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        parent::resetPrimarykeyModel("usuari");

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $rol)
    {
        $query = "update usuari set rol = :rol where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id,':rol' => $rol]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function updatePassword($id, $contrasenya)
    {
        $query = "update usuari set contrasenya = :pass where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id,':pass' => $contrasenya]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}