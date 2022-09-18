
<?php


$dbUser = "root";
$dbPass = "";
$dbServer = "localhost";
$dbDatabase = "paws_care";

try {
	$conn = new PDO("mysql:host=$dbServer;dbname=$dbDatabase", $dbUser, $dbPass);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


} catch(PDOException $ex) {
	echo $ex;
}
?>