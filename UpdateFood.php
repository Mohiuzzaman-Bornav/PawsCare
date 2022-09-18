<?php

  session_start();


 if(empty($_SESSION["email"]))
        {
             header('Location: '.'index.php');
        }
?>
<?php 

$available = $_POST["quantity"];
$food_id= $_GET['FOOD_ID'];

$dbUser = "root";
$dbPass = "";
$dbServer = "localhost";
$dbDatabase = "paws_care";

try {
  
  $conn = new PDO("mysql:host=$dbServer;dbname=$dbDatabase", $dbUser, $dbPass);
  $query = "UPDATE food SET FOOD_available='$available' WHERE FOOD_ID= $food_id";


  $stmt = $conn->prepare($query);
  $stmt->execute();

  $_SESSION['massage']="update successful";
  $_SESSION['msg_type']="warning";

  header('Location: adminfoodandmed.php');

} catch(PDOException $ex) {
  echo $ex;

}

?>