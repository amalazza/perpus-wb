<?php

namespace TestProject\Model;

class Dashboard
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

    public function getAnggota()
    {
        $oStmt = $this->oDb->query('SELECT COUNT(*) as total FROM anggota');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getKunjungan()
    {
        $oStmt = $this->oDb->query('SELECT COUNT(*) as total FROM kunjungan');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getKatalog()
    {
        $oStmt = $this->oDb->query('SELECT COUNT(*) as total FROM katalog');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

  
}
