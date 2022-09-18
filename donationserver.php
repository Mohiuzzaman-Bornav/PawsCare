<?php
	session_start();
if(empty($_SESSION["email"]))
        {
             header('Location: '.'index.php');
        }
	include 'dbConnection.php';
	$statusMsg = '';
	$sid=$_SESSION['acc_id'];

	$type = $_POST["pettype"];
	$gender = $_POST["petgen"];
	$age = $_POST["petage"];
	$details = $_POST["petdetails"];
    $name = $_POST["petname"];
    
	//$photo = $_POST["petphoto"];


    date_default_timezone_set('Asia/Dacca');
    $date = date('Y/m/d h:i:s');


    $targetDir = "files/";
    $fileName = basename($_FILES["petphoto"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["submit"]) && !empty($_FILES["petphoto"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["petphoto"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $conn->query("INSERT into pet_info (pet_name,PET_TYPE, PET_GENDER, PET_AGE, details, ACC_ID, photo,donate_date) VALUES ('$name','$type', '$gender', '$age', '$details', '$sid','".$fileName."','$date')");
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

	header('Location: donation.php');
?>