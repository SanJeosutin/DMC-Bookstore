<?php include("includes/header.inc")?>
<body>
<?php include("includes/menu.inc")?>
<script src="scripts/part2.js"></script>

  <section class="content">
    <h1>Need help / have Questions?</h1>
    <form id="enqForm" method="post" action="payment.php" novalidate>
      <Fieldset>
        <legend>Personal Details</legend>
        <nav class="alignElement">
          <p>
            <label for="fName">First Name:</label>
            <input type="text" name="firstName" id="fName" required>
          </p>
          <p>
            <label for="lName">Last Name:</label>
            <input type="text" name="lastName" id="lName" required>
          </p>
          <p>
            <label for="uEmail">Email:</label>
            <input type="email" name="userEmail" id="uEmail" required>
          </p>
        </nav>
      </Fieldset>
      <fieldset>
        <legend>Address</legend>
        <nav class="alignElement">
          <p>
            <label for="uAddress">Address:</label>
            <input type="text" name="userAddress" id="uAddress" required>
          </p>
          <p>
            <label for="uSuburb">Suburb:</label>
            <input type="text" name="userSuburb" id="uSuburb" required>
          </p>
          <p>
            <label for="uState">State:</label>
            <select name="userState" id="uState" required>
              <option value="">Select State</option>
              <option value="Victoria">VIC</option>
              <option value="New South Wales">NSW</option>
              <option value="Queensland">QLD</option>
              <option value="Northern Territory">NT</option>
              <option value="Western Australia">WA</option>
              <option value="South Australia">SA</option>
              <option value="Tasmania">TAS</option>
              <option value="Australian Capital Territory">ACT</option>
            </select>
          </p>
          <p>
            <label for="uPostcode">Postcode:</label>
            <!--Use js for better result checking-->
            <input type="text" name="userPostcode" id="uPostcode" required>
          </p>
        </nav>
      </fieldset>
      <fieldset>
        <legend>Contact Details</legend>
        <nav class="alignElement">
          <p>
            <label for="uPhone">Phone:</label>
            <input type="text" name="userPhone" id="uPhone" placeholder="0412 345 678" required>
          </p>
          <p><strong>Preferred Contact: </strong><br>
            <input type="radio" id="email" name="prefContact" value="Email" checked>
            <label for="email"><em>Email</em></label>
            <input type="radio" id="post" name="prefContact" value="Post">
            <label for="post"><em>Post</em></label>
            <input type="radio" id="phone" name="prefContact" value="Phone">
            <label for="phone"><em>Phone</em></label>
          </p>
          <p>
            <!--Will be changed when database is introduce-->
            <label for="deliveryMethod">Delivery Method:</label><br />
            <select name="product" id="deliveryMethod" required>
              <option value="">Select Delivery Method</option>
              <option value="delOnline">Online | $00.00</option>
              <option value="delHardCopy">Hard Copy | $7.50</option>
            </select>
          </p>
          <!--Will be changed when database is introduce-->
          <p><strong>Books: </strong><em>$10.99 special!!</em><br>
            <input type="checkbox" id="dmArtsofCriminals" name="books[]" value="The Art of Criminals">
            <input type="text" id="artsofCriminalsAmount" name="booksAmount[]" size="1" disabled>
            <label for="dmArtsofCriminals"><em>The Art of Criminals $10.99 </em></label><br />

            <input type="checkbox" id="cmnCursedRecord" name="books[]" value="Cursed Record">
            <input type="text" id="cursedRecordAmount" name="booksAmount[]"  size="1" disabled>
            <label for="cmnCursedRecord"><em>Cursed Record $10.99 </em></label><br />

            <input type="checkbox" id="cmnGalacticWars" name="books[]" value="Galactic Wars">
            <input type="text" id="galacticWarsAmount" name="booksAmount[]"  size="1" disabled>
            <label for="cmnGalacticWars"><em>Galactic Wars $10.99 </em></label><br />

            <input type="checkbox" id="dmcGreyBerlin" name="books[]" value="Grey Berlin">
            <input type="text" id="greyBerlinAmount" name="booksAmount[]"  size="1" disabled>
            <label for="dmcGreyBerlin"><em>Grey Berlin $10.99 </em></label><br />

            <input type="checkbox" id="hcHannahtheDragon" name="books[]" value="Hannah the Dragon">
            <input type="text" id="hannahtheDragonAmount" name="booksAmount[]"  size="1" disabled>
            <label for="hcHannahtheDragon"><em>Hannah the Dragon $10.99 </em></label><br />

            <input type="checkbox" id="ggMysteriousProgrammer" name="books[]" value="Mysterious Programmer">
            <input type="text" id="mysteriousProgrammerAmount" name="booksAmount[]"  size="1" disabled>
            <label for="ggMysteriousProgrammer"><em>Mysterious Programmer $10.99 </em></label><br />

            <input type="checkbox" id="jyPleasureofaWerewolf" name="books[]" value="Pleasure of a Werewolf">
            <input type="text" id="pleasureofaWerewolfAmount" name="booksAmount[]"  size="1" disabled>
            <label for="jyPleasureofaWerewolf"><em>Pleasure of a Werewolf $10.99 </em></label><br />

            <input type="checkbox" id="cmnTheMangledArms" name="books[]" value="The Mangled Arms">
            <input type="text" id="theMangledArmsAmount" name="booksAmount[]"  size="1" disabled>
            <label for="cmnTheMangledArms"><em>The Mangled Arms $10.99 </em></label><br />

            <input type="checkbox" id="mpTheScaryToad" name="books[]" value="The Scary Toad">
            <input type="text" id="theScaryToadAmount" name="booksAmount[]"  size="1" disabled>
            <label for="mpTheScaryToad"><em>The Scary Toad $10.99 </em></label><br />

            <input type="checkbox" id="jpmTheTinyRecord" name="books[]" value="The Tiny Record">
            <input type="text" id="theTinyRecordAmount" name="booksAmount[]"  size="1" disabled>
            <label for="jpmTheTinyRecord"><em>The Tiny Record $10.99 </em></label><br />

            <input type="checkbox" id="apTheSolidKettle" name="books[]" value="The Solid Kettle">
            <input type="text" id="theSolidKettleAmount" name="booksAmount[]"  size="1" disabled>
            <label for="apTheSolidKettle"><em>The Solid Kettle $10.99 </em></label><br />

            <input type="checkbox" id="agThreeWingedBadger" name="books[]" value="Three Winged Badger">
            <input type="text" id="threeWingedBadgerAmount" name="booksAmount[]"  size="1" disabled>
            <label for="agThreeWingedBadger"><em>Three Winged Badger $10.99 </em></label><br />
          </p>
          <p>
            <label for="comments">Comments:</label><br/>
            <textarea id="comments" name="comments" rows="4" cols="40" placeholder="Write description of your problem here.."></textarea>
          </p>
        </nav>
      </fieldset>
      <nav class="buttons">
        <input type="submit" class="button" value="Pay now">
        <input type="reset" class="button" value="Reset">
      </nav>
    </form>
  </section>
  <?php include("includes/footer.inc")?>
</body>

</html>