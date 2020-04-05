<?php

namespace TestProject\Model;

class Koleksi
{
    protected $oDb;

    public function __construct()
    {
        $this->oDb = new \TestProject\Engine\Db;
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM koleksi');
		$oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $oStmt = $this->oDb->query('SELECT * FROM koleksi');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getKoleksi()
    {
        $oStmt = $this->oDb->query('SELECT * FROM koleksi');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getKlasifikasi()
    {
        $oStmt = $this->oDb->query('SELECT * FROM klasifikasi');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

     public function add(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO koleksi (no_koleksi, jenis_koleksi ) VALUES(:no_koleksi, :jenis_koleksi)');
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
	

    public function getById($idKoleksi)
    {
        //console.log($idKatalog);
		$oStmt = $this->oDb->prepare('SELECT no_koleksi, jenis_koleksi FROM koleksi WHERE no_koleksi = :id LIMIT 1');
        $oStmt->bindParam(':id', $idKoleksi);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	
	public function getAllById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM koleksi WHERE no_koleksi = :no_koleksi LIMIT 1');
        $oStmt->bindParam(':no_koleksi', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function update(array $aData)
    {
        $oStmt = $this->oDb->prepare('UPDATE koleksi SET jenis_koleksi = :jenis_koleksi WHERE no_koleksi = :no_koleksi LIMIT 1');
        $oStmt->bindValue(':no_koleksi', $aData['no_koleksi'], \PDO::PARAM_INT);
        $oStmt->bindValue(':jenis_koleksi', $aData['jenis_koleksi']);
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
        $oStmt = $this->oDb->prepare('DELETE FROM koleksi WHERE no_koleksi = :no_koleksi LIMIT 1');
        $oStmt->bindParam(':no_koleksi', $iId, \PDO::PARAM_INT);
        return $oStmt->execute();
    } 
}
