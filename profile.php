<?php

require ('sql_connect.php');


$title = "Profile";
$css_file = "<link rel='stylesheet' href='css\profile.css' />";
include "header.php";


$ID = $_SESSION["user_id"];
$query = "SELECT * FROM `personal_info` WHERE `persnal_id` = '$ID'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

$ownerQueryState = "SELECT * FROM `pets_owner` WHERE `personal_info` = '$ID'";
$ownerQuery = mysqli_query($con, $ownerQueryState);
$ownerRow = mysqli_fetch_array($ownerQuery);

$ownerID = $ownerRow['owner_id'];
$queryPets = "SELECT * FROM `pets` WHERE `owner_id` = '$ownerID'";
$resultPets = mysqli_query($con, $queryPets);
$rowPets = mysqli_fetch_array($resultPets);

$petsID = $rowPets['pet_id'];
$queryBooking = "SELECT * FROM `booking` WHERE `pet_id` = '$petsID'";
$resultBooking = mysqli_query($con, $queryBooking);
$rowBooking ="";

$date = date("Y-m-d");

while ($Booking = mysqli_fetch_assoc($resultBooking))
{
    if ($Booking['start_date'] > $date) {
        $date = $Booking['start_date'];
        $rowBooking = $Booking;
        break;
    }

}

while ($Booking = mysqli_fetch_assoc($resultBooking))
{
    if ($Booking['start_date'] > date("Y-m-d")) {
        if ($Booking['start_date'] < $date) {
            $date = $Booking['start_date'];
            $rowBooking = $Booking;
        }
    }

}


