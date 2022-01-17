<?php
include('config.php');
try {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $db_select = mysqli_select_db($con, $dbname);
    if (!$db_select) {
        die("Database selection failed: " . mysqli_error($con));
    }

    if ($stmt = $con->prepare("INSERT INTO clientmessage VALUES ('$name', '$email', '$message' )")) {
        $stmt->execute();
     } else {
        echo 'Couldn\'t send your message, please try again';
    }

 } catch (PDOException $e) {
    echo "Error:".$e->getMessage();
}
