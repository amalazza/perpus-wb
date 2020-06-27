<?php

namespace TestProject\Controller;

require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

class Transaksi
{
    const MAX_POSTS = 5;

    protected $oUtil, $oModel;
    private $_iId;

    public function __construct()
    {
        // Enable PHP Session
        if (empty($_SESSION))
            session_name('PROJECT1');
            @session_start();

        $this->oUtil = new \TestProject\Engine\Util;

        /** Get the Model class in all the controller class **/
        $this->oUtil->getModel('Transaksi');
        $this->oModel = new \TestProject\Model\Transaksi;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }


    
    // Fungsi Tampil
    
    public function index()
    {
        if (!$this->isLogged()) 
        header('Location: ' . ROOT_URL . '?p=admin&a=login');
        exit;

        $this->oUtil->oAnggota = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('index');
    }

    public function anggota()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
		
        $this->oUtil->oAnggota = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('anggota');
    }
    }
	
	public function pemesanan()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
		
        $this->oUtil->oPesan = $this->oModel->getPesanan(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('pemesanan');
    }
    }
	
	public function peminjaman()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
		
        $this->oUtil->oPinjam = $this->oModel->getPeminjaman(0, self::MAX_POSTS); // Get only the latest X posts
		$this->oUtil->dataPerpanjang = $this->oModel->getPerpanjangan();

        $this->oUtil->getView('peminjaman');
    }
    }
	
	public function dropdown()
    {
			$aData = array('no_anggota' => $_POST['nis'], 'no_katalog' => $_POST['katalog']);
			echo json_encode($this->oUtil->oData = $this->oModel->getDataById($aData));
    }
	
	public function cetakLaporan()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
		$aData = array('from' => $_POST['from'], 'end' => $_POST['end']);
        $this->oUtil->oPinjam = $this->oModel->cetakLaporan($aData);
		$this->oUtil->cPinjam = $this->oModel->countPeminjaman($aData);
		$this->oUtil->cDenda = $this->oModel->countDenda($aData);

        $this->oUtil->getView('laporanPeminjaman');
    }
    }
	
	public function infoPerpanjangan()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
		
        $this->oUtil->oPerpanjangan = $this->oModel->getInfoPerpanjangan(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('perpanjangan');
    }
    }
	
	public function infoDenda()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
		
        $this->oUtil->oDenda = $this->oModel->getInfoDenda(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('denda');
    }
    }
	
	public function tblPengembalian()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
		
        $this->oUtil->oKembali = $this->oModel->getPengembalian(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('pengembalian');
    }
    }

    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }
	
	public function updatePesanan()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['add_submit']))
        {
            if (!empty($_POST['no_anggota'])) // Allow a maximum of 50 characters
            {
				
				$no_katalog = $_POST['no_katalog'];
				$aData = array('tanggal_pinjam' => $_POST['tgl_pinjam'],'batas_kembali' => $_POST['batas_kembali'],'status' => 'dipinjam');

                if ($this->oModel->updatePesanan($aData)){
					$this->oModel->minusStok($no_katalog);
                    // $this->oUtil->sSuccMsg = 'Buku berhasil dipinjam.';
                    // header("Refresh: 3; URL=?p=transaksi&a=peminjaman");
                    echo '<div class="alert alert-success">Buku berhasil dipinjam.</div>';
                    header("Refresh: 3;  URL=?p=transaksi&a=peminjaman");
				}
                else{
                    // $this->oUtil->sErrMsg = 'Buku gagal dipinjam';
                    echo '<div class="alert alert-danger">Buku gagal dipinjam.</div>';
				}
            }
            else
            {
                // $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
                echo '<div class="alert alert-danger">Nomor anggota harus diisi.</div>';
            }
        }

        //get nis from database
		$this->oUtil->oNIS = $this->oModel->getNIS();
		$this->oUtil->oKatalog = $this->oModel->getKatalog();
		$this->oUtil->oPesan = $this->oModel->getPeminjamanById($this->_iId);
		$this->oUtil->oPerpjg = $this->oModel->getBatas();
		
		$this->oUtil->getView('add_pinjam');
    }
    }
	
	public function pengembalian()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['add_submit']))
        {
            if (!empty($_POST['no_anggota'])) // Allow a maximum of 50 characters
            {
				$no_katalog = $_POST['no_katalog'];
                $no_anggota = $_POST['no_anggota'];
                $jdlku = $this->oModel->getJudulku($_POST['no_katalog']);
				$aData = array('no_peminjaman'=> $_POST['no_peminjaman'], 'tanggal_kembali' => $_POST['tgl_kembali'], 'keterlambatan'=>$_POST['telat'], 'denda'=>$_POST['denda'], 'status' => 'kembali');
                $log = "Kamu sudah mengembalikan buku ".$jdlku." pada tanggal ".$_POST['tgl_kembali'].", terima kasih sudah meminjam buku diperpus.";
                $aLog = array('no_anggota' => $_POST['no_anggota'], 'activity' => $log);
                $aDataR = array('no_katalog' => $no_katalog, 'no_anggota' => $no_anggota);

                if ($this->oModel->pengembalian($aData) && $this->oModel->addAngLog($aLog) &&  $this->oModel->ratingAdd ($aDataR)){
					$this->oModel->plusStok($no_katalog);
                    // $this->oUtil->sSuccMsg = 'Buku berhasil dikembalikan.';
                    // header("Refresh: 3; URL=?p=transaksi&a=peminjaman");
                    echo '<div class="alert alert-success">Buku berhasil dikembalikan.</div>';
                    header("Refresh: 3;  URL=?p=transaksi&a=peminjaman");
				}
                else{
                    // $this->oUtil->sErrMsg = 'Buku gagal dikembalikan';
                    echo '<div class="alert alert-danger">Buku gagal dikembalikan.</div>';
				}
            }
            else
            {
                // $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
                echo '<div class="alert alert-danger">Nomor anggota harus diisi.</div>';
            }
        }
		$this->oUtil->oNIS = $this->oModel->getNIS();
		$this->oUtil->oKatalog = $this->oModel->getKatalog();
		$this->oUtil->oPesan = $this->oModel->getPeminjamanById($this->_iId);
		$this->oUtil->oDenda = $this->oModel->getDenda();
		$this->oUtil->getView('form_pengembalian');
    }
    }
	
	public function pinjamBaru()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
            $this->oUtil->oPerpjg = $this->oModel->getBatas();
        if (!empty($_POST['add_submit']))
        {
            if (!empty($_POST['no_anggota'])) // Allow a maximum of 50 characters
            {
			
                $jdlku = $this->oModel->getJudulku($_POST['no_katalog']);
                $namaku = $this->oModel->getNamanya($_POST['no_anggota']);
                $status = strcmp('pesan', $_POST['pesan']);
				$no_katalog = $_POST['no_katalog'];
				$aData = array('no_anggota' => $_POST['no_anggota'], 'no_katalog' => $_POST['no_katalog'], 'tanggal_pinjam' => $_POST['tgl_pinjam'],'batas_kembali' => $_POST['batas_kembali'],'status' => 'dipinjam');

                $act = "Admin ".$_SESSION['nama']." melayani peminjaman buku ".$jdlku." oleh ".$namaku." pada tanggal ".$_POST['tgl_pinjam'].".";
                $log = "Kamu melakukan peminjaman buku ".$jdlku.". Jangan lupa batas pengembalian buku pada tanggal <b>".$_POST['batas_kembali']."</b> ya!";
                $logp = "Kamu sudah melakukan pengambilan pesanan buku ".$jdlku.". Jangan lupa batas pengembalian buku pada tanggal <b>".$_POST['batas_kembali']."</b> ya!";
                $aLogAd = array('id_admin' => $_SESSION['id'], 'activity' => $act);
                $aLog = array('no_anggota' => $_POST['no_anggota'], 'activity' => $log);
                $aLogp = array('no_anggota' => $_POST['no_anggota'], 'activity' => $logp);

                if ($status == 0) {
                    if ($this->oModel->pinjamBaru($aData) && $this->oModel->addAngLog($aLogp)){
                        $this->oModel->addAlog($aLogAd);
                        $this->oModel->deletePesanan($this->_iId);
                        $this->oModel->minusStok($no_katalog);
                        // $this->oUtil->sSuccMsg = 'Buku berhasil dipinjam.';
                        // header("Refresh: 3; URL=?p=transaksi&a=peminjaman");
                        echo '<div class="alert alert-success">Buku berhasil dipinjam.</div>';
                    header("Refresh: 3;  URL=?p=transaksi&a=peminjaman");
                    }
                    else{
                        // $this->oUtil->sErrMsg = 'Buku gagal dipinjam';
                        echo '<div class="alert alert-danger">Buku gagal dipinjam.</div>';
                    }
                } else {
                    if ($this->oModel->pinjamBaru($aData) && $this->oModel->addAngLog($aLog) ){
                    $this->oModel->addAlog($aLogAd);
                    $this->oModel->deletePesanan($this->_iId);
                    $this->oModel->minusStok($no_katalog);
                    // $this->oUtil->sSuccMsg = 'Buku berhasil dipinjam.';
                    // header("Refresh: 3; URL=?p=transaksi&a=peminjaman");
                    echo '<div class="alert alert-success">Buku berhasil dipinjam.</div>';
                    header("Refresh: 3;  URL=?p=transaksi&a=peminjaman");
                }
                else{
                    // $this->oUtil->sErrMsg = 'Buku gagal dipinjam';
                    echo '<div class="alert alert-danger">Buku gagal dipinjam.</div>';
                }
                }
            }
            else
            {
                // $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
                echo '<div class="alert alert-danger">Nomor anggota harus diisi.</div>';
            }
        }

        //get nis from database
		$this->oUtil->oNIS = $this->oModel->getNIS();
		$this->oUtil->oKatalog = $this->oModel->getKatalog();
		$this->oUtil->oPesan = $this->oModel->getPemesananById($this->_iId);
		
		$this->oUtil->getView('add_pinjam');
    }
    }
	
	public function perpanjangan()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['add_submit']))
        {
            if (!empty($_POST['no_anggota'])) // Allow a maximum of 50 characters
            {
				
                //$idku = $_SESSION['id'];
                //$act = $_SESSION['nama'].' menerima kunjungan dari anggota '.$_POST['nAnggota'];
				$no_katalog = $_POST['no_katalog'];
                $jdlku = $this->oModel->getJudulku($_POST['no_katalog']);
				$aData = array('no_peminjaman' => $_POST['no_peminjaman'], 'no_anggota' => $_POST['no_anggota'], 'no_katalog' => $_POST['no_katalog'], 'tanggal_pinjam' => $_POST['tgl_pinjam'],'batas_kembali' => $_POST['batas_kembali']);
                //$aLog = array('id_admin' => $idku, 'activity' => $act );
                $log = "Kamu melakukan perpanjangan masa pinjam buku ".$jdlku.". Perpanjangan ini adalah perpanjangan ke ".$_POST['perpjg'].". Jangan lupa batas pengembalian buku pada tanggal <b>".$_POST['batas_kembali']."</b> ya!";
                $aLog = array('no_anggota' => $_POST['no_anggota'], 'activity' => $log);

                if ($this->oModel->perpanjangan($aData) && $this->oModel->addAngLog($aLog)){
                    // $this->oUtil->sSuccMsg = 'Buku berhasil dipinjam.';
                    // header("Refresh: 3; URL=?p=transaksi&a=peminjaman");
                    echo '<div class="alert alert-success">Masa pengembalian buku berhasil diperpanjang.</div>';
                    header("Refresh: 3;  URL=?p=transaksi&a=peminjaman");
				}
                else{
                    // $this->oUtil->sErrMsg = 'Buku gagal dipinjam';
                    echo '<div class="alert alert-danger">Masa pengembalian buku gagal diperpanjang.</div>';
				}
            }
            else
            {
                // $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
                echo '<div class="alert alert-danger">Nomor anggota harus diisi.</div>';
            }
        }
		
		$this->oUtil->oPerpanjang = $this->oModel->getPeminjamanById($this->_iId);
		$this->oUtil->dataPerpanjang = $this->oModel->getPerpanjangan();
		
		$this->oUtil->getView('edit_pinjam');
    }
    }

    public function editPerpanjangan()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['add_submit']))
        {
            if (!empty($_POST['id_perpanjangan'])) // Allow a maximum of 50 characters
            {
				
                $idku = $_SESSION['id'];
                $act = $_SESSION['nama'].' mengubah sistem waktu perpanjangan buku.';
				$aData = array('id_perpanjangan' => $_POST['id_perpanjangan'], 'hari' => $_POST['hari'], 'batas' => $_POST['batas']);
                $aLog = array('id_admin' => $idku, 'activity' => $act );

                if ($this->oModel->editPerpanjangan($aData) && $this->oModel->addALog($aLog)){
                    // $this->oUtil->sSuccMsg = 'Buku berhasil dipinjam.';
                    // header("Refresh: 3; URL=?p=transaksi&a=infoPerpanjangan");
                    echo '<div class="alert alert-success">Data perpanjangan berhasil diedit.</div>';
                    header("Refresh: 3;  URL=?p=transaksi&a=infoPerpanjangan");
				}
                else{
                    // $this->oUtil->sErrMsg = 'Buku gagal dipinjam';
                    echo '<div class="alert alert-danger">Data perpanjangan gagal diedit</div>';
				}
            }
            else
            {
                // $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
                echo '<div class="alert alert-danger">Nomor anggota harus diisi.</div>';
            }
        }
		
		$this->oUtil->oPerpanjangan = $this->oModel->getInfoPerpanjanganById($this->_iId);
		
		$this->oUtil->getView('edit_perpanjangan');
    }
    }
	
	public function editDenda()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['add_submit']))
        {
            if (!empty($_POST['id_denda'])) // Allow a maximum of 50 characters
            {
				
                $idku = $_SESSION['id'];
                $act = $_SESSION['nama'].' mengubah sistem jumlah denda keterlambatan.';
				$aData = array('id_denda' => $_POST['id_denda'], 'denda_per_hari' => $_POST['denda_per_hari'], 'denda_maks' => $_POST['denda_maks']);
                $aLog = array('id_admin' => $idku, 'activity' => $act );

                if ($this->oModel->editDenda($aData) && $this->oModel->addALog($aLog)){
                    // $this->oUtil->sSuccMsg = 'Buku berhasil dipinjam.';
                    // header("Refresh: 3; URL=?p=transaksi&a=infoDenda");
                    echo '<div class="alert alert-success">Data denda berhasil diedit.</div>';
                    header("Refresh: 3;  URL=?p=transaksi&a=infoDenda");
				}
                else{
                    // $this->oUtil->sErrMsg = 'Buku gagal dipinjam';
                    echo '<div class="alert alert-danger">Data denda gagal diedit</div>';
				}
            }
            else
            {
                // $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
                echo '<div class="alert alert-danger">Nomor anggota harus diisi.</div>';
            }
        }
		
		$this->oUtil->oDenda = $this->oModel->getInfoDendaById($this->_iId);
		
		$this->oUtil->getView('edit_denda');
    }
    }

    public function delete()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['delete']) && $this->oModel->delete($this->_iId)){
            $this->oUtil->sSuccMsg = 'Data anggota berhasil dihapus.';
		header("Refresh: 3; URL=?p=anggota&a=anggota");}
        else{
		exit('Anggota tidak bisa dihapus.');}
    }
    }
	
	public function deletePesanan()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['delete']) && $this->oModel->deletePesanan($this->_iId)){
        //     $this->oUtil->sSuccMsg = 'Data anggota berhasil dihapus.';
		      // header("Refresh: 3; URL=?p=transaksi&a=pemesanan");
            echo '<div class="alert alert-success">Data pemesanan berhasil dihapus</div>';
            header("Refresh: 3;  URL=?p=transaksi&a=pemesanan");
          }
        else{
		exit('Pesanan tidak bisa dihapus.');}
         $this->oUtil->getView('pemesanan');
    }
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
