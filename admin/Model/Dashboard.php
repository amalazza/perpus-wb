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
        $oStmt = $this->oDb->prepare('SELECT COUNT(*) FROM anggota');
        $oStmt->execute(); 
        $number_of_rows = $oStmt->fetchColumn(); 

        return $number_of_rows;
    }

    public function getKunjungan()
    {
        $oStmt = $this->oDb->prepare('SELECT COUNT(*) FROM kunjungan');
        $oStmt->execute(); 
        $number_of_rows = $oStmt->fetchColumn(); 

        return $number_of_rows;
    }

    public function getKatalog()
    {
        $oStmt = $this->oDb->prepare('SELECT COUNT(*) FROM katalog');
        $oStmt->execute(); 
        $number_of_rows = $oStmt->fetchColumn(); 

        return $number_of_rows;
    }

  
}
