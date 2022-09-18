<?php
  session_start();

  $sid=$_SESSION['acc_id'];

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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/main.css">


<style>
	body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
	.w3-bar,h1,button {font-family: "Montserrat", sans-serif}

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
	    <a href="donation.php" class="w3-bar-item w3-button w3-padding-large w3-white">Donation</a>
	    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Help Us</a>
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




	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-6 ">
				<div class="details_form">
					<form method="POST" action="temp_food_upload_server.php" enctype="multipart/form-data">
						<br>
						<span class="profile100-form-title">
                        	upload food
                    	</span>
				  		
				  		<div class="form-group">
					    <label for="exampleFormControlInput1">food Name</label>
					    <input type="text"  name="foodname"  class="form-control" id="exampleFormControlInput1" placeholder="name">
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlInput1">food price</label>
					    <input type="number"  name="foodprice"  class="form-control" id="exampleFormControlInput1" placeholder="price">
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlSelect1">food type</label>
					    <select class="form-control"  name="foodtype"  id="exampleFormControlSelect1">
					      <option>Dog</option>
					      <option>Cat</option>					   
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlInput1">weight</label>
					    <input type="number" class="form-control" name="foodweight"    id="exampleFormControlInput1" placeholder="200">
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlInput1">food quantity</label>
					    <input type="number" class="form-control" name="foodquantity"    id="exampleFormControlInput1" placeholder="1">
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlInput1">exp date</label>
					    <input type="date" class="form-control" name="foodexpdate"    id="exampleFormControlInput1" placeholder="">
					  </div>
					  <div class="form-group">
					    <label for="exampleFormControlTextarea1">Details</label>
					    <textarea class="form-control"  name="fooddetails"  id="exampleFormControlTextarea1" rows="3"></textarea>
					  </div>
					  <div class="custom-file">
					    <input type="file" name="foodphoto" class="custom-file-input" id="customFile" placeholder="Pet Photo">
					    <label class="custom-file-label" for="customFile"></label>
					  </div>
					  <br>
					  <br>
					  <button type="submit" name="submit" class="profile100-form-btn">Add</button>
					</form>

				</div>
			</div>
		</div>
	</div>
	<!-- <?php
	

	?> -->

	<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
   		<h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
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
	 <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
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

 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>