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



        if (isset($_POST['btnLoginku']))

        {

            

            $u = $_POST['no_anggota'];

            $p = $_POST['password'];

            $p_crypt = sha1($p);



            $sHashPassword =  $this->oModel->login($u);

            $idku = $_POST['no_anggota'];

            $namaku = $this->oModel->ambil_nama($u);

            $kelasku = $this->oModel->ambil_kelas($u);



            $compare = strcmp($p_crypt, $sHashPassword);



            if ($compare == 0)

            {   

                $_SESSION['is_logged'] = 1; // Master Admin is logged now

                $_SESSION['id'] = $idku;

                $_SESSION['nama'] = $namaku;

                $_SESSION['kelas'] = $kelasku;

                header('Location: ' . ROOT_URL . '?p=beranda&a=index');

                exit;

            }          

            else

            {

                // $this->oUtil->sErrMsg = 'Incorrect Login!';
                echo '<div class="alert alert-danger">Login Gagal.</div>';
                header("Refresh: 3; URL=?p=beranda&a=login");

            }

        }


		
        $this->oUtil->getView('login');
		$this->oModel->updatePesananan();

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

                $pass = $_POST['password'];

                $p_crypt = sha1($pass);

                $aData = array('no_anggota' => $_POST['nis'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' =>$p_crypt ,'foto' => addslashes(file_get_contents($_FILES['foto']['tmp_name'])));

                $log = "Kamu telah membuat akun baru bernama ".$_POST['nama']." pada tanggal ".date('d-m-Y').", selamat menikmati fitur perpustakaan online ini.";
                $aLog = array('no_anggota' => $_POST['nis'], 'activity' => $log);

                if ($this->oModel->add($aData) && $this->oModel->addAngLog($aLog)){

                     // header('Location: ' . ROOT_URL  . '?p=anggota&a=login');
                    echo '<div class="alert alert-success">Selamat! Anda berhasil mendaftar sebagai anggota.</div>';
                    header("Refresh: 3; URL=?p=anggota&a=login");

                }else{

                    // $this->oUtil->sErrMsg = 'Data Anggota gagal ditambahkan.';
                    echo '<div class="alert alert-danger">Gagal mendaftar sebagai anggota.</div>';
                }

            }

            else

            {

                // $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
                echo '<div class="alert alert-danger">Nomor anggota harus diisi.</div>';

            }

        }



        // get nis from database

        $this->oUtil->oNIS = $this->oModel->getNIS();

        

        $this->oUtil->getView('add_anggota');

    }



        // Homepage

    public function profile()

    {

        if (!$this->isLogged())

        {

           header('Location: ' . ROOT_URL);

           exit; 

        }

        else{

        $this->oUtil->oAnggota = $this->oModel->getById($_SESSION['id']);

        $this->oUtil->oPesan = $this->oModel->getPemesananById($_SESSION['id']);

        $this->oUtil->oPinjam = $this->oModel->getPeminjamanById($_SESSION['id']);

        $this->oUtil->oRiwayat = $this->oModel->getRiwayatById($_SESSION['id']);

        // $this->oUtil->oEbookBelumDinilai = $this->oModel->getEbookBelumDinilaiById($_SESSION['id']);

        $this->oUtil->oBelumDinilai = $this->oModel->getBelumDinilaiById($_SESSION['id']);

        $this->oUtil->oSudahDinilai = $this->oModel->getSudahDinilaiById($_SESSION['id']);

        $this->oUtil->oAlog = $this->oModel->getLog($_SESSION['id']);

        $this->oUtil->oBuku = $this->oModel->getAllBuku(0, self::MAX_POSTS);

        $this->oUtil->oTahun = $this->oModel->getTahun();

        $this->oUtil->oJenis = $this->oModel->getJenis();

        $this->oUtil->oKoleksi = $this->oModel->getKoleksi();

        $this->oUtil->oJenisBuku = $this->oModel->getJenisBuku();


        $this->oUtil->getView('profile');
    }

	}
	
	public function detailProfile()
    {
        
			echo json_encode($this->oUtil->oData = $this->oModel->getDetailById($_POST['id']));
    }



    // public function buku()

    // {

    //     $this->oUtil->oAnggota = $this->oModel->getBukuById($this->_iId); // Get the data of the post



    //     $this->oUtil->getView('profile');

    // }

	

	public function edit()

    {

        if (!$this->isLogged()) exit;



        if (!empty($_POST['edit_submit']))

        {
				$pass = $_POST['password'];

				$oldPass = $_POST['Opassword'];

				$compare = strcmp($pass, $oldPass);
                $Log = "Kamu mengubah detail informasi data keanggotaanmu pada tanggal ".date('d-m-Y');
                $aLog = array('no_anggota' => $_POST['no_anggota'], 'activity' => $Log);

				if(!empty($_FILES['foto']['tmp_name'])){//newfoto
					if ($compare == 0) {//newfoto+oldpass
						$aData = array('no_anggota' => $_POST['no_anggota'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' => $oldPass,'foto' => addslashes(file_get_contents($_FILES['foto']['tmp_name'])));

						if ($this->oModel->update($aData) && $this->oModel->addAngLog($aLog)){
                        echo '<div class="alert alert-success">Data berhasil diedit.</div>';
                        header("Refresh: 3; URL=?p=anggota&a=profile");
                        }else{
                        echo '<div class="alert alert-danger">Data gagal diedit.</div>';
                        }
					}else{//newfoto+newpass
						$aData = array('no_anggota' => $_POST['no_anggota'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' => sha1($pass),'foto' => addslashes(file_get_contents($_FILES['foto']['tmp_name'])));

                        if ($this->oModel->update($aData) && $this->oModel->addAngLog($aLog)){
                        echo '<div class="alert alert-success">Data berhasil diedit.</div>';
                        header("Refresh: 3; URL=?p=anggota&a=profile");
                        }else{
                        echo '<div class="alert alert-danger">Data gagal diedit.</div>';
                        }
                    }
				}else{//oldfoto
					if ($compare == 0) {//oldfoto+oldpass
						$aData = array('no_anggota' => $_POST['no_anggota'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' => $oldPass);

						if ($this->oModel->updateNoPic($aData) && $this->oModel->addAngLog($aLog)){
                        echo '<div class="alert alert-success">Data berhasil diedit.</div>';
                        header("Refresh: 3; URL=?p=anggota&a=profile");
                        }else{
                        echo '<div class="alert alert-danger">Data gagal diedit.</div>';
                        }
					}else{//oldfoto+newpass
						$aData = array('no_anggota' => $_POST['no_anggota'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' => sha1($pass));
                        
                        if ($this->oModel->updateNoPic($aData) && $this->oModel->addAngLog($aLog)){
                        echo '<div class="alert alert-success">Data berhasil diedit.</div>';
                        header("Refresh: 3; URL=?p=anggota&a=profile");
                        }else{
                        echo '<div class="alert alert-danger">Data gagal diedit.</div>';
                        }
					}
				}
        }
        // Get the data of the post 

        $this->oUtil->oAnggota = $this->oModel->getById($this->_iId);
        $this->oUtil->getView('edit_anggota');
    }

    public function dropdown()
    {
        
            echo json_encode($this->oUtil->oData = $this->oModel->getDataById($_POST['nis']));
    }

}