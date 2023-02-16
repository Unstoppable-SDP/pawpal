<?php
require_once('sql_connect.php');
$title = "Booking";
error_reporting(E_ERROR | E_PARSE);
$css_file = "<link rel='stylesheet' href='css/Booking.css' />";
include "header.php";
session_start();

error_reporting(E_ERROR | E_PARSE);


$is_user = isset($_SESSION["user_id"]);

if (!$is_user) {
  echo ('
    <SCRIPT LANGUAGE="JavaScript">
    swal({
        title: "Access Denied!",
        text: "Please log in to book a pet sitter for your pet!",
        icon: "error",
        buttons: {
          back: { text: "Go back to Homepage",
            value: "back",
            className:"bg-gray"
            },
          login: {
            text: "Log In",
            value: "login",
            className: "bg-pink",
          }
        },
        dangerMode: true,
      })
      .then((value) => {
        switch (value) {
          case "login":
            window.location.href="Login.php";
            break;
       
          default:
            window.location.href="index.php";
        }
      });
        </script>');
  exit();
} else {

  $idS = $_GET['Id'];
  $Dprice = $_GET['price'];
  $id = $_SESSION["user_id"];

  $idOwner = mysqli_query($con, "SELECT owner_id
        FROM pets p
        where p.owner_id=(Select owner_id
        from pets_owner
        where personal_info='$id'
        )");

  $rowowner = mysqli_fetch_assoc($idOwner);
  $idO = $rowowner['owner_id'];

  $result = mysqli_query($con, "SELECT p.pet_id, p.pet_type
        FROM pets p
        where p.owner_id=(Select owner_id
        from pets_owner
        where owner_id='$idO'
        )");
  $row = mysqli_fetch_assoc($result);
  $idP = $row['pet_id'];
  $type = $row['pet_type'];


  if (isset($_POST['book'])) {

    $TypeCon = mysqli_query($con, "SELECT *
        from  pets_type p
        where p.sitter_id='$idS' and type_name='$type'");

    if (mysqli_num_rows($TypeCon) > 0) {
      $startdate = $_POST['startdate'];
      $enddate = $_POST['enddate'];
      $quantity = $_POST['quantity'];
      //Calculate days
      $from = date_create($startdate);
      $to = date_create($enddate);
      $diff = date_diff($from, $to)->format('%a');
      //Calculate total price
      $total = $diff * $Dprice + ($quantity - 1) * 0.25 * $Dprice;
      //echo $diff;  
      $stmt = $con->prepare("INSERT INTO booking(`pet_id`,`sitter_id`,`start_date`,`end_date`,`quantity`,`total_price`)VALUES (?,?,?,?,?,?)");
      $stmt->bind_param('iissid', $idP, $idS, $startdate, $enddate, $quantity, $total);
      $stmt->execute();
      echo ('<SCRIPT LANGUAGE="JavaScript">
            swal({
                title: "Booking Successfully!",
                icon: "success",
                buttons: {
                  booking: { text: "Check Your Booking",
                    value: "booking",
                    className:"bg-gray"
                    },
                  home: {
                    text: "Home Page",
                    value: "home",
                    className: "bg-pink",
                  }
                },
                dangerMode: true,
              })
              .then((value) => {
                switch (value) {
                  case "booking":
                    window.location.href="profile.php";
                    break;
               
                  default:
                    window.location.href="index.php";
                }
              });
            </SCRIPT>');
    } else {
      echo ('
            <SCRIPT LANGUAGE="JavaScript">
            swal({
                title: "Sorry",
                text: " I can\'t take care of your pet.",
                icon: "error",
                buttons: {
                  sitters: {
                    text: "pet sitter",
                    className: "bg-pink",
                  }
                },
              })
              .then((value) => {
                    window.location.href="pet_sitter.php";
              });
            </SCRIPT>');
    }
  }
}


?>

<div class="flex">
  <div class="container">
    <div class="Booking">
      <img src="img/d_t.png" style=" width: 500px;height: 250px;">
    </div>

    <form method="POST">
      <div class="input-container">
      </div>
      <div class="label">
        <label for="date">Start Date</label>
        <label for="date">End Date</label>
      </div>
      <div class="input">

        <input type="date" id="start-date" required id="date" name="startdate" />
        <input type="date" id="end-date" required id="date" name="enddate" placeholder="End Date" />

      </div>
      <div class="Pet">

        <div class="Pet-select" id="Pet-select"><?php echo $type; ?></div>

        <select required class="Quantity-select" id="Quantity-select" name="quantity">
          <option value="">Quantity</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
          <option value="4">Four</option>
          <option value="5">Five</option>
          <option value="6">Six</option>
        </select>
      </div>
      <div class="price">Total price: <B id="price">-</B></div>
      <div class="method">Payment method: <B>Cash</B></div>
      <input disabled class="L_btn" id="L_btn" type="submit" name="book" value="Book" />
    </form>
  </div>
</div>

<div>
  <script>
    let startDate, endDate, quantity, totalPrice;
    // get the price of sitter in hours
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const price = urlParams.get('price');
    // get the quantity
    document.querySelector("#Quantity-select").addEventListener("change", (e) => {
      quantity = e.target.value;
      setThePrice();
    });
    // get startDate
    document.querySelector("#start-date").addEventListener("change", (e) => {
      startDate = new Date(e.target.value).getTime();
      setThePrice();
    });
    // get endDate
    document.querySelector("#end-date").addEventListener("change", (e) => {
      endDate = new Date(e.target.value).getTime();
      setThePrice();
    });
    const setThePrice = () => {
      if (quantity == null || startDate == null || endDate == null) {
        document.querySelector("#price").innerHTML = "-";
        document.getElementById("L_btn").disabled = true;
      } else {
        const diffInDays = (endDate - startDate) / (1000 * 3600 * 24);
        totalPrice = diffInDays * price + (quantity - 1) * 0.25 * diffInDays;
        if (totalPrice > 0) {
          document.querySelector("#price").innerHTML = totalPrice + " SAR";
          document.getElementById("L_btn").disabled = false;
        } else {
          document.querySelector("#price").innerHTML = "-";
          document.getElementById("L_btn").disabled = true;
        }
      }
    }
  </script>



  <?php
  include "footer.php";
  ?>