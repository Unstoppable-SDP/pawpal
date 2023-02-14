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

    <link rel="icon" href="img/smallLogo.png" />
    <link rel="stylesheet" href="css/home.css" />
    <title>PawPal:A Simple Way to Tend Pets</title>
  </head>
  <body>
    <!-- header -->
    <head>
      <div class="header">
        <div class="header-content">
          <img src="img/Logo.png" />
          <ul class="menu">
            <li><a class="active" href="#about_section">About</a></li>
            <li><a href="#service_section">Service</a></li>
            <li><a href="#review_section">Reviews</a></li>
          </ul>
          <div class="sign-buttons">
            <?php if(!$is_user): ?>
            <a class="button border-button" href="signUp.html">Sign Up</a>
            <a class="button filled-button" href="Login.php">Sign In</a>
            <?php else: ?>
              <a class="logout" href="Logout.php">Log out</a>
            <a href="profile.html">
              <img class="profile-image" src="img/profile_image.png" />
            </a>
       
            <?php endif; ?>
          </div>
        </div>
      </div>
    </head>
    <!-- Hero Section -->
    <div id="hero_section" class="hero-section">
      <div class="hero-section-content">
        <div class="small-title">
          <img src="img/arrow.png" />
          <h4>Available in KSA</h4>
        </div>
        <div class="hero-title">
          <h1>
            Pawpal <br />
            <span>A Simple Way</span> <br />
            to Tend Pets
          </h1>
        </div>
        <a class="button promo-button" href="pet_sitter.html">
          Check sitters
        </a>
      </div>
    </div>
    <!-- About us -->
    <div id="about_section" class="about-us">
      <div class="about-container">
        <h1 class="home-title about-title">About US</h1>
        <p>
          There's nothing worse than getting your hopes up, then not being able
          to find your pet sitter, groomer and walker. That won't happen on
          PetBacker. From big cities to small towns, we've got pet sitters and
          dog walkers covering every country in the world.
        </p>
      </div>
    </div>
    <!-- Service -->

    <div id="service_section" class="service_secttion">
      <h1 class="home-title service_title">Services</h1>
      <div class="services-boxes">
        <div class="box sitter-box">
          <img src="img/sitter_icon.png" class="icon" />
          <h4 class="box_title">Pets Sitter</h4>
          <p>
            Your pets stay overnight in your sitter’s home. They’ll be treated
            like part of the family in a comfortable environment.
          </p>
          <a class="button explore-button" href="pet_sitter.html">Explore</a>
        </div>
        <div class="services-boxes">
          <div class="box walking-box">
            <img src="img/dog_walking_icon.png" class="icon" />
            <h4 class="box_title">Dog Walking</h4>
            <p>
              Your dog gets a walk around your neighborhood. Perfect for busy
              days and dogs with extra energy to burn.
            </p>
            <a class="soon-button">Soon</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Review -->
    <div id="review_section" class="review-section">
      <h1 class="home-title review-title">Reviews</h1>
      <div class="review-container">
        <img class="reviewer-image" src="img/reviewer-image.png" />
        <div class="review-text">
          <h4 class="customer-review">Customer Reviews</h4>
          <div class="review-body">
            <p>
              As we continue to push for better regulation in the Australian pet
              food industry it can be hard to trust many pet food brands. Our
              2021 Best Cat Food in Australia list will offer you a great
              starting point in deciding what to feed your cat.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer>
      <img class="footer-logo" src="img/logo-white.png" />
      <div class="menu-footer">
        <ul class="menu">
          <li><a href="#about_section">About</a></li>
          <li><a href="#service_section">Service</a></li>
          <li><a href="#review_section">Reviews</a></li>
        </ul>
      </div>
    </footer>
  </body>
</html>
