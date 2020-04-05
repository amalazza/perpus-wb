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
				$kelas = $sheetData[$i]['2'];
				
				$sData = array('nis' => $nis, 'nama' => $nama, 'kelas' => $kelas);
				if ($this->oModel->addSiswa($sData)){
                 $this->oUtil->sSuccMsg = 'Data siswa berhasil ditambahkan.';
                    header("Refresh: 3; URL=?p=anggota&a=anggota");}
                else{
				$this->oUtil->sErrMsg = 'Data Anggota gagal ditambahkan.';}
			}
			
		}
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
                $act = $_SESSION['nama'].' menerima kunjungan dari anggota '.$_POST['nAnggota'];

				$aData = array('no_anggota' => $_POST['nis'], 'nama' => $_POST['nama'], 'kelas' => $_POST['kelas'],'alamat' => $_POST['alamat'],'no_telpon' => $_POST['no_telpon'],'email' => $_POST['email'],'password' => sha1($_POST['confirm_password']),'foto' => addslashes(file_get_contents($_FILES['foto']['tmp_name'])));
                $aLog = array('id_admin' => $idku, 'activity' => $act );

                if ($this->oModel->add($aData) && $this->oModel->addAlog($aLog)){
                    $this->oUtil->sSuccMsg = 'Data anggota berhasil ditambahkan.';
                    header("Refresh: 3; URL=?p=anggota&a=anggota");
				}
                else{
                    $this->oUtil->sErrMsg = 'Data Anggota gagal ditambahkan.';
				}
            }
            else
            {
                $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
            }
        }

        //get nis from database
		$this->oUtil->oNIS = $this->oModel->getNIS();
		
		$this->oUtil->getView('add_anggota');
    }
    }

    /* public function edit()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['edit_submit']))
        {
            if (isset($_POST['no_anggota']))
            {
                $aData = array('no_kunjungan' => $this->_iId, 'no_anggota' => $_POST['no_anggota']);

                if ($this->oModel->update($aData))
                    $this->oUtil->sSuccMsg = 'Data anggota berhasil diedit.';
                else
                    $this->oUtil->sErrMsg = 'Data anggota gagal diedit.';
            }
            else
            {
                $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
            }
        }

        /* Get the data of the post 
        $this->oUtil->oKunjungan = $this->oModel->getById($this->_iId);

        $this->oUtil->getView('edit_kunjungan');
    } */

    public function delete()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['delete']) && $this->oModel->delete($this->_iId)){
            $this->oUtil->sSuccMsg = 'Data anggota berhasil dihapus.';
		header("Refresh: 3; URL=?p=anggota&a=anggota");}
        else{
		exit('Anggota tidak bisa dihapus.');}
    }
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
