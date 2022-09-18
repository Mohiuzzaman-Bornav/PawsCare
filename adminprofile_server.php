<?php

  session_start();

  $uid="garbage";
  if(isset($_SESSION['acc_id'])) $uid=$_SESSION['acc_id'];
if(empty($_SESSION["email"]))
        {
             header('Location: '.'index.php');
        }
?>
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
  $query = "UPDATE account_info SET NAME='$username', EMAIL='$email_add', PHN_NO='$contact', ADDRESS='$address', PASSWORD='$password', GENDER='$gender' WHERE acc_id= $uid";


  $stmt = $conn->prepare($query);
  $stmt->execute();

  $_SESSION['massage']="update successful";
  $_SESSION['msg_type']="warning";
  header('Location: adminprofile.php');

} catch(PDOException $ex) {
  echo $ex;
}

?>