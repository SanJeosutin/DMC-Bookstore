/**
 * Author       : Justin San | ********
 * Target       : enquire.html
 * Purpose      : To use for validations of user data 
 * Created      : 14-apr-2020
 * Last updated : 6-may-2020
 * Credits      : N/A?
 **/
"use strict";

/*PUT ALL OF THE USER DETAILS AND STORE IT TO A SESSION STORAGE */
function customerDetails(userFullName, userEmail, userPhone , userFullAddress, preferredContactEmail ,preferredContactPost ,preferredContactPhone, delMethod, bookItems, bookAmount, comments){
    var preferredContact = "";
    var deliveryMethod = "";
    var calcItemsInCart = calculateItemsInCart(bookItems, bookAmount, delMethod);
    var cart = [];
    if(preferredContactEmail){preferredContact = "Email";}
    else if(preferredContactPost){preferredContact = "Post";}
    else if(preferredContactPhone){preferredContact = "Phone";}

    if(delMethod == "delHardCopy"){
        deliveryMethod = "Hard Copy";
    } 
    else if(delMethod == "delOnline") {
        deliveryMethod = "Online";
    }

    
    for (var i = 0; i < bookItems.length; i++){
        if(bookItems[i].checked && bookAmount[i].value != null){
            cart.push(bookItems[i].value);
            cart.push(bookAmount[i].value);
        }
    }
    cart.toString();
    alert(cart); //debug

        sessionStorage.userFullName = userFullName; 
        sessionStorage.userEmail = userEmail; 
        sessionStorage.userPhone = userPhone; 
        sessionStorage.userFullAddress = userFullAddress; 
        sessionStorage.preferredContact = preferredContact;
        sessionStorage.deliveryMethod = deliveryMethod;
        sessionStorage.itemsInCart = cart;
        sessionStorage.comments = comments;
        
        sessionStorage.calcItemsInCart = "$"+calcItemsInCart.toFixed(2);
}

/*CHECK IF THE USER VIOLATED ANY OF THE FORMATING
IE: HAVE LETTER INSTEAD OF NUMBER, USED DECIMAL INSTEAD OF A WHOLE NUMBER
HAVE A NEGATIVE AMOUNT OF BOOKS, ETC */
function validateItems(bookItems, bookAmount){
    var errorMsg = "";
    var patternQTY = /^([1-9]{1}|[1-9]{1}\d{1})$/;
    var booksArray = [];
    for (var i = 0; i < bookItems.length; i++){
        booksArray.push(bookItems[i].checked);
        if(bookAmount[i].value == ""){
            bookAmount[i].value = 0;
        }
        booksArray.push(bookAmount[i].value);
    }

    for(var pos = 0; pos < booksArray.length; pos+=2){
        if(booksArray[pos] == true){
            //console.log(booksArray[pos+1]); CHECK IF
            if(!patternQTY.test(booksArray[pos+1])){
                pos = booksArray.length;
                errorMsg = "Quantity cannot exceed more than 99, cannot be empty or a negative number\n";
            }
        }
    }
    return errorMsg;
}

