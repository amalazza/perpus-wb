<?php

namespace TestProject\Controller;

require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

//$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

class Katalog
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
        $this->oUtil->getModel('Katalog');
        $this->oModel = new \TestProject\Model\Katalog;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }


    
    // Fungsi Tampil
    

    public function katalog()
    {
		
        $this->oUtil->oKatalog = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('katalog');
    }

    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }
	
	//fungsi view pdf
	public function view()
    {
		
        $this->oUtil->oView = $this->oModel->getPDFById($this->_iId);

        $this->oUtil->getView('view');
    }
	
	public function add()
    {
        if (!$this->isLogged()) exit;

        if (!empty($_POST['add_submit']))
        {
            if (isset($_POST['no_katalog']) <= 15) // Allow a maximum of 50 characters
            {
				
				$aData = array('no_katalog' => $_POST['no_katalog'], 'no_klasifikasi' => $_POST['klasifikasi'], 'no_koleksi' => $_POST['koleksi'],'judul' => $_POST['judul'],'pengarang' => $_POST['pengarang'],'penerbit' => $_POST['penerbit'],'kota_terbit' => $_POST['kota_terbit'],'tahun_terbit' => $_POST['tahun_terbit'],'isbn' => $_POST['isbn'],'lokasi' => $_POST['lokasi'],'absktrak' => $_POST['abstrak'],'tanggal_masuk' => date('Y-m-d H:i:s'),'e_book' => file_get_contents($_FILES['e_book']['tmp_name']),'cover' => addslashes(file_get_contents($_FILES['cover']['tmp_name'])), 'stok'=> $_POST['stok']);

                if ($this->oModel->add($aData))
                     header('Location: ' . ROOT_URL  . '?p=katalog&a=katalog');
                else
                    $this->oUtil->sErrMsg = 'Data Anggota gagal ditambahkan.';
            }
            else
            {
                $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
            }
        }

        //get klasifikasi id from database
		$this->oUtil->oKlasifikasi = $this->oModel->getKlasifikasi();
		
		//get koleksi id from database
		$this->oUtil->oKoleksi = $this->oModel->getKoleksi();
		
		$this->oUtil->getView('add_katalog');
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
        if (!$this->isLogged()) exit;

        if (!empty($_POST['delete']) && $this->oModel->delete($this->_iId))
            header('Location: ' . ROOT_URL . '?p=katalog&a=katalog');
        else
            exit('Anggota tidak bisa dihapus.');
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
