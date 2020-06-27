<?php

namespace TestProject\Controller;

class Buku
{
    const MAX_POSTS = 5;

    protected $oUtil, $oModel;
    private $_iId;

    public function __construct()
    {
        // Enable PHP Session
        if (empty($_SESSION))
            @session_start();

        $this->oUtil = new \TestProject\Engine\Util;

        /** Get the Model class in all the controller class **/
        $this->oUtil->getModel('Buku');
        $this->oModel = new \TestProject\Model\Buku;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }


    /***** Front end *****/
    // Homepage
	public function search()
    {
		$search = $_POST['search'];
        $this->oUtil->oBuku = $this->oModel->search($search); // Get only the latest X posts
        $this->oUtil->oTahun = $this->oModel->getTahun();
        $this->oUtil->oJenis = $this->oModel->getJenis();
        $this->oUtil->oKoleksi = $this->oModel->getKoleksi();

        $this->oUtil->getView('buku');
    }
	
    public function buku()
    {
        $this->oUtil->oBuku = $this->oModel->getAllBuku(0, self::MAX_POSTS); // Get only the latest X posts
        $this->oUtil->oTahun = $this->oModel->getTahun();
        $this->oUtil->oJenis = $this->oModel->getJenis();
        $this->oUtil->oKoleksi = $this->oModel->getKoleksi();

        $this->oUtil->getView('buku');
    }
	
	public function ebook()
    {
        $this->oUtil->oBuku = $this->oModel->getAllEbook(0, self::MAX_POSTS); // Get only the latest X posts
        $this->oUtil->oTahun = $this->oModel->getTahun();
        $this->oUtil->oJenis = $this->oModel->getJenis();
        $this->oUtil->oKoleksi = $this->oModel->getKoleksi();

        $this->oUtil->getView('ebook');
    }
public function filter()
    {
        $this->oUtil->oBuku = $this->oModel->getAllEbook(0, self::MAX_POSTS); // Get only the latest X posts
        $this->oUtil->oTahun = $this->oModel->getTahun();
        $this->oUtil->oJenis = $this->oModel->getJenis();
        $this->oUtil->oKoleksi = $this->oModel->getKoleksi();

        $this->oUtil->getView('filter');
    }

    public function filterku()
    {
        $this->oUtil->oBuku = $this->oModel->getAllEbook(0, self::MAX_POSTS); // Get only the latest X posts
        $this->oUtil->oTahun = $this->oModel->getTahun();
        $this->oUtil->oJenis = $this->oModel->getJenis();
        $this->oUtil->oKoleksi = $this->oModel->getKoleksi();

        $this->oUtil->getView('filterku');
    }

    public function beranda()
    {
        $this->oUtil->oBuku = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('buku');
    }

