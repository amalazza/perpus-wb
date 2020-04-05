<?php

namespace TestProject\Model;

class Klasifikasi
{
    protected $oDb;

    public function __construct()
    {
        $this->oDb = new \TestProject\Engine\Db;
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM klasifikasi');
		$oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $oStmt = $this->oDb->query('SELECT * FROM klasifikasi');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getKoleksi()
    {
        $oStmt = $this->oDb->query('SELECT * FROM klasifikasi');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getKlasifikasi()
    {
        $oStmt = $this->oDb->query('SELECT * FROM klasifikasi');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

     public function add(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO klasifikasi (no_klasifikasi, nama_klasifikasi ) VALUES(:no_klasifikasi, :nama_klasifikasi)');
        return $oStmt->execute($aData);
    }

    public function addthnTerbit($tahun)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO tahunterbit (id_thn, thn_terbit) VALUES (:id_thn, :thn_terbit)');
        return $oStmt->execute($tahun);
    }
	
    public function addAlog(array $aLog)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO logadmin (id_admin, activity) VALUES(:id_admin, :activity)');
        return $oStmt->execute($aLog);
    }

    public function sDuplikat($aDup)
    {
        $oStmt = $this->oDb->prepare('SELECT COUNT(*) duplikat FROM tahunterbit WHERE thn_terbit = :thn_terbit GROUP BY thn_terbit HAVING duplikat > 1 ');
        $oStmt->bindParam(':thn_terbit', $aDup);
        $oStmt->execute(); 
        $number_of_rows = $oStmt->fetchColumn();
        return $number_of_rows;
    }

	public function getPDFById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM katalog WHERE no_katalog = :no_katalog LIMIT 1');
        $oStmt->bindParam(':no_katalog', $iId);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	
	public function getPDF($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM katalog WHERE no_katalog = :no_katalog LIMIT 1');
        $oStmt->bindParam(':no_katalog', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	

    public function getById($idKlasifikasi)
    {
        //console.log($idKatalog);
		$oStmt = $this->oDb->prepare('SELECT no_klasifikasi, nama_klasifikasi FROM klasifikasi WHERE no_klasifikasi = :id LIMIT 1');
        $oStmt->bindParam(':id', $idKlasifikasi);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	
	public function getAllById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM klasifikasi WHERE no_klasifikasi = :no_klasifikasi LIMIT 1');
        $oStmt->bindParam(':no_klasifikasi', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function update(array $aData)
    {
        $oStmt = $this->oDb->prepare('UPDATE klasifikasi SET nama_klasifikasi = :nama_klasifikasi WHERE no_klasifikasi = :no_klasifikasi LIMIT 1');
        $oStmt->bindValue(':no_klasifikasi', $aData['no_klasifikasi'], \PDO::PARAM_INT);
        $oStmt->bindValue(':nama_klasifikasi', $aData['nama_klasifikasi']);
		// $oStmt->bindValue(':no_koleksi', $aData['no_koleksi']);
		// $oStmt->bindValue(':jenis_katalog', $aData['jenis_katalog']);
		// $oStmt->bindValue(':judul', $aData['judul']);
		// $oStmt->bindValue(':pengarang', $aData['pengarang']);
		// $oStmt->bindValue(':penerbit', $aData['penerbit']);
		// $oStmt->bindValue(':kota_terbit', $aData['kota_terbit']);
		// $oStmt->bindValue(':tahun_terbit', $aData['tahun_terbit']);
		// $oStmt->bindValue(':isbn', $aData['isbn']);
		// $oStmt->bindValue(':lokasi', $aData['lokasi']);
		// $oStmt->bindValue(':absktrak', $aData['absktrak']);
		// $oStmt->bindValue(':e_book', $aData['e_book']);
		// $oStmt->bindValue(':cover', $aData['cover']);
		// $oStmt->bindValue(':stok', $aData['stok']);
        return $oStmt->execute();
    }

    public function delete($iId)
    {
        $oStmt = $this->oDb->prepare('DELETE FROM klasifikasi WHERE no_klasifikasi = :no_klasifikasi LIMIT 1');
        $oStmt->bindParam(':no_klasifikasi', $iId, \PDO::PARAM_INT);
        return $oStmt->execute();
    } 
}
