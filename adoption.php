<?php
  session_start();
  include 'dbConnection.php';
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
	    <a href="adoption.php" class="w3-bar-item w3-button w3-padding-large w3-white">Adoption</a>
	    <a href="donation.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Donation</a>
	    <a href="help.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Support</a>
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
<br>
<br>
<br>
<br>
<br>
<br>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<table  class="table">
  <thead class="black white-text">

    <tr class="bg-dark" style="color: #fff;">
      <th scope="col">SL</th>
      <th scope="col">Image</th>
      <th scope="col">Info</th>
      <th scope="col">Click To Request</th>
    </tr>
  </thead>
  <?php

    $query = "SELECT * FROM pet_info WHERE STATUS = 'donate'";
    $stmt = $conn->query($query);
    $table = $stmt->fetchAll(PDO::FETCH_NUM); 

    if ($stmt->rowCount() > 0) {
      // output data of each row
      foreach($table as $row){


  ?>
  <tbody>
    <tr>
      <td scope="row">1</td>
      <td>
      	<div class="image-container">
           <img src="files/<?php echo $row[8] ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />                      
        </div>
      </td>
      <td>
      	
          <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);"><?php echo $row[0] ?></a></h2>
          <h6 class="d-block"><a href="javascript:void(0)">Pet Type </a> <?php echo $row[2] ?></h6>
          <h6 class="d-block"><a href="javascript:void(0)">Age </a><?php echo $row[4] ?></h6>
          <h6 class="d-block"><a href="javascript:void(0)">Gender </a><?php echo $row[3] ?></h6>
          <h6 class="d-block"><a href="javascript:void(0)">Details </a><?php echo $row[7] ?></h6>                   
                       
      	<br>
       
      </td>
      
      	<br>
      	

      	<td>
          <!-- Button trigger modal -->
			<?php
			 $id = $row[1];
			$query = "SELECT * FROM pet_adoption WHERE PET_ID = '$id' AND ACC_ID='$sid'";
			$stmt = $conn->query($query);
			$table=$stmt->fetchAll(PDO::FETCH_NUM);
			if($stmt->rowCount()>0){
				if($table[0][5]=='adopt_req'){
			?>	
				<a href="adoptionserver.php?PET_ID= <?php echo $row[1] ?>"><button type="button" class="btn btn-primary" id="btn_request" disabled>
				  Request Sent
				</button></a>
				
				<?php
				}

			}
			else{
					?>
					<a href="adoptionserver.php?PET_ID= <?php echo $row[1] ?>"><button type="button" class="btn btn-primary" id="btn_request" >
				  Request
				</button></a>
				<?php
			}?>
			
		</td>
	
			
     
    </tr>
    <?php }

        } else {
            echo "0 results";
        }?>

  </tbody>
   
</table>
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

 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<script>
	$('#requestModal').on('shown.bs.modal', function () {
		  var petId = $(e.relatedTarget).data('PET_ID');

		  $(e.currentTarget).find('input[name="pet_id"]').val(petId);

		})
	</script>

</body>
</html>