<?php

require ('sql_connect.php');
include "header.php";
if(isset( $_POST['createuser'])) {
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$birthdate=$_POST['birthdate'];
$password=$_POST['password'];
$city=$_POST['city'];
$street=$_POST['street'];
$housenumber=$_POST['housenumber'];
$repwd=$_POST['repwd'];
$type=$_POST['type'];
$quantity=$_POST['quantity'];
$requirements=$_POST['requirements'];
// database insert SQL code


	if ($password != $repwd)
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Password mismatch: Please try again')
	window.location.href='signUp.php'
	</SCRIPT>");

	
	}else{
$sql= mysqli_query($con,"SELECT * FROM `personal_info` WHERE`email`='$email' ");
if(mysqli_num_rows($sql) > 0){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('The Email you have entered is already registered: Please try another')
window.location.href='signUp.php'
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

$stmt=$con->prepare("INSERT INTO pets(`pet_type`,`quantity`,`requirements`) VALUES (?,?,?)");
$stmt-> bind_param('sis',$type,$quantity,$requirements);
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
window.location.href='Login.php'
</SCRIPT>");

$stmt->close();
$con->close();

}
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="icon" href="img/smallLogo.png" />
    <link
      href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/signUp.css" />
  </head>

  <body>
    
    <h4 class="title1">Personal Info</h4>

    <form method="post">

        <input type="text" placeholder="FName" name="fname" class="textbox1" required>
        <input type="text" placeholder="LName" name="lname" class = "textbox2" required>
    
    
        <select name="gender" required id="gender" class="textbox3">
          <option value="Female" selected class = "textop">Female</option>
           <option value="Male" class = "textop">Male</option>
      </select>
        <input type="email" placeholder="Email" name="email" class = "textbox4" required>
    

    
        <input type="date" placeholder="Birthdate" name="birthdate" class = "textbox5" required>
        <input type="password" placeholder="Password" name="password" class = "textbox6" required>
    

    
        <input type="text" placeholder="City" name="city" class = "textbox7" required>
        <input type="password" placeholder="Repeat Password" name="repwd" class = "textbox8" required>

        <input type="text" placeholder="Street" name="street" class = "textbox10" required>
    

    
        <input type="text" placeholder="House Number" name="housenumber" class = "textbox9" required>
    

        <h4 class="title2">Pets</h4>
    
    
        <label for="Type"></label>
        <select name="type" required id="Type" class="textboxforPets1">
          <option value="">Please choose a pet</option>  
          <option value="Dog"  class = "textop">Dog</option>
            <option value="Cat" class = "textop">Cat</option>
            <option value="Turtle" class = "textop">Turtle</option>
            <option value="Hamster" class = "textop">Hamster</option>
            <option value="Rabbit" class = "textop">Rabbit</option>
            <option value="Guinea pig" class = "textop">Guinea pig</option>
            <option value="Birds" class = "textop">Birds</option>
            <option value="Ferret" class = "textop">Ferret</option>
            <option value="Fish" class = "textop">Fish</option>
            <option value="Bearded dragons" class = "textop">Bearded dragons</option>
            <option value="Monkey" class = "textop">Monkey</option>
            <option value="Amphibians" class = "textop">Amphibians</option>
        </select>

        <select required name="quantity" class="textboxforPets2" id="Quantity-select" >
          <option value="">Quantity</option>
          <option value="1" >One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
          <option value="4">Four</option>
          <option value="5">Five</option>
          <option value="6">Six</option>
      </select>
    
        <textarea type ="text" placeholder="Requirements" name="requirements" class="textboxforPets3"></textarea>
           
        <input type="submit" class = "createButton" name="createuser" value="Create User">
    </form>
</body>

</html>


 
