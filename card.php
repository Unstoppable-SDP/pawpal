  <div class="card">
      <div class="three-col">
          <div>
              <img class="sitter-image" src=<?php echo $items['image'] ?> />
          </div>
          <div class="info">
              <div class="text"><?php echo $items['Fname'], " ", $items['Lname']; ?></div>
              <div class="text"><?php echo $items['email']; ?></div>
              <div class="text"><?php echo $items['Gender']; ?></div>
              <div class="text"><?php echo $items['Age']; ?></div>
              <div class="text"><?php echo $items['city']; ?></div>
          </div>
          <div class="price-booking">
              <div class="price-and-ratting">
                  <div class="rating">
                      <?php
                        for ($x = 0; $x < $items['rate']; $x++) {
                            echo "<span class='fa fa-star checked fa-2x'></span>";
                        } ?>
                      <?php
                        for ($x = 0; $x < 5 - $items['rate']; $x++) {
                            echo "<span class='fa fa-star unchecked fa-2x'></span>";
                        } ?>
                  </div>
                  <div class="text price">Daily Price:</div>
                  <div class="priceout">
                      <div class="priceNo">SAR <?php echo $items['daily_price']; ?></div>
                  </div>
              </div>
              <div class="book">
                  <button class="bButton" onclick="window.location.href='Booking.php?price=<?php echo $items['daily_price']; ?>&Id=<?php echo $items['sitter_id']; ?>';">Book</button>
              </div>
          </div>
      </div>

      <div class="petTypeBox">
          <?php
            $result2 = mysqli_query($con, "SELECT type_name
                                  FROM pets_type 
                                  WHERE sitter_id =" . $items['sitter_id']);
            while ($row2 = mysqli_fetch_assoc($result2)) {
            ?>
              <div><?php echo $row2['type_name']; ?></div>
          <?php
            }
            ?>
      </div>

  </div>