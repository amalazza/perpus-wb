<?php

namespace TestProject\Controller;

class Beranda
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
        $this->oUtil->getModel('Beranda');
        $this->oModel = new \TestProject\Model\Beranda;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }


    /***** Front end *****/
    // Homepage
    public function index()
    {
        $this->oUtil->oBuku = $this->oModel->getAllj(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('beranda');
    }

    public function beranda()
    {
        $this->oUtil->oBeranda = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('beranda');
    }

    public function detail()
    {
        $this->oUtil->oBeranda = $this->oModel->getById($this->_iId); // Get the data of the post

        $this->oUtil->getView('detail');
    }

    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }


    /***** For Admin (Back end) *****/
    public function all()
    {
        if (!$this->isLogged()) exit;

        $this->oUtil->oBeranda = $this->oModel->getAll();

        $this->oUtil->getView('beranda');
    }


    // public function add()
    // {
    //     if (!$this->isLogged()) exit;

    //     if (!empty($_POST['add_submit']))
    //     {
    //         if (isset($_POST['no_anggota']) <= 15) // Allow a maximum of 50 characters
    //         {
    //             $aData = array('no_anggota' => $_POST['no_anggota'], 'waktu_kunjungan' => date('Y-m-d H:i:s'));

    //             if ($this->oModel->add($aData))
    //                  header('Location: ' . ROOT_URL  . '?p=kunjungan&a=kunjungan');
    //             else
    //                 $this->oUtil->sErrMsg = 'Data kunjungan gagal ditambahkan.';
    //         }
    //         else
    //         {
    //             $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
    //         }
    //     }

    //     $this->oUtil->getView('add_kunjungan');
    // }

    // public function edit()
    // {
    //     if (!$this->isLogged()) exit;

    //     if (!empty($_POST['edit_submit']))
    //     {
    //         if (isset($_POST['no_anggota']))
    //         {
    //             $aData = array('no_kunjungan' => $this->_iId, 'no_anggota' => $_POST['no_anggota']);

    //             if ($this->oModel->update($aData))
    //                 $this->oUtil->sSuccMsg = 'Data kunjungan berhasil diedit.';
    //             else
    //                 $this->oUtil->sErrMsg = 'Data kunjungan gagal diedit.';
    //         }
    //         else
    //         {
    //             $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
    //         }
    //     }

    //     /* Get the data of the post */
    //     $this->oUtil->oKunjungan = $this->oModel->getById($this->_iId);

    //     $this->oUtil->getView('edit_kunjungan');
    // }

    // public function delete()
    // {
    //     if (!$this->isLogged()) exit;

    //     if (!empty($_POST['delete']) && $this->oModel->delete($this->_iId))
    //         header('Location: ' . ROOT_URL . '?p=kunjungan&a=kunjungan');
    //     else
    //         exit('Kunjungan tidak bisa dihapus.');
    // }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
