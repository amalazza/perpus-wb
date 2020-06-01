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
        $aData = array('no_katalog' => $this->_iId, 'no_anggota' => $_SESSION['id']);
        $this->oUtil->oStatus = $this->oModel->getStatus($aData); 
        $this->oUtil->dataPerpanjang = $this->oModel->getBatas();

         $this->oUtil->oBuku = $this->oModel->getById($this->_iId); // Get the data of the post

        $this->oUtil->getView('detail');
    }
    public function perpanjangan()
    {     
        if (!$this->isLogged()) exit;
        $this->oUtil->oBuku = $this->oUtil->oBuku = $this->oModel->getByIdKu($_GET['id']);
        $this->oUtil->oPerpjg = $this->oUtil->oPerpjg = $this->oModel->getBatas();

        if (!empty($_POST['btn_update']))
        {
            $newTgl = $_POST['newTanggal'];
            $p_ke = $_POST['ke'];
            $p_hi = (int)$p_ke + 1;
            $idnya = $_POST['idnya'];

            $aData = array('batas_kembali' => $newTgl, 'perpanjangan_ke' => $p_hi, 'no_katalog' => $idnya);

            if ($this->oModel->up($aData)){
                $this->oUtil->sSuccMsg = 'Data anggota berhasil diedit.';
                header("Refresh: 1; URL=?p=buku&a=detail&id=$idnya");}
            else{
                $this->oUtil->sErrMsg = 'Data anggota gagal diedit.';}
        }
        $this->oUtil->getView('form_perpanjangan');
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
