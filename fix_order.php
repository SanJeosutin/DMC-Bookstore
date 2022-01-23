<?php include "includes/header.inc" ?>
<body>
  <?php include "includes/menu.inc" ?>
  <script src="scripts/part2.js"></script>
    <section class="content">
        <h1>Fill out the form to complete your order</h1>
        <!--|  http://mercury.swin.edu.au/it000000/formtest.php  |-->
        <p class="warning">Please fix the following error.</p>
        <form id= "enqForm" method="post" action="process_order.php" novalidate>
        <?php
          if(!isset($_GET["error"])){
            header("location:enquire.php");
            exit();
          }
          echo "
          <fieldset> 
            <legend>Please fix the following</legend>
              <nav class='alignElement'>
                ".$_GET["error"]."
              </nav>
          </fieldset>
          ";
          require("functions.php");
          session_start();
          if(isset($_SESSION['firstName'])){
            $firstName = $_SESSION['firstName'];
          }else{
            $firstName = "";
          }
          if(isset($_SESSION['lastName'])){
            $lastName = $_SESSION['lastName'];
          }else{
            $lastName = "";
          }

          if(isset($_SESSION['userAddress'])){
            $userAddress = $_SESSION['userAddress'];
          }else{
            $userAddress = "";
          }
          if(isset($_SESSION['userSuburb'])){
            $userSuburb = $_SESSION['userSuburb'];
          }else{
            $userSuburb = "";
          }
          if(isset($_SESSION['userState'])){
            $userState = $_SESSION['userState'];
          }else{
            $userState = "";
          }
          if(isset($_SESSION['userPostcode'])){
            $userPostcode = $_SESSION['userPostcode'];
          }else{
            $userPostcode = "";
          }

          if(isset($_SESSION['userPhone'])){
            $userPhone = $_SESSION['userPhone'];
          }else{
            $userPhone = "";
          }
          
          if(isset($_SESSION['userEmail'])){
            $userEmail = $_SESSION['userEmail'];
          }else{
            $userEmail = "";
          }

          if(isset($_SESSION['userComments'])){
            $userComments = $_SESSION['userComments'];
          }else{
            $userComments = "";
          }
          $items = get_array_keyVal($_SESSION['items']);
        ?>
          <Fieldset>
            <legend>Personal Details</legend>
            <nav class="alignElement">
              <p>
                <label for="fName">First Name:</label>
                <input type="text" name="firstName" id="fName" value="<?php echo $firstName; ?>" required>
              </p>
              <p>
                <label for="lName">Last Name:</label>
                <input type="text" name="lastName" id="lName" value="<?php echo $lastName; ?>" required>
              </p>
              <p>
                <label for="uEmail">Email:</label>
                <input type="email" name="userEmail" id="uEmail" value="<?php echo $userEmail; ?>" required>
              </p>
            </nav>
          </Fieldset>
          <fieldset>
            <legend>Address</legend>
            <nav class="alignElement">
              <p>
                <label for="uAddress">Address:</label>
                <input type="text" name="userAddress" id="uAddress" value="<?php echo $userAddress; ?>" required>
              </p>
              <p>
                <label for="uSuburb">Suburb:</label>
                <input type="text" name="userSuburb" id="uSuburb" value="<?php echo $userSuburb; ?>" required>
              </p>
              <p>
                <label for="uState">State:</label>
                <select name="userState" id="uState" required>
                  <option value="" >Select State</option>
                  <option value="Victoria" <?php if($userState == "Victoria") echo "selected"?> >VIC</option>
                  <option value="New South Wales" <?php if($userState == "New South Wales") echo "selected"?> >NSW</option>
                  <option value="Queensland" <?php if($userState == "Queensland") echo "selected"?> >QLD</option>
                  <option value="Northern Territory" <?php if($userState == "Northern Territory") echo "selected"?> >NT</option>
                  <option value="Western Australia" <?php if($userState == "Western Australia") echo "selected"?> >WA</option>
                  <option value="South Australia" <?php if($userState == "South Australia") echo "selected"?> >SA</option>
                  <option value="Tasmania" <?php if($userState == "Tasmania") echo "selected"?> >TAS</option>
                  <option value="Australian Capital Territory" <?php if($userState == "Australian Capital Territory") echo "selected"?> >ACT</option>
                </select>
              </p>
              <p>
                <label for="uPostcode">Postcode:</label>
                <!--Use js for better result checking-->
                <input type="text" name="userPostcode" id="uPostcode" value="<?php echo $userPostcode; ?>" required>
              </p>
            </nav>
          </fieldset>
          <fieldset>
            <legend>Contact Details</legend>
            <nav class="alignElement">
              <p>
                <label for="uPhone">Phone:</label>
                <input type="text" name="userPhone" id="uPhone" placeholder="0412 345 678" value="<?php echo $userPhone; ?>" required>
              </p>
              <p><strong>Preferred Contact: </strong><br>
                <input type="radio" id="email" name="prefContact" value="Email" <?php if($_SESSION['userPrefContact'] == "Email")echo "checked"; ?>>
                <label for="email"><em>Email</em></label>
                <input type="radio" id="post" name="prefContact" value="Post" <?php if($_SESSION['userPrefContact'] == "Post")echo "checked"; ?>>
                <label for="post"><em>Post</em></label>
                <input type="radio" id="phone" name="prefContact" value="Phone" <?php if($_SESSION['userPrefContact'] == "Phone") echo "checked"; ?>>
                <label for="phone"><em>Phone</em></label>
              </p>
              <p>
                <!--Will be changed when database is introduce-->
                <label for="deliveryMethod">Delivery Method:</label><br />
                <select name="product" id="deliveryMethod" required>
                  <option value="">Select Delivery Method</option>
                  <option value="Online" <?php if($_SESSION['delMethod'] == "Online") echo "selected"?>>Online | $00.00</option>
                  <option value="Hard Copy" <?php if($_SESSION['delMethod'] == "Hard Copy") echo "selected"?>>Hard Copy | $7.50</option>
                </select>
              </p>
              <p><strong>Books: </strong><br>
              <?php
              $x = 0;
               for($count = 0; $count < count($items); $count+=1){?>
              <!--Will be changed when database is introduce-->
                  <label for="dmArtsofCriminals"><em><?php echo key($items[$count]) ?></em></label><br />
                  <input type="text" id="artsofCriminalsAmount" name="booksAmount[]" value="<?php echo $_SESSION['items'][$x+=1]; ?>"><br />
              <?php $x+=1; }?>
              <p>
                <label for="comments">Comments:</label><br/>
                <textarea id="comments" name="uComments" rows="4" cols="40" placeholder="Write description of your problem here.."><?php echo $userComments; ?></textarea>
              </p>
            </nav>
          </fieldset>
            <fieldset>
                <legend>Payment Detail</legend>
                <nav class="alignElement">
                    <p>Card Type: <br>
                        <input type="radio" id="visa" name="cardType" value="Visa" required>
                        <label for="visa"><img src="images/cardTypes/visa.png" alt="Visa_Card" class="cardTypeImg"></label>
                        <input type="radio" id="masterCard" name="cardType" value="Master Card">
                        <label for="masterCard"><img src="images/cardTypes/mastercard.png" alt="Master_Card" class="cardTypeImg"></label>
                        <input type="radio" id="americanExpress" name="cardType" value="American Express">
                        <label for="americanExpress"><img src="images/cardTypes/amex.png" alt="Amex_Card" class="cardTypeImg"></label>
                    </p>
                    <p><strong>Name:</strong>
                        <input type="text" id="userCardName" name="cardHolder" placeholder="John Citizen" required>
                    </p>
                    <p><strong>Number:</strong>
                        <input type="text" id="userCardNumber" name="cardNumber" required>
                    </p>
                    <p><strong>Expiry Date:</strong>
                        <input type="text" id="userCardExpiry" name="cardExpiryDate" placeholder="mm/yy" required>
                    </p>
                    <p><strong>CVV:</strong>
                        <input type="text" id="userCardCVV" name="cardCVV" required>
                    </p>
                </nav>
            </fieldset>
            <nav class="buttons">
                <input type="submit" class="button" value="Pay Now" name="submitOrder">
                <input id="cancel" class="button" type="reset" value="Cancel">
            </nav>
        </form>
    </section>
    <?php include "includes/footer.inc" ?>
</body>

</html>