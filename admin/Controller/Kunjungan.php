<?php

namespace TestProject\Controller;

class Kunjungan
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
        $this->oUtil->getModel('Kunjungan');
        $this->oModel = new \TestProject\Model\Kunjungan;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }


    /***** Front end *****/
    // Homepage
    public function index()
    {
        if (!$this->isLogged()) 
        header('Location: ' . ROOT_URL . '?p=admin&a=login');
        exit;

        $this->oUtil->oKunjungan = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('index');
    }

    public function kunjungan()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
        $this->oUtil->oKunjungan = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('kunjungan');
    }
    }
    
    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }


    /***** For Admin (Back end) *****/
    public function all()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        $this->oUtil->oKunjungans = $this->oModel->getAll();

        $this->oUtil->getView('kunjungan');
    }
    }

    public function detailKunjungan()
    {
        
            echo json_encode($this->oUtil->oData = $this->oModel->getAnggotaById($_POST['id']));
    }


    public function add()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['add_submit']))
        {
            if (isset($_POST['no_anggota']) <= 15) // Allow a maximum of 50 characters
            {
                $idku = $_SESSION['id'];
                date_default_timezone_set("Asia/Jakarta");
                $act = 'Admin '.$_SESSION['nama'].' menginput kunjungan '.$_POST['nAng'].' ke perpus pada tanggal '. date("Y/m/d").' jam '.date("h:m").' '.date("a");

                $aData = array('no_anggota' => $_POST['anggota']);
                $aLog = array('id_admin' => $idku, 'activity' => $act );

                if ($this->oModel->add($aData) && $this->oModel->addAlog($aLog))
                {
                    echo '<div class="alert alert-success">Data kunjungan berhasil ditambahkan.</div>';
                    header("Refresh: 3; URL=?p=kunjungan&a=kunjungan");
                }
                else
                {
                    $this->oUtil->sErrMsg = 'Data kunjungan gagal ditambahkan.';
                }
            }
            else
            {
                $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
            }
        }

        //get anggota id from database
        $this->oUtil->oAnggota = $this->oModel->getAnggota();

        $this->oUtil->getView('add_kunjungan');
    }
    }

    public function edit()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['edit_submit']))
        {
            if (isset($_POST['no_anggota']))
            {
                $aData = array('no_kunjungan' => $this->_iId, 'no_anggota' => $_POST['no_anggota']);

                if ($this->oModel->update($aData))
                    $this->oUtil->sSuccMsg = 'Data kunjungan berhasil diedit.';
                else
                    $this->oUtil->sErrMsg = 'Data kunjungan gagal diedit.';
            }
            else
            {
                $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
            }
        }

        /* Get the data of the post */
        $this->oUtil->oKunjungan = $this->oModel->getById($this->_iId);

        $this->oUtil->getView('edit_kunjungan');
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
                echo '<div class="alert alert-success">Data kunjungan berhasil dihapus.</div>';
                header("Refresh: 3; URL=?p=kunjungan&a=kunjungan");
                // header('Location: ' . ROOT_URL . '?p=kunjungan&a=kunjungan');
            }
            else
            {
                exit('Kunjungan tidak bisa dihapus.');
            }
    }
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
