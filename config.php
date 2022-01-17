<?php
$config=array(
    'DB_HOST'=>'localhost',
    'DB_USERNAME'=>'root',
    'DB_PASSWORD'=>'',
    'DB_DATABASE'=>'ark'
    );
$host=$config['DB_HOST'];
$dbname=$config['DB_DATABASE'];
$username=$config['DB_USERNAME'];
$password=$config['DB_PASSWORD'];
$con = mysqli_connect($host, $username, $password);

if (!$con) {
    die('Connection Failed'.mysql_error());
}

?>
 

 
