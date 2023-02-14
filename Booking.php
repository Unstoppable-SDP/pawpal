<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking</title>
    <link rel="icon" href="img/smallLogo.png" />
    <link rel="stylesheet" href="css/Booking.css" />
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

<body >
    <head>
        <div class="header">
          <div class="header-content">
            <img src="img/Logo.png" />
            <ul class="menu">
              <li><a class="active" href="#">About</a></li>
              <li><a href="#">Service</a></li>
              <li><a href="#">Reviews</a></li>
            </ul>
            
          </div>
        </div>
      </head>
    <div class="flex">
        <div class="container">
            <div class="Booking">
                <img src="img/d_t.png" style=" width: 500px;height: 250px;">
            </div>
            <div class="Avatar">
                <a href="profile.html"><img src="img/5735078.png" style="width:60px;height:60px;"></a>
            </div>
            <form>
                <div class="input-container">
                    <div class="input">
                        <label for ="date">Start Date</label>
                        <input type="date" required id="date" name="date" />
                    </div>
                    <div class="input box">
                        <label for="date">End Date</label>
                        <input type="date" required id="date" name="date" placeholder="End Date"/>
                    </div>
                </div>
                <div class="Pet">
                    <select required class="Pet-select" id="Pet-select" >
                        <option value="">Please choose a pet</option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Turtle">Turtle</option>
                        <option value="Hamster">Hamster</option>
                        <option value="Rabbit">Rabbit</option>
                        <option value="Guinea pig">Guinea pig</option>
                        <option value="Birds">Birds</option>
                        <option value="Ferret"> Ferret</option>
                        <option value="Fish">Fish</option>
                        <option value="Bearded dragons">Bearded dragons</option>
                        <option value="Monkey">Monkey</option>
                        <option value="Amphibians">Amphibians</option>
                    </select>
                    <select required class="Quantity-select" id="Quantity-select" >
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
                <input class="L_btn" type="submit" value="Book" />
            </form method="get">
        </div>
    </div>
    
</body>

</html>
