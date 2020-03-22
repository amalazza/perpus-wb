<?php

namespace TestProject\Model;

class Anggota
{
    protected $oDb;

    public function __construct()
    {
        $this->oDb = new \TestProject\Engine\Db;
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM anggota');
		$oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $oStmt = $this->oDb->query('SELECT * FROM anggota');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

     public function add(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO anggota (no_anggota, nama, kelas, alamat, no_telpon, email, password, foto) VALUES(:no_anggota, :nama, :kelas, :alamat, :no_telpon, :email, :password, :foto)');
        return $oStmt->execute($aData);
    }
	
	public function addSiswa(array $sData)
    {
        $oStmt = $this->oDb->prepare('REPLACE INTO siswa (nis,nama,kelas) VALUES(:nis, :nama, :kelas)');
        return $oStmt->execute($sData);
    }
/*
    public function getById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM kunjungan WHERE no_kunjungan = :no_kunjungan LIMIT 1');
        $oStmt->bindParam(':no_kunjungan', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function update(array $aData)
    {
        $oStmt = $this->oDb->prepare('UPDATE kunjungan SET no_anggota = :no_anggota WHERE no_kunjungan = :no_kunjungan LIMIT 1');
        $oStmt->bindValue(':no_kunjungan', $aData['no_kunjungan'], \PDO::PARAM_INT);
        $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
        return $oStmt->execute();
    }*/

    public function delete($iId)
    {
        $oStmt = $this->oDb->prepare('DELETE FROM anggota WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
        return $oStmt->execute();
    } 
}
