<?php


namespace TestProject\Controller;

class Admin extends Dashboard
{
    public function login()
    {
        if ($this->isLogged())
            header('Location: ' . ROOT_URL . '?p=dashboard&a=all');

        if (isset($_POST['btnLogin']))
        {
            
            $u = $_POST['username'];
            $p = $_POST['password'];
            $p_crypt = sha1($p);

            $this->oUtil->getModel('Admin');
            $this->oModel = new \TestProject\Model\Admin;

            $sHashPassword =  $this->oModel->login($u);
            $idku = $this->oModel->ambil_id($u);
            $namaku = $this->oModel->ambil_nama($u);
            $roleku = $this->oModel->roleku($u);

            $compare = strcmp($p_crypt, $sHashPassword);

            if ($compare == 0)
            {   
                $_SESSION['is_logged'] = 1; // Master Admin is logged now
                $_SESSION['id'] = $idku;
                $_SESSION['nama'] = $namaku;
                $_SESSION['role'] = $roleku;
                header('Location: ' . ROOT_URL . '?p=dashboard&a=all');
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
?>