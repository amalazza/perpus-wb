<?php

namespace TestProject\Model;

class Transaksi
{
    protected $oDb;

    public function __construct()
    {
        $this->oDb = new \TestProject\Engine\Db;
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM anggota');
		$oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getDenda()
    {
        $oStmt = $this->oDb->query('SELECT * FROM denda');
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	
	public function getPesanan($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT a.no_peminjaman, b.no_anggota, b.nama, c.no_katalog, c.judul, c.lokasi FROM peminjaman a inner join anggota b on b.no_anggota = a.no_anggota inner join katalog c on c.no_katalog = a.no_katalog WHERE status="dipesan"');
		$oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getPeminjaman($iOffset, $iLimit)
    {
		//salah
        $oStmt = $this->oDb->prepare('SELECT a.no_peminjaman, b.no_anggota, b.nama, c.no_katalog, c.judul, a.tanggal_pinjam, a.batas_kembali, a.perpanjangan_ke FROM peminjaman a inner join anggota b on b.no_anggota = a.no_anggota inner join katalog c on c.no_katalog = a.no_katalog WHERE status="dipinjam"');
		$oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getPengembalian($iOffset, $iLimit)
    {
<<<<<<< HEAD
		$oStmt = $this->oDb->prepare('SELECT a.no_peminjaman, b.no_anggota, b.nama, c.no_katalog, c.judul, a.tanggal_pinjam, a.tanggal_kembali, a.perpanjangan_ke, a.keterlambatan, a.denda FROM peminjaman a inner join anggota b on b.no_anggota = a.no_anggota inner join katalog c on c.no_katalog = a.no_katalog WHERE status="kembali"');
=======
		$oStmt = $this->oDb->prepare('SELECT a.no_peminjaman, b.no_anggota, b.nama, c.no_katalog, c.judul, a.tanggal_pinjam, a.tanggal_kembali, a.perpanjangan_ke FROM peminjaman a inner join anggota b on b.no_anggota = a.no_anggota inner join katalog c on c.no_katalog = a.no_katalog WHERE status="kembali"');
>>>>>>> 0b4ebb6a38a03731a529150093d7d5a15a1a15c3
		$oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $oStmt = $this->oDb->query('SELECT * FROM anggota');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

            public function addAlog(array $aLog)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO logadmin (id_admin, activity) VALUES(:id_admin, :activity)');
        return $oStmt->execute($aLog);
    }
	
	public function getNIS()
    {
        $oStmt = $this->oDb->query('SELECT * FROM anggota');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getKatalog()
    {
        $oStmt = $this->oDb->query('SELECT * FROM katalog WHERE stok != "0" AND jenis_katalog != "E-Book"');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getDataById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM siswa WHERE nis = :nis LIMIT 1');
        $oStmt->bindParam(':nis', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

     public function pinjamBaru(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO peminjaman (no_anggota, no_katalog, tanggal_pinjam, batas_kembali, status) VALUES(:no_anggota, :no_katalog, :tanggal_pinjam, :batas_kembali, :status)');
        return $oStmt->execute($aData);
    }

    public function getById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT no_anggota, nama, kelas, alamat, no_telpon, email FROM anggota WHERE no_anggota = :id LIMIT 1');
        $oStmt->bindParam(':id', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	
	public function getPeminjamanById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM peminjaman WHERE no_peminjaman = :id LIMIT 1');
        $oStmt->bindParam(':id', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function minusStok($no_katalog)
    {
        $oStmt = $this->oDb->prepare('UPDATE katalog SET stok = stok - 1 WHERE no_katalog = :no_katalog LIMIT 1');
        $oStmt->bindParam(':no_katalog', $no_katalog, \PDO::PARAM_INT);
        return $oStmt->execute();
    }
	
	public function plusStok($no_katalog)
    {
        $oStmt = $this->oDb->prepare('UPDATE katalog SET stok = stok + 1 WHERE no_katalog = :no_katalog LIMIT 1');
        $oStmt->bindParam(':no_katalog', $no_katalog, \PDO::PARAM_INT);
        return $oStmt->execute();
    }

    public function delete($iId)
    {
        $oStmt = $this->oDb->prepare('DELETE FROM anggota WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
        return $oStmt->execute();
    } 
	
	public function deletePesanan($iId)
    {
        $oStmt = $this->oDb->prepare('DELETE FROM peminjaman WHERE no_peminjaman = :id LIMIT 1');
        $oStmt->bindParam(':id', $iId, \PDO::PARAM_INT);
        return $oStmt->execute();
    } 
	
	public function perpanjangan(array $aData){
		$oStmt = $this->oDb->prepare('UPDATE peminjaman SET batas_kembali = :batas_kembali, perpanjangan_ke = perpanjangan_ke + 1 WHERE no_peminjaman = :no_peminjaman LIMIT 1');
		$oStmt->bindValue(':no_peminjaman', $aData['no_peminjaman'], \PDO::PARAM_INT);
		$oStmt->bindValue(':batas_kembali', $aData['batas_kembali']);
		return $oStmt->execute();
	}
	
	public function updatePesanan(array $aData){
		$oStmt = $this->oDb->prepare('UPDATE peminjaman SET tanggal_pinjam = :tanggal_pinjam, batas_kembali = :batas_kembali, status = :status WHERE no_peminjaman = :no_peminjaman LIMIT 1');
		$oStmt->bindValue(':no_peminjaman', $aData['no_peminjaman'], \PDO::PARAM_INT);
		$oStmt->bindValue(':tanggal_pinjam', $aData['tanggal_pinjam']);
		$oStmt->bindValue(':batas_kembali', $aData['batas_kembali']);
		$oStmt->bindValue(':status', $aData['status']);
		return $oStmt->execute();
	}
	
	public function pengembalian(array $aData){
<<<<<<< HEAD
		$oStmt = $this->oDb->prepare('UPDATE peminjaman SET denda = :denda, tanggal_kembali = :tanggal_kembali, keterlambatan = :keterlambatan, status = :status WHERE no_peminjaman = :no_peminjaman LIMIT 1');
		$oStmt->bindValue(':no_peminjaman', $aData['no_peminjaman'], \PDO::PARAM_INT);
		$oStmt->bindValue(':denda', $aData['denda']);
		$oStmt->bindValue(':keterlambatan', $aData['keterlambatan']);
=======
		$oStmt = $this->oDb->prepare('UPDATE peminjaman SET tanggal_kembali = :tanggal_kembali, status = :status WHERE no_peminjaman = :no_peminjaman LIMIT 1');
		$oStmt->bindValue(':no_peminjaman', $aData['no_peminjaman'], \PDO::PARAM_INT);
>>>>>>> 0b4ebb6a38a03731a529150093d7d5a15a1a15c3
		$oStmt->bindValue(':tanggal_kembali', $aData['tanggal_kembali']);
		$oStmt->bindValue(':status', $aData['status']);
		return $oStmt->execute();
	}
	
	public function getPerpanjangan()
    {
        $oStmt = $this->oDb->query('SELECT * FROM perpanjangan');
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
}
