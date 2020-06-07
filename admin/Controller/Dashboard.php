<?php

namespace TestProject\Controller;

class Dashboard
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
        $this->oUtil->getModel('Dashboard');
        $this->oModel = new \TestProject\Model\Dashboard;

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

    public function about()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
        $this->oUtil->getView('about');
        }
    }

    public function anggota()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL . '?p=admin&a=login');
           exit; 
        }
        else{
        $this->oUtil->oDashboardAnggota = $this->oModel->getAnggota(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('dashboard');
    }
    }

    public function kunjungan()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL . '?p=admin&a=login');
           exit; 
        }
        else{
        $this->oUtil->oDashboardKunjungan = $this->oModel->getKunjungan(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('dashboard');
    }
    }

    public function katalog()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL . '?p=admin&a=login');
           exit; 
        }
        else{
        $this->oUtil->oDashboardKatalog = $this->oModel->getKatalog(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('dashboard');
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
           header('Location: ' . ROOT_URL . '?p=admin&a=login');
           exit; 
        }
        else{
        //$this->oUtil->oKunjungan = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts
        $this->oUtil->oData = $this->oModel->getAnggota();
        $this->oUtil->oDataKun = $this->oModel->getKunjungan();
        $this->oUtil->oDataKat = $this->oModel->getKatalog();

        $this->oUtil->getView('dashboard');
    }
    }

    public function my_profile()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL . '?p=admin&a=login');
           exit; 
        }
        else{
        $this->oUtil->oAdd_Admins = $this->oModel->getById($_SESSION['id']);
        $this->oUtil->oAlog = $this->oModel->getaLog($_SESSION['id']);

        $this->oUtil->getView('profile_admin');
    }
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
