<?php

	session_start();
if(empty($_SESSION["email"]))
        {
             header('Location: '.'index.php');
        }
	include 'dbConnection.php';

	$statusMsg = '';
	$sid=$_SESSION['acc_id'];

	$name = $_POST["medname"];
	$price = $_POST["medprice"];
	$type = $_POST["medtype"];
	$sipplier = $_POST["medsipplier"];
    $quantity = $_POST["medquantity"];
    $exp_date = $_POST["medexpdate"];
    $details = $_POST["meddetails"];
    //$name = $_POST["foodphoto"];

    
	//$photo = $_POST["petphoto"];


   // date_default_timezone_set('Asia/Dacca');
   // $date = date('Y/m/d h:i:s');


    $targetDir = "SellMed/";
    $fileName = basename($_FILES["medphoto"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["submit"]) && !empty($_FILES["medphoto"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["medphoto"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $conn->query("INSERT into medicine (MEDICINE_NAME, MEDICINE_TYPE, MEDICINE_supplier, MEDICINE_DETAILS, MEDICINE_available, MEDICINE_exp_date, MEDICINE_image, MEDICINE_PRICE) VALUES ('$name','$type', '$sipplier', '$details', '$quantity', '$exp_date','".$fileName."','$price')");
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