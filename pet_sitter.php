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
          <form class="search">
            <input type="searchs" placeholder="Search" />
            <button class="searchButton">Search</button>
          </form>
          <div class="filterContainer">
            <div class="select-btn">
              <span class="btn-text">Filter</span>
              <span class="arrow-dwn">
                <i class="fa-solid fa-chevron-down"></i>
              </span>
            </div>
            <ul class="list-items">
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Cat</span>
              </li>
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Dog</span>
              </li>
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Turtle</span>
              </li>
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Hamster</span>
              </li>
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Rabbit</span>
              </li>
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Guinea pig</span>
              </li>
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Birds</span>
              </li>
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Ferret</span>
              </li>
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Fish</span>
              </li>
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Bearded dragon</span>
              </li>
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Monkey</span>
              </li>
              <li class="item">
                <span class="checkbox">
                  <i class="fa-solid fa-check check-icon"></i>
                </span>
                <span class="item-text">Amphibians</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="sitters">
        <?php 
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
                        <form class="book">
                            <button class="bButton" type="submit">Book</button>
                        </form>
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
        ?>
 
      </div>
    </div>
    <script src="js/scriptFilter.js"></script>
  </body>
</html>







