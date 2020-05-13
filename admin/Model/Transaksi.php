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
        $oStmt = $this->oDb->prepare('SELECT * FROM denda LIMIT 1');
		$oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	
	public function getInfoDenda()
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM denda');
		$oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getInfoDendaById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM denda WHERE id_denda = :id_denda LIMIT 1');
        $oStmt->bindParam(':id_denda', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	
	public function getInfoPerpanjangan()
    {
        $oStmt = $this->oDb->query('SELECT * FROM perpanjangan');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getInfoPerpanjanganById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM perpanjangan WHERE id_perpanjangan = :id_perpanjangan LIMIT 1');
        $oStmt->bindParam(':id_perpanjangan', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
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
		$oStmt = $this->oDb->prepare('SELECT a.no_peminjaman, b.no_anggota, b.nama, c.no_katalog, c.judul, a.tanggal_pinjam, a.tanggal_kembali, a.perpanjangan_ke, a.keterlambatan, a.denda FROM peminjaman a inner join anggota b on b.no_anggota = a.no_anggota inner join katalog c on c.no_katalog = a.no_katalog WHERE status="kembali"');
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
	
	public function editPerpanjangan(array $aData){
		$oStmt = $this->oDb->prepare('UPDATE perpanjangan SET hari = :hari, batas = :batas WHERE id_perpanjangan = :id_perpanjangan');
		$oStmt->bindValue(':id_perpanjangan', $aData['id_perpanjangan'], \PDO::PARAM_INT);
		$oStmt->bindValue(':hari', $aData['hari']);
		$oStmt->bindValue(':batas', $aData['batas']);
		return $oStmt->execute();
	}
	
	public function editDenda(array $aData){
		$oStmt = $this->oDb->prepare('UPDATE denda SET denda_per_hari = :denda_per_hari, denda_maks = :denda_maks WHERE id_denda = :id_denda');
		$oStmt->bindValue(':id_denda', $aData['id_denda'], \PDO::PARAM_INT);
		$oStmt->bindValue(':denda_per_hari', $aData['denda_per_hari']);
		$oStmt->bindValue(':denda_maks', $aData['denda_maks']);
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
		$oStmt = $this->oDb->prepare('UPDATE peminjaman SET denda = :denda, tanggal_kembali = :tanggal_kembali, keterlambatan = :keterlambatan, status = :status WHERE no_peminjaman = :no_peminjaman LIMIT 1');
		$oStmt->bindValue(':no_peminjaman', $aData['no_peminjaman'], \PDO::PARAM_INT);
		$oStmt->bindValue(':denda', $aData['denda']);
		$oStmt->bindValue(':keterlambatan', $aData['keterlambatan']);
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
