<?php


namespace TestProject\Controller;

// require 'vendor/autoload.php';

class Anggota extends Beranda
{

    public function __construct()
    {
        // Enable PHP Session
        if (empty($_SESSION))
            @session_start();

        $this->oUtil = new \TestProject\Engine\Util;

        /** Get the Model class in all the controller class **/
        $this->oUtil->getModel('Anggota');
        $this->oModel = new \TestProject\Model\Anggota;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }

    public function login()
    {
        if ($this->isLogged())
            header('Location: ' . ROOT_URL . '?p=beranda&a=index');

        if (isset($_POST['no_anggota'], $_POST['password']))
        {
            // $this->oUtil->getModel('Anggota');
            // $this->oModel = new \TestProject\Model\Anggota;

            $sHashPassword =  $this->oModel->login($_POST['no_anggota']);
            if (password_verify($_POST['password'], $sHashPassword))
            {
                $_SESSION['is_logged'] = 1; // Admin is logged now
                header('Location: ' . ROOT_URL . '?p=beranda&a=index');
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
        header('Location: ' . ROOT_URL);
        exit;
    }


    public function daftar()
    {
        // if (!$this->isLogged()) exit;

        if (!empty($_POST['add_submit']))
        {
            if (isset($_POST['no_anggota']) <= 15) // Allow a maximum of 50 characters
            {
                
                $aData = array('no_anggota' => $_POST['no_anggota'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' => $_POST['password'],'foto' => addslashes(file_get_contents($_FILES['foto']['tmp_name'])));

                if ($this->oModel->add($aData))
                     header('Location: ' . ROOT_URL  . '?p=anggota&a=login');
                else
                    $this->oUtil->sErrMsg = 'Data Anggota gagal ditambahkan.';
            }
            else
            {
                $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
            }
        }

        //get nis from database
        // $this->oUtil->oNIS = $this->oModel->getNIS();
        
        $this->oUtil->getView('add_anggota');
    }

        // Homepage
    public function profile()
    {
        $this->oUtil->oAnggota = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('profile');

    }
}
