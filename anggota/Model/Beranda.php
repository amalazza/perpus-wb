<?php

namespace TestProject\Model;

class Beranda
{
    protected $oDb;

    public function __construct()
    {
        $this->oDb = new \TestProject\Engine\Db;
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM katalog');
        $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
        $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAllj()
    {
        $oStmt = $this->oDb->query('SELECT * FROM katalog ORDER BY tanggal_masuk DESC LIMIT 4');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAllPopuler()
    {
        $oStmt = $this->oDb->query('SELECT *, COUNT(p.no_katalog) FROM peminjaman p INNER JOIN katalog k ON k.no_katalog = p.no_katalog WHERE p.status = "kembali" GROUP BY p.no_katalog HAVING COUNT(p.no_katalog) >= 1 ORDER BY COUNT(p.no_katalog) >= 1 DESC LIMIT 4');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAllFavorite()
    {
        $oStmt = $this->oDb->query('SELECT *, COUNT(r.no_katalog) FROM rating r INNER JOIN katalog k ON k.no_katalog = r.no_katalog WHERE r.rate = "yes" AND r.ratingNumber>=4 GROUP BY r.no_katalog HAVING COUNT(r.no_katalog) >= 1 ORDER BY r.ratingNumber DESC LIMIT 4');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAllBacaEbook()
    {
        $oStmt = $this->oDb->query('SELECT *, COUNT(v.no_katalog) FROM view v INNER JOIN katalog k ON k.no_katalog = v.no_katalog GROUP BY v.no_katalog HAVING COUNT(v.no_katalog) >= 1 ORDER BY v.view_count DESC LIMIT 4');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function getById($idKatalog)
    {
        //console.log($idKatalog);
        $oStmt = $this->oDb->prepare('SELECT a.no_katalog, b.nama_klasifikasi, c.jenis_koleksi, a.judul, a.pengarang, a.penerbit, a.kota_terbit, a.tahun_terbit, a.isbn, a.lokasi, a.absktrak, a.tanggal_masuk, a.stok FROM katalog a inner join klasifikasi b on b.no_klasifikasi = a.no_klasifikasi inner join koleksi c on c.no_koleksi = a. no_koleksi WHERE no_katalog = :id LIMIT 1');
        $oStmt->bindParam(':id', $idKatalog);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

}
