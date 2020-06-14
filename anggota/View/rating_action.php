<?php
session_start();
include 'rating_model.php';
$rating = new Rating();
if(!empty($_POST['action']) && $_POST['action'] == 'userLogin') {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$loginDetails = $rating->userLogin($user, $pass);	
	$loginStatus = 0;
	$userName = "";
	if (!empty($loginDetails)) {
		$loginStatus = 1;
		$_SESSION['no_anggota'] = $loginDetails[0]['no_anggota'];
		$_SESSION['nama'] = $loginDetails[0]['nama'];		
		$_SESSION['foto'] = $loginDetails[0]['foto'];
		$userName = $loginDetails[0]['no_anggota'];
	}		
	$data = array(
		"username" => $userName,
		"success"	=> $loginStatus,	
	);
	echo json_encode($data);	
}
if(!empty($_POST['action']) && $_POST['action'] == 'saveRating' 
	&& !empty($_SESSION['no_anggota']) 
	&& !empty($_POST['rating']) 
	&& !empty($_POST['no_katalog'])) {
		$userID = $_SESSION['no_anggota'];	
		$rating->saveRating($_POST, $userID);	
		$data = array(
			"success"	=> 1,	
		);
		echo json_encode($data);		
}
if(!empty($_GET['action']) && $_GET['action'] == 'logout') {
	session_unset();
	session_destroy();
	header("Location:index.php");
}
?>