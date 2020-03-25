<?php  
namespace TestProject\Controller;
/* Fungsi CRUD */

class Admincrud
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
        $this->oUtil->getModel('Admin');
        $this->oModel = new \TestProject\Model\Admins;

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

    public function p_admin()
    {
        $this->oUtil->oAdd_Admin = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('admin');
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

        $this->oUtil->getView('admin');
    }

    public function my_profile()
    {
        if (!$this->isLogged()) exit;

        $this->oUtil->oAdd_Admins = $this->oModel->getById($_SESSION['id']);

        $this->oUtil->getView('profile_admin');
    }


    public function add()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['add_submitA']))
        {

            if (isset($_POST['add_submitA']))
            {
                $nama = $_POST['nama'];
                $notlp = $_POST['notlp'];
                $email = $_POST['email'];
                $alamat = $_POST['alamat'];
                $role = $_POST['role'];
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $p_crypt = sha1($pass);
                $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

                $aData = array('nama' => $nama, 'notlp' => $notlp,'email' => $email, 'alamat' => $alamat, 'role' => $role, 'username' => $user, 'password' => $p_crypt, 'foto' => $foto);

                if ($this->oModel->addA($aData))
                     header('Location: ' . ROOT_URL  . '?p=Admincrud&a=p_admin');
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
                $p_crypt = sha1($pass);

                $aData = array('username' => $user, 'password' => $p_crypt, 'id_admin' => $idA);

                if ($this->oModel->update($aData))
                         header('Location: ' . ROOT_URL  . '?p=Admincrud&a=p_admin');
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
            header('Location: ' . ROOT_URL . '?p=Admincrud&a=p_admin');
        else
            exit('Kunjungan tidak bisa dihapus.');
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}

?>