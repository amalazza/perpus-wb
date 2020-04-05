<?php

namespace TestProject\Model;

class Buku
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
        $oStmt = $this->oDb->query('SELECT * FROM katalog ORDER BY judul ASC');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
    
    public function getTahun()
    {
        $oStmt = $this->oDb->query('SELECT * FROM tahunterbit ORDER BY thn_terbit DESC');
        $oStmt->execute();

        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getJenis()
    {
        $oStmt = $this->oDb->query('SELECT * FROM klasifikasi ORDER BY nama_klasifikasi ASC');
        $oStmt->execute();

        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM katalog a inner join klasifikasi b on b.no_klasifikasi = a.no_klasifikasi inner join koleksi c on c.no_koleksi = a. no_koleksi WHERE no_katalog = :postId LIMIT 1');
        $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getPDFById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM katalog WHERE no_katalog = :no_katalog LIMIT 1');
        $oStmt->bindParam(':no_katalog', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }


    // public function getAll()
    // {
    //     $oStmt = $this->oDb->query('SELECT * FROM kunjungan ORDER BY waktu_kunjungan DESC');
    //     return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    // }

    // public function add(array $aData)
    // {
    //     $oStmt = $this->oDb->prepare('INSERT INTO kunjungan (no_anggota, waktu_kunjungan) VALUES(:no_anggota, :waktu_kunjungan)');
    //     return $oStmt->execute($aData);
    // }

    // public function getById($iId)
    // {
    //     $oStmt = $this->oDb->prepare('SELECT * FROM kunjungan WHERE no_kunjungan = :no_kunjungan LIMIT 1');
    //     $oStmt->bindParam(':no_kunjungan', $iId, \PDO::PARAM_INT);
    //     $oStmt->execute();
    //     return $oStmt->fetch(\PDO::FETCH_OBJ);
    // }

    // public function update(array $aData)
    // {
    //     $oStmt = $this->oDb->prepare('UPDATE kunjungan SET no_anggota = :no_anggota WHERE no_kunjungan = :no_kunjungan LIMIT 1');
    //     $oStmt->bindValue(':no_kunjungan', $aData['no_kunjungan'], \PDO::PARAM_INT);
    //     $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
    //     return $oStmt->execute();
    // }

    // public function delete($iId)
    // {
    //     $oStmt = $this->oDb->prepare('DELETE FROM kunjungan WHERE no_kunjungan = :no_kunjungan LIMIT 1');
    //     $oStmt->bindParam(':no_kunjungan', $iId, \PDO::PARAM_INT);
    //     return $oStmt->execute();
    // }
}
