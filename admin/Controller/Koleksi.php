<?php

namespace TestProject\Controller;

require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Exception;

//$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

class Koleksi
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
        $this->oUtil->getModel('Koleksi');
        $this->oModel = new \TestProject\Model\Koleksi;

        /** Get the Post ID in the constructor in order to avoid the duplication of the same code **/
        $this->_iId = (int) (!empty($_GET['id']) ? $_GET['id'] : 0);
    }


    
    // Fungsi Tampil
    public function index()
    {
        if (!$this->isLogged()) 
        header('Location: ' . ROOT_URL . '?p=admin&a=login');
        exit;

        $this->oUtil->oKoleksi = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('index');
    }

    public function koleksi()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
		
        $this->oUtil->oKoleksi = $this->oModel->get(0, self::MAX_POSTS); // Get only the latest X posts

        $this->oUtil->getView('koleksi');
    }
    }

    public function notFound()
    {
        $this->oUtil->getView('not_found');
    }
	
	public function detailKoleksi()
    {
			$idKoleksi = $_POST['id'];
			echo json_encode($this->oUtil->oData = $this->oModel->getById($idKoleksi));
    }
	
	//fungsi view pdf
	public function view()
    {
        if (!$this->isLogged()) exit;
		if (!empty($_POST['view']))
        {
		
		$this->oUtil->oView = $this->oModel->getPDFById($_POST['id']);

        $this->oUtil->getView('view');
		}
    }
	
	public function viewPDF()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{
	
		$this->oUtil->oView = $this->oModel->getPDF($this->_iId);

        $this->oUtil->getView('view');
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
            if (isset($_POST['no_koleksi']) <= 15) // Allow a maximum of 50 characters
            {
				if(!empty($_FILES['e_book']['tmp_name'])){
					$e_book = file_get_contents($_FILES['e_book']['tmp_name']);
				}else{
				$e_book = "";}

                $idku = $_SESSION['id'];
                $act = $_SESSION['nama'].' menambahkan koleksi baru '.$_POST['jenis_koleksi'];

				$aData = array('no_koleksi' => $_POST['no_koleksi'], 'jenis_koleksi' => $_POST['jenis_koleksi']);

                // $aDup = $_POST['tahun_terbit'];
                // $dupt = $this->oModel->sDuplikat($aDup);

                $aLog = array('id_admin' => $idku, 'activity' => $act );

                // $tahun = array('id_thn' => '','thn_terbit' => $_POST['tahun_terbit']);

                // if ($dupt !== 0){
                    if ($this->oModel->add($aData) && $this->oModel->addAlog($aLog)){
                    // echo '<div class="alert alert-success">Data Koleksi berhasil ditambahkan.</div>';
                    // header("Refresh: 3; URL=?p=koleksi&a=koleksi");
                    echo '<div class="alert alert-success">Data koleksi berhasil tambahkan.</div>';
                    header("Refresh: 3; URL=?p=koleksi&a=koleksi");
                    }
                    else{
                     // $this->oUtil->sErrMsg = 'Data Koleksi gagal ditambahkan.';
                    echo '<div class="alert alert-danger">Data koleksi gagal tambahkan.</div>';
                    }
                // }elseif ($this->oModel->add($aData) && $this->oModel->addthnTerbit($tahun) && $this->oModel->addAlog($aLog)) {
                //     echo '<div class="alert alert-success">Data klasifikasi berhasil ditambahkan.</div>';
                //     header("Refresh: 3; URL=?p=klasifikasi&a=klasifikasi");
                //     }
                //     else{
                //      $this->oUtil->sErrMsg = 'Data Anggota gagal ditambahkan.';
                //     }
                }
            }
            // else
            // {
            //     $this->oUtil->sErrMsg = 'Nomor anggota harus diisi.';
            // }
        }

		
		//get koleksi id from database
		$this->oUtil->oKoleksi = $this->oModel->getKoleksi();
		
		$this->oUtil->getView('add_koleksi');
    }

    public function edit()
    {
        if (!$this->isLogged())
        {
           header('Location: ' . ROOT_URL);
           exit; 
        }
        else{

        if (!empty($_POST['edit_submit']))
        {
            if (isset($_POST['no_koleksi']))
            {
                if(!empty($_FILES['cover']['tmp_name'])){
                    $cover = file_get_contents($_FILES['cover']['tmp_name']);
                }else{
                $e_book = "";}
                $aData = array('no_koleksi' => $_POST['no_koleksi'], 'jenis_koleksi' => $_POST['jenis_koleksi']);

                if ($this->oModel->update($aData)){
                    // echo '<div class="alert alert-success">Data koleksi berhasil diedit.</div>';
                    // header("Refresh: 3; URL=?p=koleksi&a=koleksi");
                    echo '<div class="alert alert-success">Data koleksi berhasil diedit.</div>';
                    header("Refresh: 3; URL=?p=koleksi&a=koleksi");
                }
                else{
                    echo '<div class="alert alert-danger">Data koleksi gagal diedit.</div>';
                }
            }
            else
            {
                // $this->oUtil->sErrMsg = 'Nomor koleksi harus diisi.';
                echo '<div class="alert alert-danger">Nomor koleksi harus diisi.</div>';
            }
        }

        // Get the data of the post 
        $this->oUtil->oKoleksi= $this->oModel->getAllById($this->_iId);

        $this->oUtil->getView('edit_koleksi');
    } 
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
				$this->oModel->delete($this->_iId);
				// header('Location: ' . ROOT_URL . '?p=koleksi&a=koleksi');
                echo '<div class="alert alert-success">Data koleksi berhasil dihapus.</div>';
                header("Refresh: 3; URL=?p=koleksi&a=koleksi");
			}
			catch(Exception $e){
				echo "<script type='text/javascript'>alert('Maaf, data tidak dapat dihapus karena terdapat data pada katalog'); window.history.back();</script>";
				//header('Location: ' . ROOT_URL . '?p=klasifikasi&a=klasifikasi');
			}
		}
        else{
			exit('klasifikasi tidak bisa dihapus.');	
		}
        $this->oUtil->getView('koleksi');
        
    }
    }

    protected function isLogged()
    {
        return !empty($_SESSION['is_logged']);
    }
}
