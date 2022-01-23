<?php
// AUTHOR:  Justin San | ********
// DATE:    01-Jun-2020
// DESC:    Use to check, sanitised and insert into table
include("functions.php");

/*REDIRECT USER TO enquire.php IF THEY TRIED TO JUST ENTER IN THE URL*/
if(!isset($_POST["submitOrder"])){
    header("location: enquire.php");
    exit();
}
$errMessage = "";

/** CLEAN THE FOLLOWING INPUT FROM THE USER **/
$fullName = $_POST["userFullName"];
$names = explode(" ", $fullName);
$firstName = clean_input($names[0]);
$lastName = clean_input($names[1]);

$fullAddress = $_POST["userFullAddress"];
$addresses = explode(", ", $fullAddress);
$userAddress = clean_input($addresses[0]);
$userSuburb = clean_input($addresses[1]);
$userState = clean_input($addresses[2]);
$userPostcode = clean_input($addresses[3]);

$userPhone = $_POST["userPhone"];
$userPhone = clean_input($userPhone);

$userEmail = $_POST["userEmail"];
$userEmail = clean_input($userEmail);

$userPrefContact = $_POST["userPrefContact"];
$delMethod = $_POST["userPreferedDelivery"];
$userCart = $_POST["userCart"];
$items = explode(",", $userCart);

$userComments = $_POST["userComments"];
$userComments = clean_input($userComments);


$cardType = $_POST["cardType"];

$cardHolder = $_POST["cardHolder"];
$cardHolder = clean_input($cardHolder);

$cardNumber = $_POST["cardNumber"];
$cardNumber = clean_input($cardNumber);

$cardEXP = $_POST["cardExpiryDate"];
$cardEXP = clean_input($cardEXP);

$cardCVV = $_POST["cardCVV"];
$cardCVV = clean_input($cardCVV);

/** NAME CHECKING **/
if($firstName == ""){
    $errMessage .= "<p><strong>First name</strong> cannot be empty.</p>";
}elseif(!preg_match("/^[a-zA-z]{3,25}$/", $firstName)){
    $errMessage .= "<p><strong>First name</strong> must be in alpha characters and no more than 25 characters long.</p>";
}
if($lastName == ""){
    $errMessage .= "<p><strong>Last name</strong> cannot be empty.</p>";
}elseif(!preg_match("/^[a-zA-z]{3,25}$/", $lastName)){
    $errMessage .= "<p><strong>Last name</strong> must be in alpha characters and no more than 25 characters long.</p>";
}

/** ADDRESS CHECKING **/
if($userAddress == ""){
    $errMessage .= "<p><strong>Address</strong> Cannot be empty.</p>";
}elseif(!preg_match("/^\d{1,5}\s[A-Za-z]{3,25}\s[A-Za-z]{2,10}$/", $userAddress)){
    $errMessage .= "<p><strong>Address</strong> must be alphanumerical characters and no more than 40 characters long.</p>";
}
if ($userSuburb == ""){
    $errMessage .= "<p><strong>Suburb</strong> Cannot be empty.</p>";
} elseif(!preg_match("/^([a-zA-Z]|[a-z]\s[a-zA-Z]){0,20}$/", $userSuburb)){
    $errMessage .= "<p><strong>Suburb</strong> must be in alpha characters and no more than 20 characters long.</p>";
}
switch ($userState){
    case "Victoria":
        if(!preg_match("/^([3]|[8])\d{3}$/",$userPostcode)){
            $errMessage .= "<p><strong>Postcode</strong> for <strong>".$userState."</strong> Must begin with 3 or 8.</p>";
        }
    break;
    
    case "New South Wales":
        if(!preg_match("/^([1]|[2])\d{3}$/",$userPostcode)){
            $errMessage .= "<p><strong>Postcode</strong> for <strong>".$userState."</strong> Must begin with 1 or 2.</p>";
        }
    break;
    
    case "Queensland":
        if(!preg_match("/^([4]|[9])\d{3}$/",$userPostcode)){
            $errMessage .= "<p><strong>Postcode</strong> for <strong>".$userState."</strong> Must begin with 4 or 9.</p>";
        }
    break;
    
    case "Northern Territory":
        if(!preg_match("/^([0])\d{3}$/",$userPostcode)){
            $errMessage .= "<p><strong>Postcode</strong> for <strong>".$userState."</strong> Must begin with 0.</p>";
        }
    break;
    
    case "Western Australia":
        if(!preg_match("/^([6])\d{3}$/",$userPostcode)){
            $errMessage .= "<p><strong>Postcode</strong> for <strong>".$userState."</strong> Must begin with 6.</p>";
        }
    break;
    
    case "South Australia":
        if(!preg_match("/^([5])\d{3}$/",$userPostcode)){
            $errMessage .= "<p><strong>Postcode</strong> for <strong>".$userState."</strong> Must begin with 5.</p>";
        }
    break;
    
    case "Tasmania":
        if(!preg_match("/^([7])\d{3}$/",$userPostcode)){
            $errMessage .= "<p><strong>Postcode</strong> for <strong>".$userState."</strong> Must begin with 7.</p>";
        }
    break;
    
    case "Australian Capital Territory":
        if(!preg_match("/^([0])\d{3}$/",$userPostcode)){
            $errMessage .= "<p><strong>Postcode</strong> for <strong>".$userState."</strong> Must begin with 0.</p>";
        }
    break;
    
    default:
        $errMessage .= "<p>Please select your state</p>";
    break;
}

