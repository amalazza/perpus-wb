<?php

namespace TestProject\Model;

class Kunjungan
{
    protected $oDb;

    public function __construct()
    {
        $this->oDb = new \TestProject\Engine\Db;
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM kunjungan INNER JOIN anggota USING (no_anggota) ORDER by waktu_kunjungan DESC LIMIT :offset, :limit');
        $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
        $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    // public function getKonfirmasi($iOffset, $iLimit)
    // {
    //     $oStmt = $this->oDb->prepare('SELECT * FROM kunjungan INNER JOIN anggota USING (no_anggota) WHERE waktu_kepulangan="0000-00-00 00:00:00" ORDER by waktu_kunjungan DESC LIMIT :offset, :limit');
    //     $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
    //     $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
    //     $oStmt->execute();
    //     return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    // }

    
    public function getKonfirmasi()
    {
        $oStmt = $this->oDb->query('SELECT * FROM kunjungan INNER JOIN anggota USING (no_anggota) WHERE waktu_kepulangan="0000-00-00 00:00:00" ORDER by waktu_kunjungan DESC');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $oStmt = $this->oDb->query('SELECT * FROM kunjungan INNER JOIN anggota USING (no_anggota) ORDER by waktu_kunjungan DESC');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAllAfterConfirm()
    {
        $oStmt = $this->oDb->query('SELECT * FROM kunjungan INNER JOIN anggota USING (no_anggota) WHERE waktu_kepulangan!= "0000-00-00 00:00:00" ORDER by waktu_kunjungan DESC');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function getAnggotaById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT no_anggota, nama, kelas, alamat, no_telpon, email, loker,  waktu_kunjungan, waktu_kepulangan FROM anggota INNER JOIN kunjungan USING (no_anggota) WHERE no_anggota = :id LIMIT 1');
        $oStmt->bindParam(':id', $iId);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getKonfirmasiById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT no_anggota, nama, kelas, alamat, no_telpon, email, loker, waktu_kunjungan, waktu_kepulangan FROM anggota INNER JOIN kunjungan USING (no_anggota) WHERE no_kunjungan = :id LIMIT 1');
        $oStmt->bindParam(':id', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getAnggota()
    {
        $oStmt = $this->oDb->query('SELECT * FROM anggota');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function add(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO kunjungan (no_anggota, loker) VALUES(:no_anggota, :loker)');
        return $oStmt->execute($aData);
    }

        public function addAlog(array $aLog)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO logadmin (id_admin, activity) VALUES(:id_admin, :activity)');
        return $oStmt->execute($aLog);
    }
    public function getAllById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM kunjungan WHERE no_kunjungan = :no_kunjungan LIMIT 1');
        $oStmt->bindParam(':no_kunjungan', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function update(array $aData)
    {
        $oStmt = $this->oDb->prepare('UPDATE kunjungan SET waktu_kepulangan = :waktu_kepulangan WHERE no_kunjungan = :no_kunjungan LIMIT 1');
        $oStmt->bindValue(':no_kunjungan', $aData['no_kunjungan'], \PDO::PARAM_INT);
        $oStmt->bindValue(':waktu_kepulangan', $aData['waktu_kepulangan']);
        return $oStmt->execute();
    }

    public function delete($iId)
    {
        $oStmt = $this->oDb->prepare('DELETE FROM kunjungan WHERE no_kunjungan = :no_kunjungan LIMIT 1');
        $oStmt->bindParam(':no_kunjungan', $iId, \PDO::PARAM_INT);
        return $oStmt->execute();
    }
}
