<?php
  session_start();
  if(empty($_SESSION["email"]))
        {
             header('Location: '.'index.php');
        }
  include 'dbConnection.php';
  $sid=$_SESSION['acc_id'];
  $msg='Request Sent';
  echo "<script>window.alert('$msg')</script>";
  // $pid=$_SESSION['adoption_pid'];
  // echo "<script>window.alert('$pid')</script>";

	$pet_id= $_GET['PET_ID'];
	date_default_timezone_set('Asia/Dacca');
    $date = date('Y/m/d h:i:s');
	$query = "UPDATE pet_adoption SET status='approve',PET_adp_date='$date' WHERE PET_ID= $pet_id";
	
	$stmt = $conn->query($query);
	// $table=$stmt->fetchAll(PDO::FETCH_NUM);

	header("Location: adoption_request.php");
	
?>