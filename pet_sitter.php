<?php

require_once('sql_connect.php');
$result1 = mysqli_query($con, "SELECT pets_sitter.sitter_id, personal_info.Fname,personal_info.Lname, personal_info.email, personal_info.Gender, personal_info.Age, 
        personal_info.city, pets_sitter.image, pets_sitter.daily_price,pets_sitter.rate
        FROM pets_sitter INNER JOIN personal_info ON pets_sitter.sitter_id=personal_info.persnal_id");
?>

<?php
$title = "Pet Sitter";
$css_file = "<link rel='stylesheet' href='css/Sitter.css' />";
include "header.php";
?>

<div class="pet-stters-continer">
  <div class="page-head">
    <h1 class="topTitle">Pet Sitters</h1>
    <form class="search" action="" method="GET">
      <input type="searchs" name="search" placeholder="Search" />
      <button class="searchButton">Search</button>
    </form>
  </div>
  <div class="sitters">
    <?php
    if (isset($_GET['search'])) {
      $filtervalues = $_GET['search'];
      $query = "SELECT pets_sitter.sitter_id, personal_info.Fname,personal_info.Lname, personal_info.email, personal_info.Gender, personal_info.Age, 
            personal_info.city, pets_sitter.image, pets_sitter.daily_price,pets_sitter.rate
            FROM pets_sitter INNER JOIN personal_info ON pets_sitter.sitter_id=personal_info.persnal_id
            WHERE CONCAT(personal_info.Fname,personal_info.Lname,personal_info.city) LIKE '%$filtervalues%'";
      $query_run = mysqli_query($con, $query);
      if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $items) {
          include "card.php";
        }
      } else {
        while ($items = mysqli_fetch_assoc($result1)) {
          include "card.php";
        }
      }
    } else {
      while ($items = mysqli_fetch_assoc($result1)) {
        include "card.php";
      }
    }
    ?>
  </div>
</div>
<?php
$script = "";
include "footer.php";
?>