<?php

// NAME:    Adam Noonan
// NUMBER:  C00299231
// FILE:    deleteClient-listbox.php

// connection file
include "../../db.inc.php";

//---------------------------------------BOX 1
// prepare statement
$sql = "SELECT client_id, name, address, eircode, phone_no, email
FROM Client
WHERE delete_flag = 0";

// error catch for bad connection
if(!$result = mysqli_query($con, $sql)){
    die("Error in querying the database" . mysqli_error($con));
}

// place listbox on page
echo "<br>";
echo "<select name='clientBox' id='clientBox' onclick='populateForm()'>";
echo "<option value='' selected disabled hidden>Select Client</option>";

// fetch array from query result
while ($row=mysqli_fetch_array($result)){
    $id = $row['client_id'];
    $name = $row['name'];
    $address = $row['address'];
    $eircode = $row['eircode'];
    $phone_no = $row['phone_no'];
    $email = $row['email'];

    $allText = "$id;!$name;!$address;!$eircode;!$phone_no;!$email";

	// place option tag
    echo "<option value='$allText'>$name</option>";
}
// close select tag
echo "</select>";

//-----------------------------------------FIND CONNECTED BIDS/PROPERTIES

$clientIDs = "";

$sqlBids = "SELECT client_id FROM Bid
WHERE delete_flag = 0";
// error catch for bad connection
if(!$resultBids = mysqli_query($con, $sqlBids)){
    die("Error in querying the database" . mysqli_error($con));
}
while ($rowBids=mysqli_fetch_array($resultBids)){
    $clientIDs = $clientIDs . " " . $rowBids['client_id'];
}

$sqlProps = "SELECT owner FROM Property
WHERE delete_flag = 0";
// error catch for bad connection
if(!$resultProps = mysqli_query($con, $sqlProps)){
    die("Error in querying the database" . mysqli_error($con));
}
while ($rowProps=mysqli_fetch_array($resultProps)){
    $clientIDs = $clientIDs . " " . $rowProps['owner'];
}

// $clientIDs now contains ALL relevant IDs, separated by spaces.


echo "<div id='hasBidsProperties' hidden>$clientIDs</div>";

// close connection
mysqli_close($con);	