/** PHONE NUMBER CHECKING **/
if($userPhone == ""){
    $errMessage .= "<p><strong>Phone</strong> Cannot be empty.</p>";
}elseif(!preg_match("/^(\d{10}|\d{4}\s\d{3}\s\d{3})$/", $userPhone)){
    $errMessage .= "<p><strong>Phone</strong> must be in numerical characters and at least 10 characters long.</p>";
}

/** EMAIL CHECKING **/
if($userEmail == ""){
    $errMessage .= "<p><strong>Email</strong> Cannot be empty.</p>";
}elseif(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
    $errMessage .= "<p><strong>Email</strong> must have at sign (@) follow by .com, .net, etc.</p>";
}

/** ITEMS CHECKING**/
for($count = 0; $count < count($items); $count+=1){
    if($count%2==0){ //check if the count is even or odd. If it's even then it is the ammount
        $bookName = $items[$count];
    } else{
        $bookAmount = $items[$count];
        if(!preg_match("/^([1-9]{1}|[1-9]{1}\d{1})$/",$bookAmount)){
            $errMessage .= "<p>Book quantity cannot exceed more than 99, cannot be empty or a negative number.</p>";
        }
    }
}

/** CARD CHECKING **/
if($cardHolder == ""){
    $errMessage .= "<p><strong>Card Holder</strong> cannot be empty.</p>";
}elseif(!preg_match("/^[a-z A-Z]{2,40}$/", $cardHolder)){
    $errMessage .= "<p><strong>Card holder</strong> must be in alpha characters and no more than 40 characters long.</p>";
}

switch ($cardType){
    case "Visa":
        if(!preg_match("/^([4]\d{3}\s\d{4}\s\d{4}\s\d{4})$/", $cardNumber)){
            $errMessage .= "<p>For <strong>".$cardType."</strong> please use the following format: 4xxx xxxx xxxx xxxx</p>";
        }
    break;

    case "Master Card":
        if(!preg_match("/^([5][1-5]\d{2}\s\d{4}\s\d{4}\s\d{4})$/", $cardNumber)){
            $errMessage .= "<p>For <strong>".$cardType."</strong> please use the following format: 5xxx xxxx xxxx xxxx</p>";
        }
    break;

    case "American Express":
        if(!preg_match("/^([3][4-7]\d{2}\s\d{6}\s\d{5})$/", $cardNumber)){
            $errMessage .= "<p>For <strong>".$cardType."</strong> please use the following format: 3xxx xxxxxx xxxxx</p>";
        }
    break;

    default:
        $errMessage .= "<p><please select type of payment.</p>";
    break;
}

if($cardEXP == ""){
    $errMessage .= "<p><strong>Card expiry</strong> cannot be empty.</p>";
}elseif(!preg_match("/^\d{2}\/\d{2}$/", $cardEXP)){
    $errMessage .= "<p><strong>Card expiry</strong> must be in the following format 'dd/yy'.</p>";
}

if($cardCVV == ""){
    $errMessage .= "<p><strong>Card CVV</strong> cannot be empty.</p>";
}elseif(!preg_match("/^\d{3}$/", $cardCVV)){
    $errMessage .= "<p><strong>Card CVV</strong> must be in 3 numerical long.</p>";
}

