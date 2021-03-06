<?php  
namespace TestProject\Controller;
/* Fungsi CRUnD */

class Admincrud
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
        $this->oUtil->getModel('Admin');
        $this->oModel = new \TestProject\Model\Admins;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }


    /***** Front end *****/
    // Homepage
    public function indexA()
    {
        if (!$this->isLogged()) 
        header('Location: ' . ROOT_URL . '?p=admin&a=login');
        exit;

        $this->oUtil->oAdd_Admin = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('index');
    }

    public function p_admin()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
        $this->oUtil->oAdd_Admin = $this->oModel->getAll(0, self::MAX_POSTS); // Get only the latest X posts
        $test = strcmp($_SESSION['role'], 'master');
        $test2 = strcmp($_SESSION['role'], 'admin');
        if ($test == 0) {
            $this->oUtil->getView('admin');
        } elseif ($test2 == 0) {
            $this->oUtil->getView('admin2');
        }
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

        $this->oUtil->oAdd_Admins = $this->oModel->getAll();

        $this->oUtil->getView('admin');
    }
    }

    public function my_profile()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        $this->oUtil->oAdd_Admins = $this->oModel->getById($_SESSION['id']);
        $this->oUtil->oAlog = $this->oModel->getaLog($_SESSION['id']);

        $this->oUtil->getView('profile_admin');
    }
    }

    public function detailAdmin()
    {     
            echo json_encode($this->oUtil->oData = $this->oModel->getByIdku($_POST['id']));
    }

    public function add()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

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
                $type = $_FILES['foto']['type'];
                $foto = file_get_contents($_FILES['foto']['tmp_name']);
                $idku = $_SESSION['id'];
                $act = $_SESSION['nama'].' menambahkan admin '.$_POST['nama'];

                $aData = array('nama' => $nama, 'notlp' => $notlp,'email' => $email, 'alamat' => $alamat, 'role' => $role, 'username' => $user, 'password' => $p_crypt, 'mime' => $type, 'foto' => $foto);
                $aLog = array('id_admin' => $idku, 'activity' => $act );

                 if ($this->oModel->addA($aData) && $this->oModel->addAlog($aLog)){
                     // header('Location: ' . ROOT_URL  . '?p=Admincrud&a=p_admin');
                 
                    echo '<div class="alert alert-success">Data admin berhasil ditambahkan.</div>';
                    header("Refresh: 3; URL=?p=Admincrud&a=p_admin");
                }else
                    // $this->oUtil->sErrMsg = 'Data new admin gagal ditambahkan.';
                    echo '<div class="alert alert-danger">Data admin gagal ditambahkan.</div>';
                    // header("Refresh: 3; URL=?p=Admincrud&a=p_admin");
            }else
            {
                // $this->oUtil->sErrMsg = 'username dan password harus diisi.';
                echo '<div class="alert alert-danger">Username dan password harus diisi.</div>';
                // header("Refresh: 3; URL=?p=Admincrud&a=p_admin");
            }
        }

        $this->oUtil->getView('add_admin');
    }
    }

    public function edit()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['edit_submit']))
        {
            if (isset($_POST['edit_submit']))
            {
                $id_admin = $_GET['id'];
                $nama = $_POST['nama'];
                $notlp = $_POST['notlp'];
                $email = $_POST['email'];
                $alamat = $_POST['alamat'];
                $role = $_POST['role'];
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $p_crypt = sha1($pass);
                $mime = $_FILES['foto']['type'];
                $oldPass = $_POST['Opassword'];
                $idku = $_SESSION['id'];
                $act = $_SESSION['nama'].' mengubah data profile admin '.$_POST['nama'];
                $compare = strcmp($pass, $oldPass);
                $cmpRole = strcmp('master', $role);

                if ($compare == 0) { //pass sama dengan oldpass
                    if ($cmpRole == 0) { //kalo yg login master+oldpass
                        if (empty($foto)) {//oldfoto
                            $aData = array('id_admin' => $id_admin,'nama' => $nama, 'notlp' => $notlp,'email' => $email, 'alamat' => $alamat, 'role' => 'master', 'username' => $user, 'password' => $oldPass);
                            $aLog = array('id_admin' => $idku, 'activity' => $act );

                            if ($this->oModel->updtOld($aData) && $this->oModel->addAlog($aLog)){
                            // header('Location: ' . ROOT_URL  . '?p=Admincrud&a=p_admin');
                            echo '<div class="alert alert-success">Data admin berhasil diedit.</div>';
                            header("Refresh: 3; URL=?p=Admincrud&a=p_admin");
                            }
                            else{
                            // $this->oUtil->sErrMsg = 'Data admin gagal diupdate.';
                            echo '<div class="alert alert-danger">Data admin gagal diedit.</div>';
                            }
                        } else {//+newFoto
                            $foto = file_get_contents($_FILES['foto']['tmp_name']);
                            $aData = array('id_admin' => $id_admin,'nama' => $nama, 'notlp' => $notlp,'email' => $email, 'alamat' => $alamat, 'role' => 'master', 'username' => $user, 'password' => $oldPass, 'mime' => $mime, 'foto' => $foto);
                            $aLog = array('id_admin' => $idku, 'activity' => $act );

                            if ($this->oModel->update($aData) && $this->oModel->addAlog($aLog)){
                            // header('Location: ' . ROOT_URL  . '?p=Admincrud&a=p_admin');
                            echo '<div class="alert alert-success">Data admin berhasil diedit.</div>';
                            header("Refresh: 3; URL=?p=Admincrud&a=p_admin");
                            }
                            else{
                            // $this->oUtil->sErrMsg = 'Data admin gagal diupdate.';
                            echo '<div class="alert alert-danger">Data admin gagal diedit.</div>';
                            }
                        }
                    } else { //kalo yg login admin+oldpass
                        if (!empty($foto)) {
                            $foto = file_get_contents($_FILES['foto']['tmp_name']);
                            $aData = array('id_admin' => $id_admin,'nama' => $nama, 'notlp' => $notlp,'email' => $email, 'alamat' => $alamat, 'role' => $role, 'username' => $user, 'password' => $oldPass, 'mime' => $mime, 'foto' => $foto);
                            $aLog = array('id_admin' => $idku, 'activity' => $act );

                            if ($this->oModel->update($aData) && $this->oModel->addAlog($aLog)){
                            // header('Location: ' . ROOT_URL  . '?p=Admincrud&a=p_admin');
                            echo '<div class="alert alert-success">Data admin berhasil diedit.</div>';
                            header("Refresh: 3; URL=?p=Admincrud&a=p_admin");
                            }
                            else{
                            // $this->oUtil->sErrMsg = 'Data admin gagal diupdate.';
                            echo '<div class="alert alert-danger">Data admin gagal diedit.</div>';
                            }
                        } else {
                            $aData = array('id_admin' => $id_admin,'nama' => $nama, 'notlp' => $notlp,'email' => $email, 'alamat' => $alamat, 'role' => $role, 'username' => $user, 'password' => $oldPass);
                            $aLog = array('id_admin' => $idku, 'activity' => $act );

                            if ($this->oModel->updtOld($aData) && $this->oModel->addAlog($aLog)){
                            // header('Location: ' . ROOT_URL  . '?p=Admincrud&a=p_admin');
                            echo '<div class="alert alert-success">Data admin berhasil diedit.</div>';
                            header("Refresh: 3; URL=?p=Admincrud&a=p_admin");
                            }
                            else{
                            // $this->oUtil->sErrMsg = 'Data admin gagal diupdate.';
                            echo '<div class="alert alert-danger">Data admin gagal diedit.</div>';
                            }
                        }
                    }    
                } else {//pass tdk sama oldpass
                    if ($cmpRole == 0) { //input role = master
                        if (!empty($foto)) {
                            $foto = file_get_contents($_FILES['foto']['tmp_name']);
                            $aData = array('id_admin' => $id_admin,'nama' => $nama, 'notlp' => $notlp,'email' => $email, 'alamat' => $alamat, 'role' => 'master', 'username' => $user, 'password' => $p_crypt, 'mime' => $mime, 'foto' => $foto);
                            $aLog = array('id_admin' => $idku, 'activity' => $act );

                            if ($this->oModel->update($aData) && $this->oModel->addAlog($aLog)){
                            // header('Location: ' . ROOT_URL  . '?p=Admincrud&a=p_admin');
                            echo '<div class="alert alert-success">Data admin berhasil diedit.</div>';
                            header("Refresh: 3; URL=?p=Admincrud&a=p_admin");
                            }
                            else{
                            // $this->oUtil->sErrMsg = 'Data admin gagal diupdate.';
                            echo '<div class="alert alert-danger">Data admin gagal diedit.</div>';
                            }
                        } else {
                            $aData = array('id_admin' => $id_admin,'nama' => $nama, 'notlp' => $notlp,'email' => $email, 'alamat' => $alamat, 'role' => 'master', 'username' => $user, 'password' => $p_crypt);
                            $aLog = array('id_admin' => $idku, 'activity' => $act );

                            if ($this->oModel->updtOld($aData) && $this->oModel->addAlog($aLog)){
                            // header('Location: ' . ROOT_URL  . '?p=Admincrud&a=p_admin');
                            echo '<div class="alert alert-success">Data admin berhasil diedit.</div>';
                            header("Refresh: 3; URL=?p=Admincrud&a=p_admin");
                            }
                            else{
                            // $this->oUtil->sErrMsg = 'Data admin gagal diupdate.';
                            echo '<div class="alert alert-danger">Data admin gagal diedit.</div>';
                            }
                        }
                    } else {
                        if (!empty($foto)) {//foto tdk kosong
                            $foto = file_get_contents($_FILES['foto']['tmp_name']);
                            $aData = array('id_admin' => $id_admin,'nama' => $nama, 'notlp' => $notlp,'email' => $email, 'alamat' => $alamat, 'role' => $role, 'username' => $user, 'password' => $p_crypt, 'mime' => $mime, 'foto' => $foto);
                            $aLog = array('id_admin' => $idku, 'activity' => $act );

                            if ($this->oModel->update($aData) && $this->oModel->addAlog($aLog)){
                            // header('Location: ' . ROOT_URL  . '?p=Admincrud&a=p_admin');
                            echo '<div class="alert alert-success">Data admin berhasil diedit.</div>';
                            header("Refresh: 3; URL=?p=Admincrud&a=p_admin");
                            }
                            else{
                            // $this->oUtil->sErrMsg = 'Data admin gagal diupdate.';
                            echo '<div class="alert alert-danger">Data admin gagal diedit.</div>';
                            }
                        } else {//foto kosong
                            $aData = array('id_admin' => $id_admin,'nama' => $nama, 'notlp' => $notlp,'email' => $email, 'alamat' => $alamat, 'role' => $role, 'username' => $user, 'password' => $p_crypt);
                            $aLog = array('id_admin' => $idku, 'activity' => $act );

                            if ($this->oModel->updtOld($aData) && $this->oModel->addAlog($aLog)){
                            // header('Location: ' . ROOT_URL  . '?p=Admincrud&a=p_admin');
                            echo '<div class="alert alert-success">Data admin berhasil diedit.</div>';
                            header("Refresh: 3; URL=?p=Admincrud&a=p_admin");
                            }
                            else{
                            // $this->oUtil->sErrMsg = 'Data admin gagal diupdate.';
                            echo '<div class="alert alert-danger">Data admin gagal diedit.</div>';
                            }
                        }
                    }
                }                                
            }
            else
            {
                // $this->oUtil->sErrMsg = 'Data harus terisi semua';
                echo '<div class="alert alert-danger">Data harus terisi semua.</div>';
            }
        }

        /* Get the data of the post */
        $this->oUtil->oEdit = $this->oModel->getById($this->_iId);

        $this->oUtil->getView('edit_admin');
    }
    


    public function delete()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        $idku = $_SESSION['id'];
        $name = $this->oModel->getNama($this->_iId);
        $act = $_SESSION['nama'].' menghapus data profile admin '.$name;

        $aLog = array('id_admin' => $idku, 'activity' => $act );

        if (!empty($_POST['delete']) && $this->oModel->delete($this->_iId) && $this->oModel->addAlog($aLog)){
            // header('Location: ' . ROOT_URL . '?p=Admincrud&a=p_admin');
            echo '<div class="alert alert-success">Data admin berhasil dihapus.</div>';
            header("Refresh: 3; URL=?p=Admincrud&a=p_admin");

        
        }else{
            exit('Kunjungan tidak bisa dihapus.');
        }
        $this->oUtil->getView('admin');
        
    }
}

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}

?>