/*WHEN CHECKBOX IS CHECKED, IT WILL CALLED IN A FUNCTION TO ENABLE OR DISABLE THE CHECK BOX*/
function isBoxChecked(){
    var itemCheckBox = document.getElementsByName("books[]");
    for (var i = 0; i < itemCheckBox.length; i++){
        itemCheckBox[i].onclick = enTxtBox;
    }
}
/*CHECK IF THE CHECKBOX IS CHECKED, IF SO ENABLE TEXTBOX FOR USER TO PUT THEIR DESIRE QUNATITIES*/
function enTxtBox(){
    var itemSelect = document.getElementsByName("books[]");
    var item = document.getElementsByName("booksAmount[]");

    for (var i = 0; i < itemSelect.length; i++){
        if(itemSelect[i].checked){
           item[i].disabled = false;
        } else{
            item[i].value = '';
            item[i].disabled = true;
        }
    }
}
/*USED TO CALCULATE THE ITEMS */
function calculateItemsInCart(bookItems, bookAmount, delMethod){
    var booksArray = [];
    var totalPrice = 0.00;
    var itemsPrice = [10.99,8.99,12.94,14.99,7.99,16.99,11.99,10.99,12.99,12.99,11.99,12.99];

    /* CHECK IF THE CHECKBOX IS CHECKED THEN REGARDLESS IF THE CHECKBOX IS CHECKED OR NOT
    IT WILL PUT THE STATE (True OR False) IN TO AN ARRAY CALLED bookAmount.
    THEN IT WILL PUT THE AMOUNT OF THE BOOKS THAT THE USER WANT TO PURCHASE ONTO THE SAME ARRAY.
    */
    for (var i = 0; i < bookItems.length; i++){
        booksArray.push(bookItems[i].checked);
        if(bookAmount[i].value == ""){
            bookAmount[i].value = 0;
        }
        booksArray.push(parseFloat(bookAmount[i].value));
        booksArray.push(parseFloat(itemsPrice[i]));
        console.log("BOOKAMOUNT: " + bookAmount[i].value);
        console.log("PRICE: " + itemsPrice[i]);
    }

    /*CHECK IF THE FIRST VALUE IS TRUE.
    IF IT IS IT WILL THEN LOOP THROUGHT AN ARRAY THAT HAS ALL THE VALUE STORED INTO IT,
    THEN IT WILL CALCULATE THE AMOUNT OF BOOKS THAT THE USER WANTED TO PURCHASE AND TIMES
    THAT BY WHATEVER THE VALUE OF THAT BOOK. UNTIL THE LOOPS END.
    IF THE USER CHOSE A HARDCOPY, IT WILL THEN GOING TO COST THE USER AN EXTRA $7.50.
    */
    for(var pos = 0; pos < booksArray.length; pos++){
        if(booksArray[pos] == true){ //CHECK IF the book is selected
            console.log(booksArray[pos]); //DEBUG FEATURE
            if(booksArray[pos+1] == true){ //check if post array pos = 1
                console.log("Price: "+ booksArray[pos+2]);
                totalPrice += booksArray[pos+1] * booksArray [pos+2];
                console.log("Total: " + totalPrice);

                if(delMethod == "delHardCopy"){
                    totalPrice += 7.50;
                    delMethod = 0;
                }
            }
        }
        console.log("Your total is: " + totalPrice);
    }
       /*Ie of the array: [if Book Is Selected, amount of books, book price, if Book Is Selected, amount of books, book price,]*/
       /*Ie of the array: [       true        ,       3        ,    5.46   ,       false        ,       0        ,    2.46    ]*/
    console.log(booksArray); //items details. [if Book Is Selected, amount of books, price for each books] Ie: [True, 2, 2.45]
    return totalPrice;
}


/*CHECKED IF POSTCODE MATCHES THE FORMAT*/
function checkPostCode(userState, userPostCode){
    var errorMsg = "";
    switch (userState) {
        case "Victoria":
            if(!userPostCode.match(/^([3]|[8])\d{3}$/)){
                errorMsg = "PostCode for " + userState + " Must begin with 3 or 8\n";
            }
            break;
        
        case "New South Wales":
            if(!userPostCode.match(/^([1]|[2])\d{3}$/)){
                errorMsg = "PostCode for " + userState + " Must begin with 1 or 2\n";
            }
            break;
        
        case "Queensland":
            if(!userPostCode.match(/^([4]|[9])\d{3}$/)){
                errorMsg = "PostCode for " + userState + " Must begin with 4 or 9\n";
            }
            break;
        
        case "Northern Territory":
            if(!userPostCode.match(/^([0])\d{3}$/)){
                errorMsg = "PostCode for " + userState + " Must begin with 0\n";
            }
            break;
        
        case "Western Australia":
            if(!userPostCode.match(/^([6])\d{3}$/)){
                errorMsg = "PostCode for " + userState + " Must begin with 6\n";
            }
            break;
        
        case "South Australia":
            if(!userPostCode.match(/^([5])\d{3}$/)){
                errorMsg = "PostCode for " + userState + " Must begin with 5\n";
            }
            break;
        
        case "Tasmania":
            if(!userPostCode.match(/^([7])\d{3}$/)){
                errorMsg = "PostCode for " + userState + " Must begin with 7\n";
            }
            break;
        
        case "Australian Capital Territory":
            if(!userPostCode.match(/^([0])\d{3}$/)){
                errorMsg = "PostCode for " + userState + " Must begin with 0\n";
            }
            break;
        
        default:
            errorMsg = "Please select your state\n";
            break;
    }
    return errorMsg;
}

