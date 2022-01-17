 
<?php
 
 session_start();

 include('config.php');
 $db_select = mysqli_select_db($con, $dbname);
 if (!$db_select) {
     die("Database selection failed: " . mysqli_error($con));
 }

 $email=$_POST['email'];
 $password = $_POST['password'];
 
 //session variables
 //$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] =  $email;
 
$sql= "SELECT * FROM clientregister WHERE `email`= '$email' AND `password` = '$password' ";
$result = mysqli_query($con,$sql);
$check = mysqli_fetch_array($result);
if(isset($check)){
echo($_SESSION['email']);

//echo 'success';

}else{
echo 'failure';
}


  
     
 
  ?>
