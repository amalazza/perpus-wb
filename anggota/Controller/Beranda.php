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

    public function about()
    {

        $this->oUtil->getView('about');
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


    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