    public function detail()/**/
    {
        // $this->oUtil->oBuku = $this->oModel->getById($this->_iId); // Get the data of the post
        if (!$this->isLogged())
        {
           $this->oUtil->oBuku = $this->oModel->getById($this->_iId); // Get the data of the post

            $this->oUtil->getView('detail');
        }else{
            $aData = array('no_katalog' => $this->_iId, 'no_anggota' => $_SESSION['id']);
            $this->oUtil->oStatus = $this->oModel->getStatus($aData);
    		$this->oUtil->oPesan = $this->oModel->getStatusPesan($aData);		
            $this->oUtil->dataPerpanjang = $this->oModel->getBatas();
    		$this->oUtil->oDenda = $this->oModel->getDenda();
            $this->oUtil->oRating = $this->oModel->getRating($aData);
            $this->oUtil->oKembali = $this->oModel->getKembali($aData);
            $this->oUtil->oRating = $this->oModel->getRatingView($aData);
            $this->oUtil->oView = $this->oModel->getView($aData);

    		$this->oUtil->oAnggota = $this->oModel->getById($_SESSION['id']);

            $this->oUtil->oBuku = $this->oModel->getById($this->_iId); // Get the data of the post
            $iId = array('no_katalog' => $_GET['id']);
            $this->oUtil->oView = $this->oModel->getViewCountById($iId);

            $this->oUtil->getView('detail');
        }
        
    }
    public function perpanjangan()
    {     
        if (!$this->isLogged()) exit;
        $aData = array('no_katalog' => $_GET['id'], 'no_anggota' => $_SESSION['id']);
        $this->oUtil->oBuku = $this->oModel->getBukuKu($aData);
        $this->oUtil->oPerpjg = $this->oModel->getBatas();
        

        if (!empty($_POST['btn_update']))
        {
            $newTgl = $_POST['perpjg'];
            $p_hi = $_POST['ke'];
            $idnya = $_GET['id'];
            $jdl = $_POST['jdl'];
            $tglk = $_POST['tglk'];

            $aData = array('batas_kembali' => $newTgl, 'perpanjangan_ke' => $p_hi, 'no_katalog' => $_GET['id'], 'no_anggota' => $_SESSION['id']);
            $log = "Kamu melakukan perpanjangan masa pinjam buku ".$jdl.". Perpanjangan ini adalah perpanjangan ke ".$p_hi.". Jangan lupa batas pengembalian buku pada tanggal <b>".$tglk."</b> ya!";
            $aLog = array('no_anggota' => $_SESSION['id'], 'activity' => $log);

            if ($this->oModel->up($aData) && $this->oModel->addAlog($aLog)){
                // $this->oUtil->sSuccMsg = 'Data anggota berhasil diedit.';
                // header("Refresh: 1; URL=?p=buku&a=detail&id=$idnya");
                echo '<div class="alert alert-success">Perpanjangan buku berhasil diproses.</div>';
                header("Refresh: 3; URL=?p=buku&a=detail&id=$idnya");
            }
            else{
                // $this->oUtil->sErrMsg = 'Data anggota gagal diedit.';
                echo '<div class="alert alert-danger">Perpanjangan buku gagal diproses.</div>';
            }
        }
        $this->oUtil->getView('form_perpanjangan');
    }
	
	public function pemesanan()
    {     
        if (!$this->isLogged()) exit;
        //$aData = array('no_katalog' => $_GET['id'], 'no_anggota' => $_SESSION['id']);
        $this->oUtil->oBuku = $this->oModel->getById($_GET['id']);
        //$this->oUtil->oPerpjg = $this->oModel->getBatas();

        if (!empty($_POST['btn_update']))
        {
            $tanggal_pesan = $_POST['tanggal_pesan'];
			$batas_pengambilan_buku = $_POST['batas_pengambilan_buku'];
			$idnya = $_GET['id'];
            $jdl = $_POST['jdl'];
            $tgla = substr($_POST['tgla'],11);

            $aData = array('tanggal_pesan' => $tanggal_pesan, 'batas_pengambilan_buku' => $batas_pengambilan_buku, 'no_katalog' => $_GET['id'], 'no_anggota' => $_SESSION['id']);

            $log = "Kamu melakukan pemesanan buku ".$jdl.". Jangan lupa ambil bukumu di perpustakaan sebelum jam <b>".$tgla."</b> hari ini!";
            $aLog = array('no_anggota' => $_SESSION['id'], 'activity' => $log);

            if ($this->oModel->pemesanan ($aData)&& $this->oModel->addAlog($aLog)){
                // $this->oUtil->sSuccMsg = 'Data anggota berhasil diedit.';
                // header("Refresh: 1; URL=?p=buku&a=detail&id=$idnya");
                echo '<div class="alert alert-success">Pemesanan buku berhasil diproses.</div>';
                    header("Refresh: 3; URL=?p=buku&a=detail&id=$idnya");
            }
            else{
                // $this->oUtil->sErrMsg = 'Data anggota gagal diedit.';
                echo '<div class="alert alert-danger">Pemesanan buku gagal diproses.</div>';
            }
        }
        $this->oUtil->getView('form_pemesanan');
    }

