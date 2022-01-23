/**
 * Author       : Justin San | ********
 * Target       : payment.html
 * Purpose      : To use for displaying user's data & verify user's card details
 * Created      : 1-may-2020
 * Last updated : 4-may-2020
 * Credits      : N/A?
 **/
"use strict";

/*KICK AND DELETE USER DATA IF LEFT IDLE FOR 15MINS THEN PROMPT OUT A "FUN" LITTLE MESSAGE*/
function timeExpiration() {
    var rand = Math.floor(Math.random() * 6);
    var kick = "You've been kicked from the session.\nReason: ";
    switch (rand) {
        case 0:
            alert(kick + "Did you just seriously waited 15 minutes to test this one?? hmm");
            break;
        case 1:
            alert(kick + "You just have too much time in your hand aren't you.");
            break;
        case 2:
            alert(kick + "Maybe 'cause you're idling in this page?");
            break;
        case 3:
            alert(kick + "To kul fo skul");
            break;
        case 4:
            alert(kick + "Spare me some time? since ya have soo much time in your hand :D");
            break;
        case 5:
            alert(kick + "Idling. 'cause you're idling. Thats why");
            break;
    }
    sessionStorage.clear();
    window.location = "index.html";
}

function cancelOrder() {
    sessionStorage.clear();
    alert("you've decided to cancel your order.\nWe will now redirected you back to the homepage.");
    window.location = "index.php";
}

function displayData() {
    if (sessionStorage.userFullName != undefined) {
        document.getElementById("confirmedName").textContent = sessionStorage.userFullName;
        document.getElementById("confirmedAddress").textContent = sessionStorage.userFullAddress;
        document.getElementById("confirmedEmail").textContent = sessionStorage.userEmail;
        document.getElementById("confirmedPhone").textContent = sessionStorage.userPhone;

        document.getElementById("confirmedItems").textContent = sessionStorage.itemsInCart;
        document.getElementById("confirmedPrefContact").textContent = sessionStorage.preferredContact;
        document.getElementById("confirmedDeliveryMethod").textContent = sessionStorage.deliveryMethod;

        document.getElementById("confirmedComments").textContent = sessionStorage.comments;
        document.getElementById("totalAmount").textContent = sessionStorage.calcItemsInCart;

        /*************************************************************************************
            /\ Display user's orders.     .Hide user's orders to pass it to the server \/
        *************************************************************************************/

        document.getElementById("userFullName").value = sessionStorage.userFullName;
        document.getElementById("userFullAddress").value = sessionStorage.userFullAddress;
        document.getElementById("userEmail").value = sessionStorage.userEmail;
        document.getElementById("userPhone").value = sessionStorage.userPhone;

        document.getElementById("userCart").value = sessionStorage.itemsInCart;
        document.getElementById("userPrefContact").value = sessionStorage.preferredContact;
        document.getElementById("userPreferedDelivery").value = sessionStorage.deliveryMethod;

        document.getElementById("userComments").value = sessionStorage.comments;
        document.getElementById("userTotal").value = sessionStorage.calcItemsInCart;
    }
}
/*GET THE USER CARD TYPE BY PUTTING INDIVIDUAL CARD TYPES INTO AN ARRAY */
function getTypeCards() {
    var cardType = "de Nada";
    var cardTypeArray = document.getElementsByName("cardType");

    for (var i = 0; i < cardTypeArray.length; i++) {
        if (cardTypeArray[i].checked) {
            cardType = cardTypeArray[i].value;
            return cardType;
        }
    }
}
/*VALIDATE USER'S CARD NUMBER WITH THE FOLLOWING FORMAT */
function validateCardNumber(userCardNumber) {
    var errorMsg = "";
    var cardType = getTypeCards();
    switch (cardType) {
        case "Visa":
            if (!userCardNumber.match(/^([4]\d{3}\s\d{4}\s\d{4}\s\d{4})$/)) {
                errorMsg = "For " + cardType + " please use the following format: 4xxx xxxx xxxx xxxx\n";
            }
            break;

        case "Master Card":
            if (!userCardNumber.match(/^([5][1-5]\d{2}\s\d{4}\s\d{4}\s\d{4})$/)) {
                errorMsg = "For " + cardType + " please use the following format: 5xxx xxxx xxxx xxxx\n";
            }
            break;

        case "American Express":
            if (!userCardNumber.match(/^([3][4-7]\d{2}\s\d{6}\s\d{5})$/)) {
                errorMsg = "For " + cardType + " please use the following format: 3xxx xxxxxx xxxxx\n";
            }
            break;
    }
    return errorMsg;
}
/*VALIDATE USER'S CARD DETAILS. USER WILL BE GIVEN AN ALERT IF ANY OF THE RULES ARE VIOLATED */
function validatePayment() {
    var errorMsg = "";
    var goodToGo = true;

    var iscardTypeVisa = document.getElementById("visa").checked;
    var iscardTypeMasterCard = document.getElementById("masterCard").checked;
    var iscardTypeAmericanEx = document.getElementById("americanExpress").checked;

    var userCardName = document.getElementById("userCardName").value;
    var userCardNumber = document.getElementById("userCardNumber").value;
    var userCardExpiry = document.getElementById("userCardExpiry").value;
    var userCardCVV = document.getElementById("userCardCVV").value;

    //var validateCardNum = validateCardNumber(userCardNumber);

    //var isUserOrderExist = document.getElementById("userFullName").value;

    //if (!(iscardTypeAmericanEx || iscardTypeMasterCard || iscardTypeVisa)) {
    //    errorMsg += "Please select your card type.\n";
    //    goodToGo = false;
    //}
    //if (!userCardName.match(/^([a-z A-Z]{2,40})$/)) {
    //    errorMsg += "Card Name must be in alpha characters and no more than 40 characters long.\n";
    //    goodToGo = false;
    //}
//
    //if (!userCardExpiry.match(/^\d{2}\/\d{2}$/)) {
    //    errorMsg += "Please follow the format for the expiry date.\n";
    //}
    //if (!userCardCVV.match(/^\d{3}$/)) {
    //    errorMsg += "Please check your CVV.\n";
    //}
//
    //if (validateCardNum != "") {
    //    errorMsg += validateCardNum;
    //    goodToGo = false;
    //}
    //if (isUserOrderExist == "") {
    //    alert("Please fill out the order 1st before continue to pay.");
    //    window.location = "enquire.html";
    //    goodToGo = false;
    //}
    if (errorMsg != "") {
        errorMsg += errorMsg;
        goodToGo = false;
    }

    if (errorMsg != "") {
        alert(errorMsg);
    }
    return goodToGo;
}
/*USE TO INITIALISED*/
function init() {
    var enqForm = document.getElementById("enqForm");
    var cancel = document.getElementById("cancel");
    displayData();
    /*SET AN EXPERATION TIMER WHEN THE PAGE IS LOADED*/
    setTimeout(timeExpiration, 900000);
    enqForm.onsubmit = validatePayment;
    cancel.onclick = cancelOrder;

}
/*LOAD THE SCRIPT*/
window.onload = init;