<?php 
        
        require_once ('sql_connect.php');
        $result1 = mysqli_query($con,"SELECT pets_sitter.sitter_id, personal_info.Fname,personal_info.Lname, personal_info.email, personal_info.Gender, personal_info.Age, 
        personal_info.city, pets_sitter.image, pets_sitter.daily_price,pets_sitter.rate
        FROM pets_sitter INNER JOIN personal_info ON pets_sitter.sitter_id=personal_info.persnal_id");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pet Sitter</title>
    <link rel="icon" href="img/smallLogo.png" />
    <link rel="stylesheet" href="css/Sitter.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
  </head>
  <body>
    <div class="pet-stters-continer">
      <div class="page-head">
        <h1 class="topTitle">Pet Sitters</h1>
        <div class="selectors">
          <form class="search" action="" method="GET">
              <input type="searchs" name="search" placeholder="Search" />
              <button class="searchButton">Search</button>
          </form>

      </div>
      <div class="sitters">

          <?php
            if(isset($_GET['search'])){
            $filtervalues = $_GET['search'];
            $query="SELECT pets_sitter.sitter_id, personal_info.Fname,personal_info.Lname, personal_info.email, personal_info.Gender, personal_info.Age, 
            personal_info.city, pets_sitter.image, pets_sitter.daily_price,pets_sitter.rate
            FROM pets_sitter INNER JOIN personal_info ON pets_sitter.sitter_id=personal_info.persnal_id
            WHERE CONCAT(personal_info.Fname,personal_info.Lname,personal_info.city) LIKE '%$filtervalues%'";
            $query_run = mysqli_query($con,$query);

            if(mysqli_num_rows($query_run)>0)
                    {
                      foreach($query_run as $items)
                      {
                          ?>
                          <div class="card">
                              <div class="three-col">
                                <div class="img">
                                  <?php echo "<img src=". $items['image'] . "/>"; ?>
                                </div>
                                <div class="info">
                                  <div class="text"><?php echo $items['Fname']," " ,$items['Lname']; ?></div>
                                  <div class="text"><?php echo $items['email']; ?></div>
                                  <div class="text"><?php echo $items['Gender']; ?></div>
                                  <div class="text"><?php echo $items['Age']; ?></div>
                                  <div class="text"><?php echo $items['city']; ?></div>
                                </div>
                                <div class="price-booking">
                                  <div class="price-and-ratting">
                                    <div class="rating">
                                        <?php 
                                          for ($x=0;$x< $items['rate'];$x++){
                                            echo "<span class='fa fa-star checked fa-2x'></span>";}?> 
                                        <?php
                                          for ($x=0;$x< 5-$items['rate'];$x++){
                                          echo "<span class='fa fa-star unchecked fa-2x'></span>";}?>
                                    </div>
                                    <div class="text price">Daily Price:</div>
                                    <div class="priceout">
                                      <div class="priceNo">SAR <?php echo $items['daily_price'];?></div>
                                    </div>
                                  </div>
                                  <div class="book" >
                                      <button class="bButton" onclick="window.location.href='Booking.php?price=<?php echo $items['daily_price']; ?>&Id=<?php echo $items['sitter_id']; ?>';">Book</button>
                                      </div>
                                </div>
                              </div>

                              <div class="petTypeBox">
                                <?php 
                                  $result2 = mysqli_query($con,"SELECT type_name
                                  FROM pets_type 
                                  WHERE sitter_id =". $items['sitter_id']);
                                  while($row2=mysqli_fetch_assoc($result2))
                                  {
                                    ?>
                                      <div><?php echo $row2['type_name']; ?></div>
                                    <?php
                                  }
                                ?>
                              </div>

                            </div>

                          <?php

                      }

                    }
                    
             else{
                while($row=mysqli_fetch_assoc($result1))
                 {
                   ?>
                    
                     <div class="card">
                      <div class="three-col">
                       <div class="img">
                          <?php echo "<img src=". $row['image'] . "/>"; ?>
                        </div>
                                    <div class="info">
                                      <div class="text"><?php echo $row['Fname']," " ,$row['Lname']; ?></div>
                                      <div class="text"><?php echo $row['email']; ?></div>
                                      <div class="text"><?php echo $row['Gender']; ?></div>
                                      <div class="text"><?php echo $row['Age']; ?></div>
                                      <div class="text"><?php echo $row['city']; ?></div>
                                    </div>
                                    <div class="price-booking">
                                      <div class="price-and-ratting">
                                        <div class="rating">
                                            <?php 
                                              for ($x=0;$x< $row['rate'];$x++){
                                                echo "<span class='fa fa-star checked fa-2x'></span>";}?> 
                                            <?php
                                              for ($x=0;$x< 5-$row['rate'];$x++){
                                              echo "<span class='fa fa-star unchecked fa-2x'></span>";}?>
                                        </div>
                                        <div class="text price">Daily Price:</div>
                                        <div class="priceout">
                                          <div class="priceNo">SAR <?php echo $row['daily_price']; ?></div>
                                        </div>
                                      </div>
                                      <div class="book" >
                                      <button class="bButton" onclick="window.location.href='Booking.php?price=<?php echo $row['daily_price']; ?>&Id=<?php echo $row['sitter_id']; ?>';">Book</button>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="petTypeBox">
                                    <?php 
                                    $result2 = mysqli_query($con,"SELECT type_name
                                    FROM pets_type 
                                    WHERE sitter_id =". $row['sitter_id']);
                                    while($row2=mysqli_fetch_assoc($result2))
                                    {
                                    ?>
                                      <div><?php echo $row2['type_name']; ?></div>
                                    <?php
                                    }
                                    ?>
                                  </div>

                                </div>
                                <?php
                  }
                }
              }
              else{


              while($row=mysqli_fetch_assoc($result1))
                 {
                   ?>
                    
                     <div class="card">
                      <div class="three-col">
                       <div class="img">
                          <?php echo "<img src=". $row['image'] . "/>"; ?>
                        </div>
                                    <div class="info">
                                      <div class="text"><?php echo $row['Fname']," " ,$row['Lname']; ?></div>
                                      <div class="text"><?php echo $row['email']; ?></div>
                                      <div class="text"><?php echo $row['Gender']; ?></div>
                                      <div class="text"><?php echo $row['Age']; ?></div>
                                      <div class="text"><?php echo $row['city']; ?></div>
                                    </div>
                                    <div class="price-booking">
                                      <div class="price-and-ratting">
                                        <div class="rating">
                                            <?php 
                                              for ($x=0;$x< $row['rate'];$x++){
                                                echo "<span class='fa fa-star checked fa-2x'></span>";}?> 
                                            <?php
                                              for ($x=0;$x< 5-$row['rate'];$x++){
                                              echo "<span class='fa fa-star unchecked fa-2x'></span>";}?>
                                        </div>
                                        <div class="text price">Daily Price:</div>
                                        <div class="priceout">
                                          <div class="priceNo">SAR <?php echo $row['daily_price']; ?></div>
                                        </div>
                                      </div>
                                      <div class="book" >
                                      <button class="bButton" onclick="window.location.href='Booking.php?price=<?php echo $row['daily_price']; ?>&Id=<?php echo $row['sitter_id']; ?>';">Book</button>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="petTypeBox">
                                    <?php 
                                    $result2 = mysqli_query($con,"SELECT type_name
                                    FROM pets_type 
                                    WHERE sitter_id =". $row['sitter_id']);
                                    while($row2=mysqli_fetch_assoc($result2))
                                    {
                                    ?>
                                      <div><?php echo $row2['type_name']; ?></div>
                                    <?php
                                    }
                                    ?>
                                  </div>

                                </div>
                                <?php
                  }}
          ?>
      </div>
    </div>
    <script src="js/scriptFilter.js"></script>
  </body>
</html>







