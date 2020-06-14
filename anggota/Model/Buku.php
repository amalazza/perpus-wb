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

        public function getAllBuku()
    {
        $oStmt = $this->oDb->query('SELECT K.no_katalog,K.no_klasifikasi, KL.nama_klasifikasi, K.no_koleksi, KO.jenis_koleksi, K.jenis_katalog, K.judul, K.pengarang, K.penerbit, K.kota_terbit, K.tahun_terbit, K.isbn, K.lokasi, K.absktrak, K.tanggal_masuk, K.e_book, K.cover, K.stok from katalog K INNER JOIN klasifikasi KL ON KL.no_klasifikasi = K.no_klasifikasi INNER JOIN koleksi KO ON KO.no_koleksi = K.no_koleksi WHERE jenis_katalog = "Buku Fisik" OR jenis_katalog = "Buku Fisik dan E-Book" ORDER BY judul ASC');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }
	
	public function getAllEbook()
    {
        $oStmt = $this->oDb->query('SELECT K.no_katalog,K.no_klasifikasi, KL.nama_klasifikasi, K.no_koleksi, KO.jenis_koleksi, K.jenis_katalog, K.judul, K.pengarang, K.penerbit, K.kota_terbit, K.tahun_terbit, K.isbn, K.lokasi, K.absktrak, K.tanggal_masuk, K.e_book, K.cover, K.stok from katalog K INNER JOIN klasifikasi KL ON KL.no_klasifikasi = K.no_klasifikasi INNER JOIN koleksi KO ON KO.no_koleksi = K.no_koleksi WHERE jenis_katalog = "E-book" OR jenis_katalog = "Buku Fisik dan E-Book" ORDER BY judul ASC');
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

    public function getById($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM katalog a inner join klasifikasi b on b.no_klasifikasi = a.no_klasifikasi inner join koleksi c on c.no_koleksi = a. no_koleksi WHERE no_katalog = :postId LIMIT 1');
        $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
    public function addAlog(array $aLog)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO loganggota (no_anggota, activity) VALUES(:no_anggota, :activity)');
        return $oStmt->execute($aLog);
    }
    
    public function getByIdKu($iId)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM peminjaman p inner join katalog a on a.no_katalog = p.no_katalog where p.no_katalog = :postId LIMIT 1');
        $oStmt->bindParam(':postId', $iId, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getBukuKu($aData)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM peminjaman p inner join katalog a on a.no_katalog = p.no_katalog where p.no_katalog = :no_katalog AND p.no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindParam(':no_katalog', $aData['no_katalog'], \PDO::PARAM_INT);
        $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	
	public function getDenda()
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM denda LIMIT 1');
		$oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getStatus(array $aData)/**/
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM peminjaman WHERE no_katalog = :no_katalog AND no_anggota = :no_anggota');
        $oStmt->bindParam(':no_katalog', $aData['no_katalog'], \PDO::PARAM_INT);
        $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	
	public function getStatusPesan(array $aData)/**/
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM pemesanan WHERE no_katalog = :no_katalog AND no_anggota = :no_anggota');
        $oStmt->bindParam(':no_katalog', $aData['no_katalog'], \PDO::PARAM_INT);
        $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
	
    public function getBatas()
    {
        $oStmt = $this->oDb->query('SELECT * FROM perpanjangan');
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
    public function up(array $aData)
    {
        $oStmt = $this->oDb->prepare('UPDATE peminjaman SET batas_kembali = :batas_kembali, perpanjangan_ke = :perpanjangan_ke WHERE no_katalog = :no_katalog AND no_anggota = :no_anggota LIMIT 1');
        $oStmt->bindValue(':batas_kembali', $aData['batas_kembali']);
        $oStmt->bindValue(':perpanjangan_ke', $aData['perpanjangan_ke']);
        $oStmt->bindValue(':no_katalog', $aData['no_katalog']);
        $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
        return $oStmt->execute($aData);
    }
	
	public function pemesanan (array $aData){
		$oStmt = $this->oDb->prepare('INSERT INTO pemesanan (no_anggota, no_katalog, tanggal_pesan, batas_pengambilan_buku) VALUES(:no_anggota, :no_katalog, :tanggal_pesan, :batas_pengambilan_buku)');
		$oStmt->bindValue(':no_katalog', $aData['no_katalog']);
        $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
		$oStmt->bindValue(':tanggal_pesan', $aData['tanggal_pesan']);
        $oStmt->bindValue(':batas_pengambilan_buku', $aData['batas_pengambilan_buku']);
        return $oStmt->execute($aData);
	}

    public function rating (array $aData){
        $oStmt = $this->oDb->prepare('INSERT INTO rating (no_anggota, no_katalog, ratingNumber, title, comments, created, modified) VALUES(:no_anggota, :no_katalog, :ratingNumber, :title, :comments, :created, :modified)');
        $oStmt->bindValue(':no_katalog', $aData['no_katalog']);
        $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
        $oStmt->bindValue(':ratingNumber', $aData['ratingNumber']);
        $oStmt->bindValue(':title', $aData['title']);
        $oStmt->bindValue(':comments', $aData['comments']);
        $oStmt->bindValue(':created', $aData['created']);
        $oStmt->bindValue(':modified', $aData['modified']);
        return $oStmt->execute($aData);
    }

    public function getRating(array $aData)/**/
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM rating WHERE no_katalog = :no_katalog AND no_anggota = :no_anggota');
        $oStmt->bindParam(':no_katalog', $aData['no_katalog'], \PDO::PARAM_INT);
        $oStmt->bindValue(':no_anggota', $aData['no_anggota']);
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
	
	public function search($search){
		$oStmt = $this->oDb->prepare("SELECT * FROM katalog WHERE judul LIKE :judul");
        $oStmt->bindValue('judul', "%$search%");
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
	}
}
