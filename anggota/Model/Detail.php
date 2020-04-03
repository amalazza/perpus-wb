<?php

namespace TestProject\Model;

class Detail
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
    

    public function getById($idKatalog)
    {
        //console.log($idKatalog);
        $oStmt = $this->oDb->prepare('SELECT a.no_katalog, b.nama_klasifikasi, c.jenis_koleksi, a.judul, a.pengarang, a.penerbit, a.kota_terbit, a.tahun_terbit, a.isbn, a.lokasi, a.absktrak, a.tanggal_masuk, a.stok FROM katalog a inner join klasifikasi b on b.no_klasifikasi = a.no_klasifikasi inner join koleksi c on c.no_koleksi = a. no_koleksi WHERE no_katalog = :id LIMIT 1');
        $oStmt->bindParam(':id', $idKatalog);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
    
    public function getAllById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM katalog WHERE no_katalog = :no_katalog LIMIT 1');
        $oStmt->bindParam(':no_katalog', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function update(array $aData)
    {
        $oStmt = $this->oDb->prepare('UPDATE katalog SET no_klasifikasi = :no_klasifikasi, no_koleksi = :no_koleksi, judul = :judul, pengarang = :pengarang, penerbit = :penerbit, kota_terbit = :kota_terbit, tahun_terbit = :tahun_terbit, isbn = :isbn, lokasi = :lokasi, absktrak = :absktrak, e_book = :e_book, cover = :cover, stok = :stok WHERE no_katalog = :no_katalog LIMIT 1');
        $oStmt->bindValue(':no_katalog', $aData['no_katalog'], \PDO::PARAM_INT);
        $oStmt->bindValue(':no_klasifikasi', $aData['no_klasifikasi']);
        $oStmt->bindValue(':no_koleksi', $aData['no_koleksi']);
        $oStmt->bindValue(':judul', $aData['judul']);
        $oStmt->bindValue(':pengarang', $aData['pengarang']);
        $oStmt->bindValue(':penerbit', $aData['penerbit']);
        $oStmt->bindValue(':kota_terbit', $aData['kota_terbit']);
        $oStmt->bindValue(':tahun_terbit', $aData['tahun_terbit']);
        $oStmt->bindValue(':isbn', $aData['isbn']);
        $oStmt->bindValue(':lokasi', $aData['lokasi']);
        $oStmt->bindValue(':absktrak', $aData['absktrak']);
        $oStmt->bindValue(':e_book', $aData['e_book']);
        $oStmt->bindValue(':cover', $aData['cover']);
        $oStmt->bindValue(':stok', $aData['stok']);
        return $oStmt->execute();
    }

    public function delete($iId)
    {
        $oStmt = $this->oDb->prepare('DELETE FROM katalog WHERE no_katalog = :no_katalog LIMIT 1');
        $oStmt->bindParam(':no_katalog', $iId, \PDO::PARAM_INT);
        return $oStmt->execute();
    } 
}
