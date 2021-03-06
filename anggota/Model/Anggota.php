<?php

namespace TestProject\Model;

class Anggota extends Beranda
{
    public function login($no_anggota)
    {
        $oStmt = $this->oDb->prepare('SELECT no_anggota, password FROM Anggota WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindValue(':no_anggota', $no_anggota, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);

        return @$oRow->password; // Use the PHP 5.5 password function
    }
	
	public function updatePesananan(){
		$oStmt = $this->oDb->prepare('DELETE FROM pemesanan WHERE batas_pengambilan_buku<=DATE_SUB(NOW(), INTERVAL 1 DAY)');
		$oStmt->execute();
	}

    public function ambil_nama($username)
    {
        $oStmt = $this->oDb->prepare('SELECT no_anggota,nama FROM anggota WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindValue(':no_anggota', $username, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);

        return @$oRow->nama; // Use the PHP 5.5 password function
    }
public function addAngLog(array $aLog)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO loganggota (no_anggota, activity) VALUES(:no_anggota, :activity)');
        return $oStmt->execute($aLog);
    }
    public function ambil_kelas($username)
    {
        $oStmt = $this->oDb->prepare('SELECT no_anggota,kelas FROM anggota WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindValue(':no_anggota', $username, \PDO::PARAM_STR);
        $oStmt->execute();
        $oRow = $oStmt->fetch(\PDO::FETCH_OBJ);

        return @$oRow->kelas; // Use the PHP 5.5 password function
    }

    public function add(array $aData)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO anggota (no_anggota, nama, kelas, alamat, no_telpon, email, password, foto) VALUES(:no_anggota, :nama, :kelas, :alamat, :no_telpon, :email, :password, :foto)');
        return $oStmt->execute($aData);
    }

    public function get($iOffset, $iLimit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM anggota');
        $oStmt->bindParam(':offset', $iOffset, \PDO::PARAM_INT);
        $oStmt->bindParam(':limit', $iLimit, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getNIS()
    {
        $oStmt = $this->oDb->query('SELECT * FROM siswa WHERE nis NOT IN(SELECT no_anggota FROM anggota)');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getDataById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM siswa WHERE nis = :nis LIMIT 1');
        $oStmt->bindParam(':nis', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

	 public function getById($iId)
    {
         $oStmt = $this->oDb->prepare('SELECT * FROM anggota WHERE no_anggota = :no_anggota LIMIT 1');
         $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
         $oStmt->execute();
         return $oStmt->fetch(\PDO::FETCH_OBJ);
     }
	
	public function getDetailById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT no_anggota, nama, kelas, alamat, no_telpon, email FROM anggota WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
    public function getLog($iIdku)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM loganggota WHERE no_anggota = :no_anggota ORDER BY tanggal DESC');
        $oStmt->bindParam(':no_anggota', $iIdku, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getPemesananById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM pemesanan p inner join katalog k on k.no_katalog = p.no_katalog inner join anggota a on a.no_anggota = p.no_anggota INNER JOIN klasifikasi KL ON KL.no_klasifikasi = K.no_klasifikasi INNER JOIN koleksi KO ON KO.no_koleksi = K.no_koleksi WHERE p.no_anggota = :no_anggota');
        $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getPeminjamanById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM peminjaman p inner join katalog k on k.no_katalog = p.no_katalog inner join anggota a on a.no_anggota = p.no_anggota INNER JOIN klasifikasi KL ON KL.no_klasifikasi = K.no_klasifikasi INNER JOIN koleksi KO ON KO.no_koleksi = K.no_koleksi WHERE p.status="dipinjam" and p.no_anggota = :no_anggota');
        $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getRiwayatById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM peminjaman p inner join katalog k on k.no_katalog = p.no_katalog inner join anggota a on a.no_anggota = p.no_anggota INNER JOIN klasifikasi KL ON KL.no_klasifikasi = K.no_klasifikasi INNER JOIN koleksi KO ON KO.no_koleksi = K.no_koleksi WHERE p.status="kembali" and p.no_anggota = :no_anggota');
        $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    //     public function getBelumDinilaiById($iId)
    // {
    //     $oStmt = $this->oDb->prepare('SELECT * FROM peminjaman p inner join katalog k on k.no_katalog = p.no_katalog inner join anggota a on a.no_anggota = p.no_anggota INNER JOIN klasifikasi KL ON KL.no_klasifikasi = K.no_klasifikasi INNER JOIN koleksi KO ON KO.no_koleksi = K.no_koleksi inner join view v on v.no_katalog = k.no_katalog WHERE (p.status="kembali" and p.rate="not yet" and p.no_anggota = :no_anggota) or (v.rate = "not yet" and v.no_anggota = :no_anggota)');
    //     $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
    //     $oStmt->execute();
    //     return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    // }

    // public function getEbookBelumDinilaiById($iId)
    // {
    //     $oStmt = $this->oDb->prepare('SELECT * FROM rating r INNER JOIN view v ON v.no_katalog = r.no_katalog WHERE r.no_anggota = :no_anggota');
    //     $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
    //     $oStmt->execute();
    //     return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    // }

    public function getBelumDinilaiById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM rating r INNER JOIN katalog ka ON ka.no_katalog = r.no_katalog INNER JOIN klasifikasi kla ON kla.no_klasifikasi = ka.no_klasifikasi INNER JOIN koleksi ko ON ko.no_koleksi = ka.no_koleksi WHERE r.no_anggota = :no_anggota AND r.rate = "not yet"');
        $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getSudahDinilaiById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM rating r INNER JOIN katalog ka ON ka.no_katalog = r.no_katalog INNER JOIN klasifikasi kla ON kla.no_klasifikasi = ka.no_klasifikasi INNER JOIN koleksi ko ON ko.no_koleksi = ka.no_koleksi WHERE r.no_anggota = :no_anggota AND r.rate = "yes"');
        $oStmt->bindParam(':no_anggota', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAllBuku()
    {
        $oStmt = $this->oDb->query('SELECT K.no_katalog,K.no_klasifikasi, KL.nama_klasifikasi, K.no_koleksi, KO.jenis_koleksi, K.jenis_katalog, K.judul, K.pengarang, K.penerbit, K.kota_terbit, K.tahun_terbit, K.isbn, K.lokasi, K.absktrak, K.tanggal_masuk, K.e_book, K.cover, K.stok from katalog K INNER JOIN klasifikasi KL ON KL.no_klasifikasi = K.no_klasifikasi INNER JOIN koleksi KO ON KO.no_koleksi = K.no_koleksi WHERE jenis_katalog = "Buku Fisik" OR jenis_katalog = "Buku Fisik dan E-Book" ORDER BY judul ASC');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAllj()
    {
        $oStmt = $this->oDb->query('SELECT K.no_katalog,K.no_klasifikasi, KL.nama_klasifikasi, K.no_koleksi, KO.jenis_koleksi, K.jenis_katalog, K.judul, K.pengarang, K.penerbit, K.kota_terbit, K.tahun_terbit, K.isbn, K.lokasi, K.absktrak, K.tanggal_masuk, K.e_book, K.cover, K.stok from katalog K INNER JOIN klasifikasi KL ON KL.no_klasifikasi = K.no_klasifikasi INNER JOIN koleksi KO ON KO.no_koleksi = K.no_koleksi ORDER BY judul ASC');
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

    public function getKoleksi()
    {
        $oStmt = $this->oDb->query('SELECT * FROM koleksi ORDER BY jenis_koleksi ASC');
        $oStmt->execute();

        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getJenisBuku()
    {
        $oStmt = $this->oDb->query('SELECT * FROM jeniskatalog ORDER BY jenis_katalog ASC');
        $oStmt->execute();

        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function update(array $aData)
    {
        $oStmt = $this->oDb->prepare('UPDATE anggota SET nama = :nama, kelas = :kelas, no_telpon = :no_telpon, email = :email, alamat = :alamat, password = :password, foto = :foto WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindValue(':nama', $aData['nama']);
		$oStmt->bindValue(':kelas', $aData['kelas']);
        $oStmt->bindValue(':no_telpon', $aData['no_telpon']);
        $oStmt->bindValue(':email', $aData['email']);
        $oStmt->bindValue(':alamat', $aData['alamat']);
		$oStmt->bindValue(':password', $aData['password']);
        $oStmt->bindValue(':foto', $aData['foto']);
        $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
        return $oStmt->execute($aData);
    }
	
	public function updateNoPic(array $aData)
    {
        $oStmt = $this->oDb->prepare('UPDATE anggota SET nama = :nama, kelas = :kelas, no_telpon = :no_telpon, email = :email, alamat = :alamat, password = :password WHERE no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindValue(':nama', $aData['nama']);
		$oStmt->bindValue(':kelas', $aData['kelas']);
        $oStmt->bindValue(':no_telpon', $aData['no_telpon']);
        $oStmt->bindValue(':email', $aData['email']);
        $oStmt->bindValue(':alamat', $aData['alamat']);
		$oStmt->bindValue(':password', $aData['password']);
        $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
        return $oStmt->execute($aData);
    }
}