/** IF NO ERROR MESSAGE ARE CAPTURED. PUT USER DATA INTO SESSION TO PARSE IT AS A RECIEPT IF SUCCESSFULL **/
if($errMessage != ""){
    session_start();
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;

    $_SESSION['userAddress'] = $userAddress;
    $_SESSION['userSuburb'] = $userSuburb;
    $_SESSION['userState'] = $userState;
    $_SESSION['userPostcode'] = $userPostcode;

    $_SESSION['userPhone'] = $userPhone;
    $_SESSION['userEmail'] = $userEmail;
    $_SESSION['delMethod'] = $delMethod;

    $_SESSION['items'] = $items;
    $_SESSION['itemsPrice'] = $itemsPrice;
    $_SESSION['userComments'] = $userComments;

    $_SESSION['userPrefContact'] = $userPrefContact;
    header("location:fix_order.php?error=$errMessage");
    exit();
}

/** OPEN CONNECTION TO THE DATABASE  **/
$dbMessage = "";
require_once("settings.php");
$conn = mysqli_connect($host, $user, $pass, $sql_db);

/** CREATE TABLE IF THE TABLE IS NOT ALREADY EXIST **/
if($conn){
    $query = "CREATE TABLE orders (
        order_id INT AUTO_INCREMENT PRIMARY KEY,
        user_firstName varchar(25),
        user_lastName varchar(25),
        user_email varchar(40),
        user_phone decimal(10,0),
        user_Address varchar(40),
        user_suburb varchar(20),
        user_state enum('Victoria','New South Wales','Queensland','Northern Territory','Western Australia','South Australia','Tasmania','Australian Capital Territory'),
        user_postcode int(4),
        user_prefContact enum('Email','Post','Phone'),
        user_deliveryMethod enum('Online','Hard Copy'),
        user_cart varchar(500),
        additional_comments varchar(180),
        card_type enum('Visa','Master Card','Amex'),
        card_holder varchar(50),
        card_number int(20),
        card_cvv int(3),
        card_exp varchar(4),
        order_cost float,
        order_time datetime,
        order_status enum('PENDING','FULFILLED','PAID','ARCHIVED')  DEFAULT 'PENDING'
        );";

    $result = mysqli_query($conn, $query);
    $total = "";
    if(true){
        /** CALCULATE TOTAL ITEMS **/
        for($add = 0; $add < count($items); $add+=1){
            $total = $total + $items[$add+=1];
        }
        $total = $total * 10.99;
        if($delMethod == "Hard Copy"){
            $total = $total + 7.99;
        }

        $logDate = date('Y-m-d H:i:s');
        /** INSERT THE USER ORDER TO THE DATABSE**/
        $query = "INSERT INTO orders (user_firstName, user_lastName, user_email, user_phone, user_Address, user_suburb, user_state, user_postcode, user_prefContact, 
                                      user_deliveryMethod, user_cart, additional_comments, card_type, card_holder, card_number, card_cvv, card_exp, order_cost, order_time, 
                                      order_status) VALUES ('$firstName','$lastName', '$userEmail', '$userPhone', '$userAddress', '$userSuburb', '$userState',
                                      '$userPostcode','$userPrefContact','$delMethod','$userCart','$userComments','$cardType','$cardHolder','$cardNumber','$cardCVV','$cardEXP',
                                      '$total','$logDate','PENDING');";
        $insert_result = mysqli_query ($conn, $query);
        
        /** IF QUERY IS SUCCESSFULY EXECUTED. SHOW THE RECIEPT TO THE USER**/
        if($insert_result){
            $dbMessage = "<p>Success</p>
            <p>Order ID: ". mysqli_insert_id($conn) ." </p>
            <br>
            <p>Name: $firstName $lastName</p>
            <p>Email: $userEmail</p>
            <p>Phone: $userPhone</p>
            <p>Address: $userAddress, $userSuburb, $userState, $userPostcode</p>
            <br>
            <p>Prefer Contact: $userPrefContact</p>
            <p>Delivery: $delMethod</p>
            <p>Items: $userCart</p>
            <br>
            <p>Comments: $userComments</p>
            <br>
            <p>Card Type: $cardType</p>
            <p>Card Holder: $cardHolder</p>
            <p>Card Number: ***********</p>
            <p>Card CVV: ***</p>
            <p>Card Exp: $cardEXP</p>
            ";
        } else{
            $dbMessage = "<p>Failed</p>";
        }
        mysqli_close();
    } else {
        $dbMessage = "<p>Unable to connect.</p>";
    }
    header("location:receipt.php?output=$dbMessage");
}
?>

