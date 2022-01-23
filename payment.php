<?php include("includes/header.inc")?>
<body>
<?php include("includes/menu.inc")?>
<script src="scripts/payment.js"></script>
    <section class="content">
        <h1>Fill out the form to complete your order</h1>
        <!--|  http://mercury.swin.edu.au/it000000/formtest.php  |-->
        <p class="warning">Please make sure that the details that you have entered are correct</p>
        <form id="displayUserInfo">
            <fieldset>
                <legend>Personal Details </legend>
                <nav class="alignElement">
                    <p><strong>Name: </strong><span id="confirmedName"></span></p>
                    <p><strong>Address: </strong><span id="confirmedAddress"></span></p>
                    <p><strong>Email: </strong><span id="confirmedEmail"></span></p>
                    <p><strong>Phone Number: </strong><span id="confirmedPhone"></span></p>
                    <p><strong>Preferred Contact: </strong><span id="confirmedPrefContact"></span></p>
                    <p><strong>Delivery Method: </strong><span id="confirmedDeliveryMethod"></span></p>
                    <p><strong>Items: </strong><span id="confirmedItems"></span></p>
                    <p><strong>Comments: </strong><span id="confirmedComments"></span></p>
                    <p><strong>Total: </strong><span id="totalAmount"></span></p>
                </nav>
            </fieldset>
        </form>
        <br>
        <form id="enqForm" method="post" action="process_order.php" novalidate>
            <fieldset>
            <legend>Payment Detail</legend>
                    <input type="hidden" name="userFullName" id="userFullName" />
                    <input type="hidden" name="userFullAddress" id="userFullAddress" />
                    <input type="hidden" name="userEmail" id="userEmail" />
                    <input type="hidden" name="userPhone" id="userPhone" />
                    <input type="hidden" name="userCart" id="userCart" />
                    <input type="hidden" name="userPrefContact" id="userPrefContact" />
                    <input type="hidden" name="userPreferedDelivery" id="userPreferedDelivery" />
                    <input type="hidden" name="userComments" id="userComments" />
                    <input type="hidden" name="userTotal" id="userTotal" />
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
    <?php include("includes/footer.inc")?>
</body>

</html>