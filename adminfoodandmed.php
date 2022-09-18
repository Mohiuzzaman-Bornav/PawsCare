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
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/main.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
/*.fa-anchor,.fa-coffee {font-size:0px}*/
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>

    <a href="home.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>

    <a href="adminprofile.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><?php

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
    <a href="adminfoodandmed.php" class="w3-bar-item w3-button w3-padding-large w3-white">Food & Medicine</a>
    <a href="adoption_request.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Adoption Request</a>
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
<!-- <header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo"><i class="fa fa-user"></i></h1>
  <p class="w3-xlarge">User Information</p>
</header> -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container details_tab">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">       
          <div class="row">
            <div class="col-12">
              <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Add food</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Add Medicine</a>
                  </li> 
                  <li class="nav-item">
                      <a class="nav-link" id="adoptionrequest-tab" data-toggle="tab" href="#adoptionrequest" role="tab" aria-controls="adoptionrequest" aria-selected="false">Update Food</a>
                  </li>    
                  <li class="nav-item">
                      <a class="nav-link" id="addmed-tab" data-toggle="tab" href="#add-med" role="tab" aria-controls="addmed" aria-selected="false">Update Medicine</a>
                  </li>              
              </ul>





              <div class="tab-content ml-1" id="myTabContent">
                

              <!-- __________________________first tab------------------------------- -->

                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                  <div class="container">
                    <div class="row justify-content-md-center">
                      <div class="col-md-6 ">
                        <div class="details_form">
                          <form method="POST" action="adminfoodupload_server.php" enctype="multipart/form-data">
                            <br>
                            <span class="profile100-form-title">
                                          Upload Food
                                      </span>
                              
                              <div class="form-group">
                              <label for="exampleFormControlInput1">Food Name</label>
                              <input type="text"  name="foodname"  class="form-control" id="exampleFormControlInput1" placeholder="name">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Food price</label>
                              <input type="number"  name="foodprice"  class="form-control" id="exampleFormControlInput1" placeholder="price">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Food type</label>
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
                              <label for="exampleFormControlInput1">Food quantity</label>
                              <input type="number" class="form-control" name="foodquantity"    id="exampleFormControlInput1" placeholder="1">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Exp date</label>
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
                  <hr />             
                </div>

                <!-- __________________________first tab end------------------------------- -->
                <!-- __________________________scond tab------------------------------- -->


          <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">

                  <div class="container">
                    <div class="row justify-content-md-center">
                      <div class="col-md-6 ">
                        <div class="details_form">
                          <form method="POST" action="adminMedupload_server.php" enctype="multipart/form-data">
                            <br>
                            <span class="profile100-form-title">
                                          Upload Medicine
                                      </span>
                              
                              <div class="form-group">
                              <label for="exampleFormControlInput1">Medicine Name</label>
                              <input type="text"  name="medname"  class="form-control" id="exampleFormControlInput1" placeholder="name">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Medicine price</label>
                              <input type="number"  name="medprice"  class="form-control" id="exampleFormControlInput1" placeholder="price">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Medicine type</label>
                              <select class="form-control"  name="medtype"  id="exampleFormControlSelect1">
                                <option>Dog</option>
                                <option>Cat</option>             
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Supplier</label>
                              <input type="text" class="form-control" name="medsipplier"    id="exampleFormControlInput1" placeholder="200">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Medicine quantity</label>
                              <input type="number" class="form-control" name="medquantity"    id="exampleFormControlInput1" placeholder="1">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Exp date</label>
                              <input type="date" class="form-control" name="medexpdate"    id="exampleFormControlInput1" placeholder="">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">Details</label>
                              <textarea class="form-control"  name="meddetails"  id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="custom-file">
                              <input type="file" name="medphoto" class="custom-file-input" id="customFile" placeholder="Pet Photo">
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

                                
              </div>
              <!-- __________________________scond tab end------------------------------- -->
              <!-- __________________________third tab------------------------------- -->


              <div class="tab-pane fade" id="adoptionrequest" role="tabpanel" aria-labelledby="adoptionrequest-tab">

                <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    
                    <table  class="table">
                <thead class="black white-text">

                  <tr class="bg-dark" style="color: #fff;">
                    <!-- <th scope="col">SL</th> -->
                    <th scope="col">Image</th>
                    <th scope="col">Info</th>
                    <th scope="col">Update</th>
                  </tr>
                </thead>
                <?php

                  $query = "SELECT * FROM food ";

                  $stmt = $conn->query($query);
                  $table = $stmt->fetchAll(PDO::FETCH_NUM); 

                  if ($stmt->rowCount() > 0) {
                    // output data of each row
                    foreach($table as $row){
                 ?>
                <tbody>
                  <tr>
                    <!-- <td scope="row">1</td> -->
                    <td>
                      <div class="image-container">
                         <img src="SellFood/<?php echo $row[7] ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />                     
                      </div>
                    </td>
                    <td>
                      
                      <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);"><?php echo $row[1] ?></a></h2>
                      <h6 class="d-block"><a href="javascript:void(0)">Price </a> <?php echo $row[8] ?></h6>
                      <h6 class="d-block"><a href="javascript:void(0)">Food Type </a> <?php echo $row[2] ?></h6>
                      <h6 class="d-block"><a href="javascript:void(0)">Weight </a><?php echo $row[3] ?></h6>
                      <h6 class="d-block"><a href="javascript:void(0)">Available </a><?php echo $row[5] ?></h6>
                      <h6 class="d-block"><a href="javascript:void(0)">Details </a><?php echo $row[4] ?></h6>
                      <h6 class="d-block"><a href="javascript:void(0)">Exp_date </a><?php echo $row[6] ?></h6>
                    </td>                  
                    <td>
                        <!-- Button trigger modal -->
                    <form action="UpdateFood.php" method="POST">
                        <div class="container">
                            <div class="row">
                             <div class="col-lg-2">
                              <div class="input-group">
                                
                                <span class="input-group-btn">
                                  <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">-
                                    <span class="glyphicon glyphicon-minus"></span>
                                  </button>
                                </span>
                                <input  type="text" id="quantity" name="quantity" class="form-control input-number" value="<?php echo $row[5] ?>" min="1" max="100">
                                <span class="input-group-btn">
                                  <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">+
                                    <span class="glyphicon glyphicon-plus"></span>
                                  </button>
                                </span>
                              
                              </div>
                             </div>
                           </div>
                          </div>
                          <a href="UpdateFood.php?FOOD_ID= <?php echo $row[0] ?>"><button type="submit" class="btn btn-primary" id="btn_request" >Update</button></a>
                      </form>
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

            </div>


            <!-- __________________________third tab end------------------------------- -->
            <!-- __________________________forth tab------------------------------- -->

            
            <div class="tab-pane fade" id="add-med" role="tabpanel" aria-labelledby="addmed-tab">


            <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      
                      <table  class="table">
                  <thead class="black white-text">

                    <tr class="bg-dark" style="color: #fff;">
                      <th scope="col">Image</th>
                      <th scope="col">Info</th>
                      <th scope="col">Update</th>
                    </tr>
                  </thead>
                  <?php

                    $query = "SELECT * FROM medicine ";

                    $stmt = $conn->query($query);
                    $table = $stmt->fetchAll(PDO::FETCH_NUM); 

                    if ($stmt->rowCount() > 0) {
                      // output data of each row
                      foreach($table as $row){


                  ?>
                  <tbody>
                    <tr>
                      <!-- <td scope="row">1</td> -->
                    <td>
                        <div class="image-container">
                           <img src="SellMed/<?php echo $row[6] ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />                      
                        </div>
                    </td>
                    <td>
                        
                      <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);"><?php echo $row[1] ?></a></h2>
                      <h6 class="d-block"><a href="javascript:void(0)">Price </a> <?php echo $row[7] ?></h6>
                      <h6 class="d-block"><a href="javascript:void(0)">Medicine Type </a> <?php echo $row[2] ?></h6>
                      <h6 class="d-block"><a href="javascript:void(0)">Supplier </a><?php echo $row[3] ?></h6>
                      <h6 class="d-block"><a href="javascript:void(0)">Available </a><?php echo $row[4] ?></h6>
                      <h6 class="d-block"><a href="javascript:void(0)">Details </a><?php echo $row[3] ?></h6>
                      <h6 class="d-block"><a href="javascript:void(0)">Exp_date </a><?php echo $row[5] ?></h6>                                         
                    </td>

                    <td>
                          <!-- Button trigger modal -->
                    <div class="container">
                          <div class="row">
                           <div class="col-lg-2">
                            <div class="input-group">
                              <span class="input-group-btn">
                                <button type="button" id="minus" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">-
                                  <span class="glyphicon glyphicon-minus"></span>
                                </button>
                              </span>
                              <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                              <span class="input-group-btn">
                                <button type="button" id="plus" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">+
                                  <span class="glyphicon glyphicon-plus"></span>
                                </button>
                              </span>
                            </div>
                           </div>
                         </div>
                        </div>
                      
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
            </div>
              <!-------------------------forth tab end--------------------------------->



          </div>



          </div>
              
        </div>
      </div>
    </div>
  </div>
  <br>
</div>
<
<br>
<br>

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
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
  $(document).ready(function(){


   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});
</script>
<script src="js/main.js"></script>

</body>
</html>
