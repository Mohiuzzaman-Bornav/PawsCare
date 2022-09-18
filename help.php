<?php
session_start();

$sid=$_SESSION['acc_id'];
if(empty($_SESSION["email"]))
        {
             header('Location: '.'index.php');
        }
?>


<!DOCTYPE html>

<html lang="en">
<title>Paws Care</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="home1.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
    
    <a href="userprofile.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><?php

        $dbUser = "root";
        $dbPass = "";
        $dbServer = "localhost";
        $dbDatabase = "paws_care";
        try{
              $conn = new PDO("mysql:host=$dbServer;dbname=$dbDatabase", $dbUser, $dbPass);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $uid="garbage";
              if(isset($_SESSION['acc_id'])) $uid=$_SESSION['acc_id'];
              //echo $uid;
              $query = "SELECT name FROM account_info WHERE acc_id=$uid";
              $stmt = $conn->query($query);
              $table = $stmt->fetchAll(PDO::FETCH_ASSOC); 

              if ($stmt->rowCount() > 0) {
                // output data of each row
                foreach($table as $row){
                    echo $row['name'];
                }
              }
              else {
                echo "0 results";
              }
        
        }
        catch(PDOEXCEPTION $ex){
          echo "ERROR I AM";
        }

      ?></a>

    <a href="foodandmed.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Food & Medicine</a>
    <a href="adoption.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Adoption</a>
    <a href="donation.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Donation</a>
    <a href="help.php" class="w3-bar-item w3-button w3-padding-large w3-white">Help Us</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Logout</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Paws Care</h1>
  <p class="w3-xlarge">Lets Have A Time To Care About Them</p>
  <!--<button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Get Started</button>-->
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <i class="w3-text-red w3-padding-20" style="margin-left: 800px" ></i>
      <h1>Support Us</h1>
      <h3 class="w3-padding-32">PAWS Care is a non-profit organisation of Bangladesh and therefore we rely on donations and support to carry out 
the work we do.</h3>

      <h3><p class="w3-text-grey">Donations will not only enable us to continue our work caring for and rehoming strays but will also support our
efforts towards education and prevention to reduce the number of strays in Bangladesh elsewhere.
Any donation is greatly appreciated. We currently accept donations via Paypal and Bank transfer, however if 
there's another way you'd like to donate, please get in touch!</p><h3>
<h3><p class="w3-text-grey">We rely on donations to continue caring for and rehoming strays. Every donations helps! 
</p><h3>
    </div>

    <div class="w3-third w3-center">
      <!-- <i class="fa fa-coffee w3-padding-64 w3-text-red"></i> -->
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right" style="margin-top: 50px;"></i>
    </div>

    <div class="w3-twothird">
      <h1>How to Donate</h1>
      <h3 class="w3-padding-32"></h3>

      <h3><p class="w3-text-grey">Donate us through bkash. Scane this QR code to make the donation. </p></h3>
      <img src="images/QR.jpg" alt="" class="pro-image-front">
    </div>
  </div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    
    <h1 class="w3-margin w3-xlarge">Get in Touch</h1>
    <h3 class="w3-margin w3-xlarge">Want to learn more about Paws Care or about what you can do to help?</h3>
    <h3 class="w3-margin w3-xlarge">Please contact us via the details below and we will endeavour to get back to you shortly.</h3>
    <i class="fa fa-at"> info_pawscare@gmail.com</i><br>
    <i class="fa fa-mobile"> +8801737373130</i><br>
    <i class="fa fa-location-arrow"> PAWS CARE, House no 420,Goran khilgaon, Dhaka</i>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
 <!-- <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p> -->
</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>