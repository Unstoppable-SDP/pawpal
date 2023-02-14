<?php
  $title = "PawPal:A Simple Way to Tend Pets"; 
  $css_file = " ";                  
  include "header.php";                 
?>
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
        <a class="button promo-button" href="pet_sitter.php">
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
          <a class="button explore-button" href="pet_sitter.php">Explore</a>
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
    <?php
      $script = "";
      include "footer.php";           
      ?>