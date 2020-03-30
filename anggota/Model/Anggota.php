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

<<<<<<< HEAD
    public function add(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO anggota (no_anggota, nama, kelas, alamat, no_telpon, email, password, foto) VALUES(:no_anggota, :nama, :kelas, :alamat, :no_telpon, :email, :password, :foto)');
        return $oStmt->execute($aData);
}
=======
    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM anggota');
        $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
        $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
>>>>>>> d1f473958da18d82c41e071b5855c7dedb29ffc3
}
