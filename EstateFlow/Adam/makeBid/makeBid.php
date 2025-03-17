<?php

// include database connection file
include '../../db.inc.php';

// set timezone
date_default_timezone_set("UTC");

// set up sql statement
$sql = "Insert into Bid (date, amount, client_id, property_id)
VALUES ('$_POST[date]', '$_POST[amount]', '$_POST[clientBox]', '$_POST[propertyBox]')";

// error check for bad sql
if(!mysqli_query($con,$sql))
{
    die("An error in the SQL query: " . mysqli_error($con));
}

// print successful result
echo "<br>A record has been added for this bid.";

// end connection
mysqli_close($con);

?>
<!--form w/ submit button-->
<form action = "makeBid.html.php" method = "POST" >
    <br>
    <input type="submit" value="Return to bid page"/>
</form>