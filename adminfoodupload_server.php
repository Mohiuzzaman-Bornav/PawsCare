<?php

	session_start();
if(empty($_SESSION["email"]))
        {
             header('Location: '.'index.php');
        }
	include 'dbConnection.php';

	$statusMsg = '';
	$sid=$_SESSION['acc_id'];

	$name = $_POST["foodname"];
	$price = $_POST["foodprice"];
	$type = $_POST["foodtype"];
	$weight = $_POST["foodweight"];
    $quantity = $_POST["foodquantity"];
    $exp_date = $_POST["foodexpdate"];
    $details = $_POST["fooddetails"];
    //$name = $_POST["foodphoto"];

    
	//$photo = $_POST["petphoto"];


   // date_default_timezone_set('Asia/Dacca');
   // $date = date('Y/m/d h:i:s');


    $targetDir = "SellFood/";
    $fileName = basename($_FILES["foodphoto"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["submit"]) && !empty($_FILES["foodphoto"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["foodphoto"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $conn->query("INSERT into food (FOOD_NAME, FOOD_TYPE, FOOD_WEIGHT, FOOD_DETAILS, FOOD_available, FOOD_exp_date, FOOD_image, FOOD_PRICE) VALUES ('$name','$type', '$weight', '$details', '$quantity', '$exp_date','".$fileName."','$price')");
                if($insert){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                }else{
                    $statusMsg = "File upload failed, please try again.";
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }



    echo $statusMsg;

	header('Location: adminprofile.php');
?>