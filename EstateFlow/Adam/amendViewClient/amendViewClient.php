<?php

// include database connection file
include '../../db.inc.php';

// set timezone
date_default_timezone_set("UTC");

// prepare statement
$sql = "UPDATE Client SET
    name = '$_POST[name]',
    address = '$_POST[address]',
    eircode = '$_POST[eircode]',
    phone_no = '$_POST[phone_no]',
    email = '$_POST[email]'

    WHERE client_id = '$_POST[client_id]'";


// catch error
if(!mysqli_query($con,$sql))
{
    echo "Error " . mysqli_error($con);
}
else // success
{
    if(mysqli_affected_rows($con) != 0)
    {
        // success
        echo "Entry matching client id " . $_POST['client_id'] . " has been updated successfully.";
    }
    else
    {
        // no effect
        echo "No records were changed.";
    }
}

// close connection
mysqli_close($con);
?>

<!--option to return-->
<form action="amendViewClient.html.php" method="post" />
    <input type="submit" value="Return to Previous Screen">
</form>