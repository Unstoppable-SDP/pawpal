
<?php
$host="localhost";
$port="3308";
$user="root";
$password="";
$dbname="pawpal";

$con = new mysqli($host, $user, $password, $dbname,$port)
	or die ('Could not connect to the database server' . mysqli_connect_error());
 //echo'successfully connect';
?>