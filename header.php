<?php
    session_start();
    $is_user = isset($_SESSION["user_id"]);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" href="img/smallLogo.png" />
    <link rel="stylesheet" href="css/home.css" />
    <title><?php echo $title; ?></title>
    <?php echo $css_file; ?>
  </head>
  <body>
    <!-- header -->
    <head>
      <div class="header">
        <div class="header-content">
            <a href="/pawpal">
            <img src="img/Logo.png" />
            </a>
          <ul class="menu">
            <li><a class="active" href="/pawpal/#about_section">About</a></li>
            <li><a href="/pawpal/#service_section">Service</a></li>
            <li><a href="/pawpal/#review_section">Reviews</a></li>
          </ul>
          <div class="sign-buttons">
            <?php if(!$is_user): ?>
            <a class="button border-button" href="signUp.php">Sign Up</a>
            <a class="button filled-button" href="Login.php">Sign In</a>
            <?php else: ?>
              <a class="logout" href="Logout.php">Log out</a>
            <a href="profile.php">
              <img class="profile-image" src="img/profile_image.png" />
            </a>
       
            <?php endif; ?>
          </div>
        </div>
      </div>
    </head>