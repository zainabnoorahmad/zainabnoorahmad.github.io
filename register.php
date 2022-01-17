 
<?php
 
 include('config.php');
 $db_select = mysqli_select_db($con, $dbname);
 if (!$db_select) {
     die("Database selection failed: " . mysqli_error($con));
 }
 $name=$_POST['name'];
 $email=$_POST['email'];
 $password = $_POST['password'];


  if ($stmt = $con->prepare("SELECT `email` FROM `clientregister` where `email` = ?")) {
 $stmt->bind_param('s', $email);
 $stmt->execute();
 $stmt->store_result();
 if ($stmt->num_rows > 0) {
     echo "Email already exist, please choose another!";
  
    
  } else {
     if ($stmt = $con->prepare("INSERT INTO clientregister VALUES ('$name', '$email','$password')")  ) {

             $stmt->execute();
             echo "You have successfully registered.";
             $stmt2 = $con->prepare("INSERT INTO clientimage(client_email) VALUES ('$email')");
             $stmt2->execute();


 
     } else {
         echo "Could not prepare statement!";
     }  
 }
 }
 
     
 
  ?>
