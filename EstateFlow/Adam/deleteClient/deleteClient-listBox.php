<?php

// connection file
include "../../db.inc.php";

//---------------------------------------BOX 1
// prepare statement
$sql = "SELECT client_id, name, address, eircode, phone_no, email FROM Client";

// error catch for bad connection
if(!$result = mysqli_query($con, $sql)){
    die("Error in querying the database" . mysqli_error($con));
}

// place listbox on page
echo "<br><select name='clientBox' id='clientBox' onclick='populateForm()'>";
echo "<option value='none' selected disabled hidden>Select Client</option>";

// fetch array from query result
while ($row=mysqli_fetch_array($result)){
    $id = $row['client_id'];
    $name = $row['name'];
    $address = $row['address'];
    $eircode = $row['eircode'];
    $phone_no = $row['phone_no'];
    $email = $row['email'];

    $allText = "$id#$name#$address#$eircode#$phone_no#$email";

	// place option tag
    echo "<option value='$allText'>$name</option>";
}
// close select tag
echo "</select>";

// close connection
mysqli_close($con);	