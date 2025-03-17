<?php

// connection file
include "../../db.inc.php";

//---------------------------------------BOX 1
// prepare statement
$sql = "SELECT *
FROM Client
WHERE delete_flag = 0";

// error catch for bad connection
if(!$result = mysqli_query($con, $sql)){
    die("Error in querying the database" . mysqli_error($con));
}

// place listbox on page
echo "<label for='clientBox'>";
echo "<br><select name='clientBox' id='clientBox' onclick='populateClient()' required>";
echo "<option value='' selected disabled hidden>Select Client</option>";

// fetch array from query result
while ($row=mysqli_fetch_array($result)){
    $id = $row['client_id'];
    $name = $row['name'];
    $address = $row['address'];
    $eircode = $row['eircode'];
    $phone_no = $row['phone_no'];
    $email = $row['email'];

    $total = "$id#$name#$address#$eircode#$phone_no#$email";

	// place option tag
    echo "<option value='$total'>$name</option>";
}
// close select tag
echo "</select>";

//---------------------------------------BOX 2

// get id of selected clientBox item

// prepare statement
$sql2 = "SELECT *
FROM Property
WHERE delete_flag = 0";

// error catch for bad connection
if(!$result2 = mysqli_query($con, $sql2)){
    die("Error in querying the database" . mysqli_error($con));
}

echo "<br><select name='propertyBox' id='propertyBox' onclick='populateProperty()'required>";
echo "<option value='' selected disabled hidden>Select Property</option>";

// fetch array from query result
while ($row=mysqli_fetch_array($result2)){
    $id = $row['property_id'];
    $address = $row['address'];
    $eircode = $row['eircode'];
    $location = $row['location'];
    $highest_bid = $row['highest_bid'];
    $asking_price = $row['asking_price'];
    $viewing_times = $row['viewing_times'];

    $owner = $row['owner'];

    $total = "$id#$address#$eircode#$location#$highest_bid#$asking_price#$viewing_times";

	// place option tag
    echo "<option value='$owner;?$total' class='propertyOptions'>$address</option>";
}
// close select tag
echo "</select>";

mysqli_close($con);