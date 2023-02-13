<?php
require ('sql_connect.php');

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$birthdate=$_POST['birthdate'];
$password=$_POST['password'];
$city=$_POST['city'];
$street=$_POST['street'];
$housenumber=$_POST['housenumber'];
$petname=$_POST['petname'];
$type=$_POST['type'];
$petage=$_POST['petage'];
$petgender=$_POST['petgender'];
$requirements=$_POST['requirements'];
// database insert SQL code

if(isset( $_POST['createuser'])) {
$sql= mysqli_query($con,"SELECT * FROM `personal_info` WHERE`email`='$email' ");
if(mysqli_num_rows($sql) > 0){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('The Email you have entered is already registered, Try another...')
window.location.href='signUp.html'
</SCRIPT>");
}else{
$stmt=$con->prepare("INSERT INTO personal_info (`email`,`Fname`,`Lname`,`Gender`,`Birthdate`,`city`,`street`,`hn`) VALUES (?,?,?,?,?,?,?,?)");
$stmt-> bind_param('sssssssi',$email,$fname,$lname,$gender,$birthdate,$city,$street,$housenumber);
$stmt->execute();

$stmt=$con->prepare("INSERT INTO pets_owner(`password`) VALUES (?)");
$stmt-> bind_param('s',$password);
$stmt->execute();

$info=mysqli_query($con,"UPDATE `pets_owner` 
SET `personal_info` = (SELECT `persnal_id` 
					FROM  `personal_info` 
					ORDER BY `persnal_id` DESC LIMIT 1)
where `owner_id` = (SELECT  `owner_id`
					FROM  `pets_owner` 
					ORDER BY `owner_id` DESC LIMIT 1)");

$stmt=$con->prepare("INSERT INTO pets(`pet_name`,`pet_type`,`pet_age`,`pet_gender`,`requirements`) VALUES (?,?,?,?,?)");
$stmt-> bind_param('ssiss',$petname,$type,$petage,$petgender,$requirements);
$stmt->execute();

$info=mysqli_query($con,"UPDATE `pets` 
SET `owner_id` = (SELECT `owner_id` 
					FROM  `pets_owner` 
					ORDER BY `owner_id` DESC LIMIT 1)
where `pet_id` = (SELECT  `pet_id`
					FROM  `pets` 
					ORDER BY `pet_id` DESC LIMIT 1)");

echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Registration Successfully!.')
window.location.href='pet_sitter.html'
</SCRIPT>");

$stmt->close();
$con->close();

}
}



?>



 
