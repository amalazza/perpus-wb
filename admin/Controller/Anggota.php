<?php

namespace TestProject\Controller;

require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

class Anggota
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
        $this->oUtil->getModel('Anggota');
        $this->oModel = new \TestProject\Model\Anggota;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }


    
    // Fungsi Tampil
    
    public function index()
    {
        if (!$this->isLogged()) 
        header('Location: ' . ROOT_URL . '?p=admin&a=login');
        exit;

        $this->oUtil->oAnggota = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('index');
    }

    public function anggota()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
		
        $this->oUtil->oAnggota = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('anggota');
    }
    }

    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }
    
	public function dropdown()
    {
        
			echo json_encode($this->oUtil->oData = $this->oModel->getDataById($_POST['nis']));
    }
	
	public function detailAnggota()
    {
        
			echo json_encode($this->oUtil->oData = $this->oModel->getById($_POST['id']));
    }
	
    public function addSiswa(){
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if (!empty($_POST['add_file']))
        {
            if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
 
			$arr_file = explode('.', $_FILES['berkas_excel']['name']);
			$extension = end($arr_file);
		 
			if('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
		 
			$spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
			 
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			for($i = 1;$i < count($sheetData);$i++)
			{
				$nis = $sheetData[$i]['0'];
				$nama = $sheetData[$i]['1'];
				$inisial_jurusan = $sheetData[$i]['2'];
				$tahun = $sheetData[$i]['3'];
				$kelas = $sheetData[$i]['4'];
				$jurusan = $sheetData[$i]['5'];
				$unit = $sheetData[$i]['6'];
				
				$sData = array('nis' => $nis, 'nama' => $nama, 'jurusan' => $jurusan, 'inisial_jurusan' => $inisial_jurusan, 'tahun' => $tahun, 'kelas' => $kelas, 'unit' => $unit);

                $act = 'Admin '.$_SESSION['nama'].' menginput data siswa baru ke perpus pada tanggal '. date("Y/m/d").' jam '.date("h:m").' '.date("a");
                $aLog = array('id_admin' => $_SESSION['id'], 'activity' => $act );

				if ($this->oModel->addSiswa($sData) && $this->oModel->addAlog($aLog)){
                    // $this->oUtil->sSuccMsg = 'Data siswa berhasil ditambahkan.';
                    // header("Refresh: 3; URL=?p=anggota&a=anggota");
                    echo '<div class="alert alert-success">Data siswa berhasil ditambahkan.</div>';
                    header("Refresh: 3; URL=?p=anggota&a=anggota");
                }
                else{
				// $this->oUtil->sErrMsg = 'Data Anggota gagal ditambahkan.';
                echo '<div class="alert alert-danger">Data siswa gagal ditambahkan.</div>';
            }
			}
			
		}
        $this->oUtil->getView('anggota');
        }
	}
	
	public function add()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['add_submit']))
        {
            if (isset($_POST['nis']) <= 15) // Allow a maximum of 50 characters
            {
				
                $idku = $_SESSION['id'];
                $act = 'Admin '.$_SESSION['nama'].' menambahkan '.$_POST['nama'].' kelas '.$_POST['kelas'].' menjadi anggota perpus.';

				$aData = array('no_anggota' => $_POST['nis'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' => sha1($_POST['confirm_password']),'foto' => addslashes(file_get_contents($_FILES['foto']['tmp_name'])));
                $aLog = array('id_admin' => $idku, 'activity' => $act );

                if ($this->oModel->add($aData) && $this->oModel->addAlog($aLog)){
                    // $this->oUtil->sSuccMsg = 'Data anggota berhasil ditambahkan.';
                    // header("Refresh: 3; URL=?p=anggota&a=anggota");
                    echo '<div class="alert alert-success">Data anggota berhasil ditambahkan.</div>';
                    header("Refresh: 3; URL=?p=anggota&a=anggota");
				}
                else{
                    // $this->oUtil->sErrMsg = 'Data Anggota gagal ditambahkan.';
                    echo '<div class="alert alert-danger">Data anggota gagal ditambahkan.</div>';
				}
            }
            else
            {
                // $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
                echo '<div class="alert alert-danger">Nomor anggota harus diisi.</div>';
            }
        }

        //get nis from database
		$this->oUtil->oNIS = $this->oModel->getNIS();
		
		$this->oUtil->getView('add_anggota');
    }
    }

    public function edit()

    {

        if (!$this->isLogged()) exit;



        if (!empty($_POST['edit_submit']))

        {

				

				$pass = $_POST['confirm_password'];

				$oldPass = $_POST['Opassword'];

				$compare = strcmp($pass, $oldPass);

				

				if(!empty($_FILES['foto']['tmp_name'])){

					if ($compare == 0) {

						$aData = array('no_anggota' => $_POST['no_anggota'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' => $oldPass,'foto' => addslashes(file_get_contents($_FILES['foto']['tmp_name'])));



						if ($this->oModel->update($aData)){

						// $this->oUtil->sSuccMsg = 'Data anggota berhasil diedit.';
						// header("Refresh: 3; URL=?p=anggota&a=anggota");
                        echo '<div class="alert alert-success">Data anggota berhasil diedit.</div>';
                        header("Refresh: 3; URL=?p=anggota&a=anggota");
                    }

						else{

						// $this->oUtil->sErrMsg = 'Data anggota gagal diedit.';
                        echo '<div class="alert alert-danger">Data anggota gagal diedit.</div>';

                    }

					}

					else{

						$aData = array('no_anggota' => $_POST['no_anggota'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' => sha1($pass),'foto' => addslashes(file_get_contents($_FILES['foto']['tmp_name'])));



						if ($this->oModel->update($aData)){

						// $this->oUtil->sSuccMsg = 'Data anggota berhasil diedit.';
                        // header("Refresh: 3; URL=?p=anggota&a=anggota");
                        echo '<div class="alert alert-success">Data anggota berhasil diedit.</div>';
                        header("Refresh: 3; URL=?p=anggota&a=anggota");
                    }

                        else{

                        // $this->oUtil->sErrMsg = 'Data anggota gagal diedit.';
                        echo '<div class="alert alert-danger">Data anggota gagal diedit.</div>';

                    }
						}

					}

				

				else{

					if ($compare == 0) {

						$aData = array('no_anggota' => $_POST['no_anggota'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' => $oldPass);



						if ($this->oModel->updateNoPic($aData)){

						// $this->oUtil->sSuccMsg = 'Data anggota berhasil diedit.';
                        // header("Refresh: 3; URL=?p=anggota&a=anggota");
                        echo '<div class="alert alert-success">Data anggota berhasil diedit.</div>';
                        header("Refresh: 3; URL=?p=anggota&a=anggota");
                    }

                        else{

                        // $this->oUtil->sErrMsg = 'Data anggota gagal diedit.';
                        echo '<div class="alert alert-danger">Data anggota gagal diedit.</div>';

                    }

					}

					else{

						$aData = array('no_anggota' => $_POST['no_anggota'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' => sha1($pass));



						if ($this->oModel->updateNoPic($aData)){

						// $this->oUtil->sSuccMsg = 'Data anggota berhasil diedit.';
                        // header("Refresh: 3; URL=?p=anggota&a=anggota");
                        echo '<div class="alert alert-success">Data anggota berhasil diedit.</div>';
                        header("Refresh: 3; URL=?p=anggota&a=anggota");
                    }

                        else{

                        // $this->oUtil->sErrMsg = 'Data anggota gagal diedit.';
                        echo '<div class="alert alert-danger">Data anggota gagal diedit.</div>';

                    }

					}

				}
		}


        $this->oUtil->oAnggota = $this->oModel->getAllById($this->_iId);



        $this->oUtil->getView('edit_anggota');

    }
	

    public function delete()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['delete'])){
			try{
				$this->oModel->delete($this->_iId)
				echo '<div class="alert alert-success">Data anggota berhasil dihapus.</div>';
				header("Refresh: 3; URL=?p=anggota&a=anggota");
			}
			catch{
				echo "<script type='text/javascript'>alert('Maaf, data tidak dapat dihapus karena terdapat data pada peminjaman'); window.history.back();</script>";
			}
		}
        else{
		exit('Anggota tidak bisa dihapus.');}
    }
    $this->oUtil->getView('anggota');
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