//database insert SQL code
if(isset($_POST['updateuser'])) {
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$birthdate=$_POST['birthdate'];
$password=$_POST['password'];
$city=$_POST['city'];
$street=$_POST['street'];
$housenumber=$_POST['housenumber'];
$type=$_POST['Type'];
$quantity=$_POST['quantity'];
$requirements=$_POST['requirements'];

$changePersonal = "UPDATE `personal_info` 
SET `Fname` = '$fname', 
    `Lname` = '$lname', 
    `Gender` = '$gender', 
    `Birthdate` = '$birthdate', 
    `city` = '$city', 
    `street` = '$street', 
    `hn` = '$housenumber'
where `persnal_id` = '$ID'";
$infoPersonal=mysqli_query($con, $changePersonal);

$changePassword = "UPDATE `pets` 
SET `pet_type` = '$type', 
    `quantity` = '$quantity', 
    `requirements` = '$requirements' 
where `owner_id` = '$ownerID'";
$infoPassword=mysqli_query($con, $changePassword);

$changePets = "UPDATE `pets_owner` 
SET `password` = '$password' 
where `personal_info` = '$ID'";
$infoPets=mysqli_query($con, $changePets);

echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Updated Successfully!.')
window.location.href='profile.php'
</SCRIPT>");

$stmt->close();
$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="img/smallLogo.png" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/home.css" />
</head>

    <body>
        
        <img src = "img/5735078.png" width="273" height="273" class = "profileImg">
        <h4 class = "profiletitle">Profile</h4>
        
        <form method="post"> 
            <h4 class = "title1">Personal Info</h4>
    
       
            <label class = "labelinfo1">First Name</label>
            <input type="text"  value="<?php echo $row['Fname'];?>" class="textboxinfo1" name = "fname">
            <label class="labelinfo2">Last Name</label>
            <input type="text" value="<?php echo $row['Lname'];?>" class = "textboxinfo2" name = "lname">
        
    
        
            <label class = "labelinfo3">Gender</label>
            <input type="text" value="<?php echo $row['Gender'];?>" class = "textboxinfo3" name = "gender">
            <label class = "labelinfo4">Email</label>
            <input type="text" value="<?php echo $row['email'];?>" readonly class = "textboxinfo4" name = "email">
        
    
        
            <label class = "labelinfo5">Birthdate</label>
            <input type="date" value= "<?php echo $row['Birthdate'];?>" class = "textboxinfo5" name = "birthdate">
            <label class = "labelinfo6">Password</label>
            <input type="text" value="<?php echo $ownerRow['password'];?>"  class = "textboxinfo6" name = "password">
    
        
            <label class = "labelinfo7">City</label>
            <input type="text" Value ="<?php echo $row['city'];?>" class = "textboxinfo7" name = "city">
            <label class = "labelinfo8">Street</label>
            <input type="text" value="<?php echo $row['street'];?>" class = "textboxinfo8" name = "street">
        
    
        
            <label class = "labelinfo9">House Number</label>
            <input type="text" value="<?php echo $row['hn'];?>" class = "textboxinfo9" name = "housenumber">

       
    
            <h4 class="title2">Pets</h4>
        
           
            <label class="labelpets1">Type</label>
            <select name="Type" id="Type" class="textboxpets1">
                <option value="Dog"  class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Dog") {
                        ?> selected<?php
                    } ?>>Dog</option>
                <option value="Cat" class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Cat") {
                        ?> selected<?php
                    } ?>>Cat</option>
                <option value="Turtle" class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Turtle") {
                        ?> selected<?php
                    } ?>>Turtle</option>
                <option value="Hamster" class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Hamster") {
                        ?> selected<?php
                    } ?>>Hamster</option>
                <option value="Rabbit" class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Rabbit") {
                        ?> selected<?php
                    } ?>>Rabbit</option>
                <option value="Guinea pig" class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Guinea pig") {
                        ?> selected<?php
                    } ?>>Guinea pig</option>
                <option value="Birds" class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Birds") {
                        ?> selected<?php
                    } ?>>Birds</option>
                <option value="Ferret" class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Ferret") {
                        ?> selected<?php
                    } ?>>Ferret</option>
                <option value="Fish" class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Fish") {
                        ?> selected<?php
                    } ?>>Fish</option>
                <option value="Bearded dragons" class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Bearded dragons") {
                        ?> selected<?php
                    } ?>>Bearded dragons</option>
                <option value="Monkey" class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Monkey") {
                        ?> selected<?php
                    } ?>>Monkey</option>
                <option value="Amphibians" class = "textop" <?php 
                    if ($rowPets['pet_type'] == "Amphibians") {
                        ?> selected<?php
                    } ?>>Amphibians</option>
            </select>
            <label class = "labelpets2">Quantity</label>
            <input type="number" value="<?php echo $rowPets['quantity'];?>"  name="quantity" class="textboxpets2" id="Quantity-select">
            
        
    
        
            <label class = "labelpets3">Requirements</label>
            <textarea type ="text" name = "requirements" rows = "8" class="textboxpets3"><?php echo $rowPets['requirements'];?></textarea>
            
        
    
            <input type="submit" class = "updatebutton" name="updateuser" value="Update User">        
    
            
            <?php
                if ($rowBooking == "") {
            ?>
                    <h4 class = "title4">No Bookings Yet, Choose a Sitter for Your Pets!</h4>
            <?php
                } 
                else {
                    $sitterID = $rowBooking['sitter_id'];
                    $sitterQuery = "SELECT * FROM `pets_sitter` WHERE `sitter_id` = '$sitterID'";
                    $personalSitter = mysqli_query($con, $sitterQuery);
                    $personalSitterArray = mysqli_fetch_array($personalSitter);

                    $personalSitterID = $personalSitterArray['personal_info'];
                    $sitterNameQuery = "SELECT `Fname`, `Lname` FROM `personal_info` WHERE `persnal_id` = '$personalSitterID'";
                    $sitterName = mysqli_query($con, $sitterNameQuery);
                    $sitterNameArray = mysqli_fetch_array($sitterName);
            ?>
                    <h4 class = "title4">Bookings</h4>

    
                    <label class = "labelbooking1">Booking Number</label>
                    <input type="number"  value="<?php echo $rowBooking['booking_id'];?>" readonly class="textboxbooking1" name = "bookingno">
                    <label class="labelbooking2">Pet Quantity</label>
                    <input type="text" value="<?php echo $rowBooking['quantity'];?>" readonly class = "textboxbooking2" name = "petQuant">
    

    
                    <label class = "labelbooking3">Sitter Name</label>
                    <input type="text" value="<?php echo $sitterNameArray['Fname'], ' ', $sitterNameArray['Lname'];?>" readonly class = "textboxbooking3" name = "sittername">
                    <label class = "labelbooking4">Start Date</label>
                    <input type="date" value="<?php echo $rowBooking['start_date'];?>" readonly class = "textboxbooking4" name = "starterdate">


    
                    <label class = "labelbooking5">End Date</label>
                    <input type="date" value="<?php echo $rowBooking['end_date'];?>" readonly class = "textboxbooking5" name = "enddate">
            <?php
                }
            ?>
        </form>

</body>
</html>


