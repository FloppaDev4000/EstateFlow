<?php

// include database connection file
include '../../db.inc.php';

// set timezone
date_default_timezone_set("UTC");

// set up sql statement
$sql = "DELETE FROM Client WHERE email = '$_POST[email]'";

// error check for bad sql
if(!mysqli_query($con,$sql))
{
    die("An error in the SQL query: " . mysqli_error($con));
}

// print successful result
echo "<br>A record matching client_id: '$_POST[client_id]' has been deleted.";

// end connection
mysqli_close($con);

?>
<!--form w/ submit button-->
<form action = "deleteClient.html.php" method = "POST" >
    <br>
    <input type="submit" value="Return to delete page"/>
</form>