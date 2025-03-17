<?php

// include database connection file
include '../../db.inc.php';

// set timezone
date_default_timezone_set("UTC");

$isBuyer = (int)isset($_POST['buyer']);
$isSeller = (int)isset($_POST['seller']);

// set up sql statement
$sql = "Insert into Client (name, address, eircode, phone_no, email, buyer, seller)
VALUES ('$_POST[name]','$_POST[address]','$_POST[eircode]','$_POST[phone_no]','$_POST[email]','$isBuyer','$isSeller')";

// error check for bad sql
if(!mysqli_query($con,$sql))
{
    die("An error in the SQL query: " . mysqli_error($con));
}

// print successful result
echo "<br>A record has been added for " . $_POST['name'] . ".";

// end connection
mysqli_close($con);

?>
<!--form w/ submit button-->
<form action = "addClient.html" method = "POST" >
    <br>
    <input type="submit" value="Return to Insert Page"/>
</form>