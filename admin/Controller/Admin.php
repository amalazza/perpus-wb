<?php


namespace TestProject\Controller;

class Admin extends Kunjungan
{
    public function login()
    {
        if ($this->isLogged())
            header('Location: ' . ROOT_URL . '?p=kunjungan&a=index');

        if (isset($_POST['username'], $_POST['password']))
        {
            $this->oUtil->getModel('Admin');
            $this->oModel = new \TestProject\Model\Admin;

            $sHashPassword =  $this->oModel->login($_POST['username']);
            if (password_verify($_POST['password'], $sHashPassword))
            {
                $_SESSION['is_logged'] = 1; // Admin is logged now
                header('Location: ' . ROOT_URL . '?p=kunjungan&a=index');
                exit;
            }
            else
            {
                $this->oUtil->sErrMsg = 'Incorrect Login!';
            }
        }

        $this->oUtil->getView('login');
    }

    public function logout()
    {
        if (!$this->isLogged())
            exit;

        // If there is a session, destroy it to disconnect the admin
        if (!empty($_SESSION))
        {
            $_SESSION = array();
            session_unset();
            session_destroy();
        }

        // Redirect to the homepage
        header('Location: ' . ROOT_URL . '?p=admin&a=login');
        exit;
    }
}

/* Fungsi CRUD */

class Add_Admin
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
        $this->oUtil->getModel('Add_Admin');
        $this->oModel = new \TestProject\Model\Add_Admin;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }


    /***** Front end *****/
    // Homepage
    public function index()
    {
        $this->oUtil->oAdd_Admin = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('index');
    }

    public function add_admin()
    {
        $this->oUtil->oAdd_Admin = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('add_admin');
    }

    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }


    /***** For Admin (Back end) *****/
    public function all()
    {
        if (!$this->isLogged()) exit;

        $this->oUtil->oAdd_Admins = $this->oModel->getAll();

        $this->oUtil->getView('add_admin');
    }


    public function add()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['add_submitA']))
        {

            if (isset($_POST['add_submitA']))
            {
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $p_crypt = md5($pass, "hortensia");

                $aData = array('username' => $user, 'password' => $p_crypt);

                if ($this->oModel->addA($aData))
                     header('Location: ' . ROOT_URL  . '?p=admin&a=add_admin');
                else
                    $this->oUtil->sErrMsg = 'Data new admin gagal ditambahkan.';
            }
            else
            {
                $this->oUtil->sErrMsg = 'username dan password harus diisi.';
            }
        }

        $this->oUtil->getView('add_admin');
    }

    public function edit()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['edit_submit']))
        {
            if (isset($_POST['edit_submit']))
            {
                $idA = $_POST['idA'];
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $p_crypt = md5($pass, "hortensia");

                $aData = array('username' => $user, 'password' => $p_crypt, 'id_admin' => $idA);

                if ($this->oModel->update($aData))
                         header('Location: ' . ROOT_URL  . '?p=admin&a=add_admin');
                else
                    $this->oUtil->sErrMsg = 'Data new admin gagal diupdate.';
            }
            else
            {
                $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
            }
        }

        /* Get the data of the post */
        $this->oUtil->oKunjungan = $this->oModel->getById($this->_iId);

        $this->oUtil->getView('edit_admin');
    }

    public function delete()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['delete']) && $this->oModel->delete($this->_iId))
            header('Location: ' . ROOT_URL . '?p=add_admin&a=add_admin');
        else
            exit('Kunjungan tidak bisa dihapus.');
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}

