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

            public function addAlog(array $aLog)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO logadmin (id_admin, activity) VALUES(:id_admin, :activity)');
        return $oStmt->execute($aLog);
    }
	
	public function getNIS()
    {
        $oStmt = $this->oDb->query('SELECT * FROM siswa WHERE nis NOT IN(SELECT no_anggota FROM anggota)');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getDataById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM siswa WHERE nis = :nis LIMIT 1');
        $oStmt->bindParam(':nis', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

     public function add(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO anggota (no_anggota, nama, kelas, alamat, no_telpon, email, password, foto) VALUES(:no_anggota, :nama, :kelas, :alamat, :no_telpon, :email, :password, :foto)');
        return $oStmt->execute($aData);
    }
	
	public function addSiswa(array $sData)
    {
        $oStmt = $this->oDb->prepare('REPLACE INTO siswa (nis,nama, jurusan, inisial_jurusan, tahun, kelas, unit) VALUES(:nis, :nama, :jurusan, :inisial_jurusan, :tahun, :kelas, :unit)');
        return $oStmt->execute($sData);
    }

    public function getById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT no_anggota, nama, kelas, alamat, no_telpon, email FROM anggota WHERE no_anggota = :id LIMIT 1');
        $oStmt->bindParam(':id', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
/*
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