function validateData(){
    /*SETTING UP ALL THE VARIABLE THAT WILL BE USED TO VALIDATE USER ENTRY AND 
    USED TO PARSE IT ON TO THE SERVER WHEN EVERYTHING IS CHECKED OUT */
    var errorMsg = "";
    var goodToGo = true;

    var userFirstName = document.getElementById("fName").value.trim(); /*CUT ANY EMPTY SPACES AFTER*/
    var userLastName = document.getElementById("lName").value.trim();
    var userFullName = userFirstName + " " + userLastName;

    var userEmail = document.getElementById("uEmail").value;
    var userPhone = document.getElementById("uPhone").value;
    var userAddress = document.getElementById("uAddress").value;
    var userSuburb = document.getElementById("uSuburb").value;
    var userState = document.getElementById("uState").value;
    var userPostCode = document.getElementById("uPostcode").value;
    var userFullAddress = userAddress + ", " + userSuburb + ", " + userState + ", " + userPostCode;

    var bookItems = document.getElementsByName("books[]");
    var bookAmount = document.getElementsByName("booksAmount[]");

    var preferredContactEmail = document.getElementById("email").checked;
    var preferredContactPost = document.getElementById("post").checked;
    var preferredContactPhone = document.getElementById("phone").checked;

    var delMethod = document.getElementById("deliveryMethod").value;

    //var checkPostCodeError = checkPostCode(userState, userPostCode);
    //var validateItemsError = validateItems(bookItems, bookAmount);
    var comments = document.getElementById("comments").value;

    /*ERROR CHECKING, WILL GIVE OUT AN ERROR MESSAGE IF THE FOLLOWING FORMAT IS VIOLATED*/
    //if(!userFirstName.match(/^[a-zA-z]{3,25}$/)){
    //    errorMsg += "First name must be in alpha characters and no more than 25 characters long.\n";
    //    goodToGo = false;
    //}
    //if(!userLastName.match(/^[a-zA-z]{2,25}$/)){
    //    errorMsg += "Last name must be in alpha characters and no more than 25 characters long.\n";
    //    goodToGo = false;
    //}
    //if(!userAddress.match(/^\d{1,5}\s[A-Za-z]{3,25}\s[A-Za-z]{2,10}$/)){
    //    errorMsg += "Address must be in alphanumerical characters and no more than 40 characters long.\n";
    //    goodToGo = false;
    //}
    //if(!userSuburb.match(/^([a-zA-Z]|[a-z]\s[a-zA-Z]){0,20}$/)){
    //    errorMsg += "Suburb must be in alpha characters and no more than 20 characters long.\n";
    //    goodToGo = false;
    //}
    //if(!userPhone.match(/^(\d{10}|\d{4}\s\d{3}\s\d{3})$/)){
    //    errorMsg += "Phone number must be in numerical characters.\n";
    //    goodToGo = false;
    //}
    //if(checkPostCodeError != ""){
    //    errorMsg += checkPostCodeError;
    //    goodToGo = false;
    //}
    //if(validateItemsError != ""){
    //    errorMsg += validateItemsError;
    //    goodToGo = false;
    //}

   /*IF THERE IS ANY ERROR WHEN SUBMITING THE FORM. THE ERROR WILL BE DISPLAYED AS AN ALERT */
    if(errorMsg != ""){
        alert(errorMsg);
    }

    /*IF EVERYTHING CHECKED OUT, IT WILL PASS THE DATA TO PAYMENT.HTML*/
    if(goodToGo){
        customerDetails(userFullName, userEmail, userPhone , userFullAddress, preferredContactEmail ,preferredContactPost ,preferredContactPhone, delMethod, bookItems,bookAmount, comments);
    }
    return goodToGo;
}

/*USE TO INITIALISED*/
function init(){
    var enqForm = document.getElementById("enqForm");
    isBoxChecked();
    enqForm.onsubmit = validateData;
}
/*LOAD THE SCRIPT*/
window.onload = init;