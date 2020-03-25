<?php

namespace TestProject\Model;

class Katalog
{
    protected $oDb;

    public function __construct()
    {
        $this->oDb = new \TestProject\Engine\Db;
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM katalog');
		$oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $oStmt = $this->oDb->query('SELECT * FROM katalog');
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
        $oStmt = $this->oDb->prepare('INSERT INTO katalog (no_katalog, no_klasifikasi, no_koleksi, judul, pengarang, penerbit, kota_terbit, tahun_terbit, isbn, lokasi, absktrak, tanggal_masuk, e_book, cover, stok ) VALUES(:no_katalog, :no_klasifikasi, :no_koleksi, :judul, :pengarang, :penerbit, :kota_terbit, :tahun_terbit, :isbn, :lokasi, :absktrak, :tanggal_masuk, :e_book, :cover, :stok)');
        return $oStmt->execute($aData);
    }
	
	public function getPDFById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM katalog WHERE no_katalog = :no_katalog LIMIT 1');
        $oStmt->bindParam(':no_katalog', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
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
        $oStmt = $this->oDb->prepare('DELETE FROM katalog WHERE no_katalog = :no_katalog LIMIT 1');
        $oStmt->bindParam(':no_katalog', $iId, \PDO::PARAM_INT);
        return $oStmt->execute();
    } 
}
