<?php

namespace TestProject\Model;

class Admin extends Kunjungan
{
    public function login($username)
    {
        $oStmt = $this->oDb->prepare('SELECT username, password FROM Admin WHERE username = :username LIMIT 1');
        $oStmt->bindValue(':username', $username, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);

        return @$oRow->password; // Use the PHP 5.5 password function
    }
}