    public function view()
    {

        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
            $this->oUtil->oView = $this->oModel->getPDFById($this->_iId);

            $this->oUtil->getView('view');
            }
    }

    public function view1()
    {

        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
            $this->oUtil->oView = $this->oModel->getPDFById($this->_iId);
            $this->oUtil->getView('view');

            $views = 1;
            $idnya = $_GET['id'];

            if (empty($_SESSION['counter']))
                $_SESSION['counter'] = 1;
            else
                $_SESSION['counter']++;

            $aData = array('view_count' => $views, 'created' => date('Y-m-d H:i:s'), 'no_katalog' => $_GET['id'], 'no_anggota' => $_SESSION['id']);
            $aDataR = array('no_katalog' => $_GET['id'], 'no_anggota' => $_SESSION['id']);
            $aDataU = array('no_katalog' => $_GET['id'], 'no_anggota' => $_SESSION['id']);
            $aDataS = array('no_katalog' => $_GET['id'], 'no_anggota' => $_SESSION['id']);
        
            if ($this->oModel->cekStatusView ($aDataS)){
                $this->oModel->viewCountUpdate ($aDataU);
                
            }
            if (empty($this->oModel->cekStatusView ($aDataS))) {
                $this->oModel->viewCountAdd ($aData);
                $this->oModel->ratingAdd ($aDataR);
            }
            
            
            }
    }


    public function lihatpdf()
    {

        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
            $this->oUtil->oBuku = $this->oModel->getById($this->_iId);

            $this->oUtil->getView('lihatpdf');
            }
    } 

    public function rating()
    {     
        if (!$this->isLogged()) exit;
        //$aData = array('no_katalog' => $_GET['id'], 'no_anggota' => $_SESSION['id']);
        $this->oUtil->oBuku = $this->oModel->getById($_GET['id']);
        //$this->oUtil->oPerpjg = $this->oModel->getBatas();

        if (!empty($_POST['btn_rating']))
        {
            $rating = $_POST['rating'];
            $title = $_POST['title'];
            $idnya = $_GET['id'];
            $comment = $_POST['comment'];
            $jdl = $_POST['jdl'];

            $aData = array('ratingNumber' => $rating, 'title' => $title, 'comments' => $comment, 'created' => date('Y-m-d H:i:s'), 'modified' => date('Y-m-d H:i:s'), 'no_katalog' => $_GET['id'], 'no_anggota' => $_SESSION['id']);

            $log = "Kamu memberikan rating <b>".$rating."</b> pada buku ".$jdl;
            $aLog = array('no_anggota' => $_SESSION['id'], 'activity' => $log);

            $status = "yes";
            $aStatus = array('rate' => $status, 'no_katalog' => $_GET['id'], 'no_anggota' => $_SESSION['id']);

            if ($this->oModel->rating ($aData) && $this->oModel->addAlog($aLog)){
            // if ($this->oModel->rating ($aData) && $this->oModel->addAlog($aLog) && $this->oModel->addAStatus($aStatus)){
                // $this->oUtil->sSuccMsg = 'Data anggota berhasil diedit.';
                // header("Refresh: 1; URL=?p=buku&a=detail&id=$idnya");
                echo '<div class="alert alert-success">Pemberian rating buku berhasil.</div>';
                    header("Refresh: 3; URL=?p=buku&a=detail&id=$idnya");
            }
            else{
                // $this->oUtil->sErrMsg = 'Data anggota gagal diedit.';
                echo '<div class="alert alert-danger">Pemberian rating buku gagal.</div>';
            }
        }
        $this->oUtil->getView('add_rating');
    }


    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }


    /***** For Admin (Back end) *****/
    public function all()
    {
        if (!$this->isLogged()) exit;

        $this->oUtil->oBuku = $this->oModel->getAll();

        $this->oUtil->getView('beranda');
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
