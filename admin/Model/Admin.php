<?php

namespace TestProject\Model;

class Admin extends Kunjungan
{
    public function login($username)
    {
        $oStmt = $this->oDb->prepare('SELECT username, password FROM Admin WHERE username = :username LIMIT 1');
        $oStmt->bindValue(':username', $username, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);

        return @$oRow->password; // Use the PHP 5.5 password function
    }
}

/* Model Table Admin */
class Add_Admin
{
    protected $oDb;

    public function __construct()
    {
        $this->oDb = new \TestProject\Engine\Db;
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM admin ORDER BY username DESC LIMIT :offset, :limit');
        $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
        $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $oStmt = $this->oDb->query('SELECT * FROM admin ORDER BY username DESC');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function addA(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO admin (username, password) VALUES(:username, :password)');
        return $oStmt->execute($aData);
    }

    public function getById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM admin WHERE id_admin = :id_admin LIMIT 1');
        $oStmt->bindParam(':id_admin', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function update(array $aData)
    {
        $oStmt = $this->oDb->prepare('UPDATE admin SET username = :username, password = :password WHERE id_admin = :id_admin LIMIT 1');
        $oStmt->bindValue(':username', $aData['username']);
        $oStmt->bindValue(':password', $aData['password']);
        $oStmt->bindValue(':id_admin', $aData['id_admin']);
        return $oStmt->execute();
    }

    public function delete($iId)
    {
        $oStmt = $this->oDb->prepare('DELETE FROM admin WHERE id_admin = :id_admin LIMIT 1');
        $oStmt->bindParam(':id_admin', $iId, \PDO::PARAM_INT);
        return $oStmt->execute();
    }
}

