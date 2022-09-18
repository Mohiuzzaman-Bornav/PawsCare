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
	$query = "INSERT INTO pet_adoption (PET_req_date,ACC_ID,PET_ID,status) VALUES('$date','$sid','$pet_id','adopt_req')";
	
	$stmt = $conn->query($query);
	// $table=$stmt->fetchAll(PDO::FETCH_NUM);

	header("Location: adoption.php");
	
?>