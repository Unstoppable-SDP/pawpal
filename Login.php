<?php
require ('sql_connect.php');

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST") {
  $sql = sprintf("SELECT persnal_id FROM personal_info WHERE email = '%s';",$con->real_escape_string($_POST["email"]));
  $result = $con -> query($sql);
  $user = $result -> fetch_assoc();
  if($user == null){
    $is_invalid = true;
  } else{
    $id = $user["persnal_id"];
    $sql = sprintf("SELECT password FROM pets_owner WHERE personal_info = '%s';",$con->real_escape_string($id));
    $result = $con -> query($sql);
    $password = $result -> fetch_assoc();
    if($password  !== null &&  strcmp($password["password"], $_POST["password"]) == 0 ){
      session_start();
      $_SESSION["user_id"] = $id;
      header("Location: index.php");
      exit;
    }else{
      $is_invalid = true;
      // var_dump(strcmp($password["password"], $_POST["password"]) == 0);
      // exit;
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
    <title>Log in</title>
    <link rel="icon" href="img/smallLogo.png" />
    <link rel="stylesheet" href="css/Login.css" />
  </head>

  <body>
    <head>
      <div class="header">
        <div class="header-content">
          <img src="img/Logo.png" />
          <ul class="menu">
            <li><a class="active" href="#">About</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">Reviews</a></li>
          </ul>
          <div class="sign-buttons">
            <button class="button border-button">Sign Up</button>
            <button class="button filled-button">Sign In</button>
          </div>
        </div>
      </div>
    </head>
    <div class="flex">
      <div class="container">
        <div class="user">
          <img src="img/a_t.png" style=" width: 100px;height: 100px;">
        </div>
        <?php 
          if ($is_invalid): ?>
          <span class="error-message"> Incorrect email or password </span>
          <?php endif; ?>
        <form method="POST">
          <div class="input">
            <label for="email"></label>
            <input
              type="email"
              required
              id="email"
              name="email"
              placeholder="Email"
              class="input-field"
            />
          </div>
          <div class="input box">
            <label for="password"></label>
            <input
              type="password"
              required
              id="password"
              name="password"
              placeholder="Password"
              class="input-field"
            />
          </div>
          <input class="L_btn" type="submit" value="Sign in" />
        </form>
        <div class="div">
          <div class="line"></div>
          <div class="signup">
            Don't Have an account? <a href="signUp.html">Sign up</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
