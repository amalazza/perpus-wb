<?php

namespace TestProject\Model;

class Anggota extends Beranda
{
    public function login($no_anggota)
    {
        $oStmt = $this->oDb->prepare('SELECT no_anggota, password FROM Anggota WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindValue(':no_anggota', $no_anggota, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);

        return @$oRow->password; // Use the PHP 5.5 password function
    }
}
