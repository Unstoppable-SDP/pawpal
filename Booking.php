<?php 
        require_once ('sql_connect.php');
        include "header.php";
        
        $is_user = isset($_SESSION["user_id"]);
        
        
        if (!$is_user){
            echo ("<SCRIPT LANGUAGE='JavaScript'>
	        window.alert('Please log in to book a pet sitter for your pet!')
        	window.location.href='Login.php'
	        </SCRIPT>");
            exit();
        }else{
        
        $id=$_SESSION["user_id"];
        $idOwner=mysqli_query($con,"SELECT owner_id
        FROM pets p
        where p.owner_id=(Select owner_id
        from pets_owner
        where personal_info='$id'
        )");
        $rowowner=mysqli_fetch_assoc($idOwner);
        $idO=$rowowner['owner_id'];
        $result = mysqli_query($con,"SELECT p.pet_id, p.pet_type
        FROM pets p
        where p.owner_id=(Select owner_id
        from pets_owner
        where owner_id='$idO'
        )");
        $row=mysqli_fetch_assoc($result);
        if(isset( $_POST['book'])) {
            $startdate=$_POST['startdate'];
            $enddate=$_POST['enddate'];
            $quantity=$_POST['quantity'];
            //Calculate days
            $from=date_create($startdate);
            $to=date_create($enddate);
            $diff=date_diff($from,$to)->format('%a');
            //Calculate total price
            //$total=$diff
            //echo $diff;  
            // $stmt=$con->prepare("INSERT INTO booking(`pet_id`,`sitter_id`,`start_date`,`end_date`,`quantity`,`total_price`)VALUES (?,?,?,?,?,?)");
            // $stmt-> bind_param('iissid',$,$,$startdate,$enddate,$quantity,$);
            // $stmt->execute();

        }}
       
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking</title>
    <link rel="icon" href="img/smallLogo.png" />
    <link rel="stylesheet" href="css/Booking.css" />
</head>

<body >
    <div class="flex">
        <div class="container">
            <div class="Booking">
                <img src="img/d_t.png" style=" width: 500px;height: 250px;">
            </div>
            
            <form method="POST">
                <div class="input-container">
                </div>
                    <div class="label">
                    <label for ="date">Start Date</label>
                    <label for="date">End Date</label>
                    </div>
                    <div class="input">
                        
                        <input type="date" required id="date" name="startdate" />
                        <input type="date" required id="date" name="enddate" placeholder="End Date"/>
                    
                </div>
                <div class="Pet">
                    
                    <div class="Pet-select" id="Pet-select" ><?php echo $row['pet_type']; ?></div>
                        
                    <select required class="Quantity-select" id="Quantity-select" name="quantity">
                        <option value="">Quantity</option>
                        <option value="1" >One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                        <option value="6">Six</option>
                    </select>
                </div>
                <div class="price">Total price: <B >1000 SAR</B></div>
                <div class="method">Payment method: <B >Cash</B></div>
                <input class="L_btn" type="submit" name="book" value="Book" />
            </form >
        </div>
    </div>
    
</body>

</html>
