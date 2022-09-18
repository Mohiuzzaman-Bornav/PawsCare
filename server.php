<?php

if(empty($_SESSION["email"]))
        {
             header('Location: '.'index.php');
        }
include 'dbConnection.php';

$email = $_POST["email"];
$password = $_POST["pass"];




	$query = "SELECT * FROM account_info where EMAIL='$email' and PASSWORD='$password'";

	$stmt = $conn->query($query);
	$table=$stmt->fetchAll(PDO::FETCH_NUM);



	if($stmt->rowCount() == 1){
		session_start();
		$val=$table[0][0];
		$_SESSION['acc_id']=$val;
		$_SESSION['email']=$email;

		if($table[0][7]=='user'){
			header("Location: home1.php");
		}
		else{
			header("Location: home.php");
		}
	}
	else{
		echo "<script>window.alert('Invalid username or password');</script>";
	}




?>