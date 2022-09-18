<?php

$username = $_POST["user"];
$email_add = $_POST["email"];
$contact = $_POST["phn_no"];
$password = $_POST["pass"];
$address = $_POST["add"];
$gender = $_POST["gen"];
		
$dbUser = "root";
$dbPass = "";
$dbServer = "localhost";
$dbDatabase = "paws_care";

try {

	$conn = new PDO("mysql:host=$dbServer;dbname=$dbDatabase", $dbUser, $dbPass);
	$query = "INSERT INTO account_info (NAME, EMAIL, PHN_NO, ADDRESS, PASSWORD, GENDER)
VALUES ('$username', '$email_add', '$contact', '$address', '$password', '$gender')";
	
	$stmt = $conn->prepare($query);
	$stmt->execute();
	session_start();
	// $_SESSION['acc_id']=$val;
	$_SESSION['email']=$email_add;

	
	header('Location: home1.php');

} catch(PDOException $ex) {
	echo $ex;
}

?>