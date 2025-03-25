<?php

//NAME:   Adam Noonan
//NUMBER: C00299231
//FILE:   amendViewClient-listbox.php

// connection file
include "../../db.inc.php";

//---------------------------------------BOX 1
// prepare statement
$sql = "SELECT
client_id, name, address, eircode, phone_no, email
FROM Client
WHERE delete_flag = 0";

// error catch for bad connection
if(!$result = mysqli_query($con, $sql))
{
    die("Error in querying the database" . mysqli_error($con));
}

// place listbox on page
echo "<br><select name='clientBox' id='clientBox' onclick='populate()'>";
echo "<option value='' selected disabled hidden>Select Client</option>";

// fetch array from query result
while ($row=mysqli_fetch_array($result))
{
    $id = $row['client_id'];
    $name = $row['name'];
    $address = $row['address'];
    $eircode = $row['eircode'];
    $phoneNo = $row['phone_no'];
    $email = $row['email'];

    $fullValue = "$id;!$name;!$address;!$eircode;!$phoneNo;!$email";

	// place option tag
    echo "<option value='$fullValue'>$name</option>";
}
// close select tag
echo "</select>";

// close connection
mysqli_close($con);	