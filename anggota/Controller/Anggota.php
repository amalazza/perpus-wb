<?php


namespace TestProject\Controller;

class Anggota extends Beranda
{
    public function login()
    {
        if ($this->isLogged())
            header('Location: ' . ROOT_URL . '?p=beranda&a=index');

        if (isset($_POST['no_anggota'], $_POST['password']))
        {
            $this->oUtil->getModel('Anggota');
            $this->oModel = new \TestProject\Model\Anggota;

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

        // Homepage
    public function profile()
    {
        $this->oUtil->oAnggota = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('profile');
    }
}
