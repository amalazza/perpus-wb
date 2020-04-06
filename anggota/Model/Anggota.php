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

    public function ambil_nama($username)
    {
        $oStmt = $this->oDb->prepare('SELECT no_anggota,nama FROM anggota WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindValue(':no_anggota', $username, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);

        return @$oRow->nama; // Use the PHP 5.5 password function
    }

    public function ambil_kelas($username)
    {
        $oStmt = $this->oDb->prepare('SELECT no_anggota,kelas FROM anggota WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindValue(':no_anggota', $username, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);

        return @$oRow->kelas; // Use the PHP 5.5 password function
    }

    public function add(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO anggota (no_anggota, nama, kelas, alamat, no_telpon, email, password, foto) VALUES(:no_anggota, :nama, :kelas, :alamat, :no_telpon, :email, :password, :foto)');
        return $oStmt->execute($aData);
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM anggota');
        $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
        $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

	public function getById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM anggota WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	
	public function update(array $aData)
    {
        $oStmt = $this->oDb->prepare('UPDATE anggota SET nama = :nama, kelas = :kelas, no_telpon = :no_telpon, email = :email, alamat = :alamat, password = :password, foto = :foto WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindValue(':nama', $aData['nama']);
		$oStmt->bindValue(':kelas', $aData['kelas']);
        $oStmt->bindValue(':no_telpon', $aData['no_telpon']);
        $oStmt->bindValue(':email', $aData['email']);
        $oStmt->bindValue(':alamat', $aData['alamat']);
		$oStmt->bindValue(':password', $aData['password']);
        $oStmt->bindValue(':foto', $aData['foto']);
        $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
        return $oStmt->execute($aData);
    }
}
