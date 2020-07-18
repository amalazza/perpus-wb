<?php
class Rating{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "perpus-wb";    
	private $itemUsersTable = 'anggota';
	private $itemTable = 'katalog';	
    private $itemRatingTable = 'rating';
	private $dbConnect = false;
	private $settingClass = 'login';
	
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('<div style="align-text:center;"><h2>Maaf anda harus memiliki akun jika ingin melihat detail buku ini.</h2></div>');
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}

	public function getSetting(){
		return  $this->settingClass;
	}

	public function userLogin($username, $password){
		$sqlQuery = "
			SELECT * 
			FROM ".$this->itemUsersTable." 
			WHERE no_anggota='".$username."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
	}		
	public function getItemList(){
		$sqlQuery = "
			SELECT * FROM ".$this->itemTable;
		return  $this->getData($sqlQuery);	
	}
	public function getItem($itemId){
		$sqlQuery = "
			SELECT * FROM ".$this->itemTable."
			WHERE no_katalog='".$itemId."'";
		return  $this->getData($sqlQuery);	
	}
	public function getItemRating($itemId){
		$sqlQuery = "
			SELECT r.ratingId, r.no_katalog, r.no_anggota, u.nama, u.foto, r.ratingNumber, r.title, r.comments, r.created, r.modified
			FROM ".$this->itemRatingTable." as r
			LEFT JOIN ".$this->itemUsersTable." as u ON (r.no_anggota = u.no_anggota)
			WHERE r.no_katalog = '".$itemId."' AND r.rate = 'yes' ORDER BY created DESC";
		return  $this->getData($sqlQuery);		
	}
	public function getRatingAverage($itemId){
		$itemRating = $this->getItemRating($itemId);
		$ratingNumber = 0;
		$count = 0;		
		foreach($itemRating as $itemRatingDetails){
			$ratingNumber+= $itemRatingDetails['ratingNumber'];
			$count += 1;			
		}
		$average = 0;
		if($ratingNumber && $count) {
			$average = $ratingNumber/$count;
		}
		return $average;	
	}

	public function getRatingTotal($itemId){

	 	$sqlQuery = "
			SELECT *
			FROM ".$this->itemRatingTable."  WHERE rate = 'yes' AND no_katalog = '".$itemId."'";

	  $count = $this->getNumRows($sqlQuery);

		return $count;
	}

	public function saveRating($POST, $userID){		
		$insertRating = "INSERT INTO ".$this->itemRatingTable." (no_katalog, no_anggota, ratingNumber, title, comments, created, modified) VALUES ('".$POST['itemId']."', '".$userID."', '".$POST['rating']."', '".$POST['title']."', '".$POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
		mysqli_query($this->dbConnect, $insertRating);	
	}
}
?>