<?php

// NAME:    Adam Noonan
// NUMBER:  C00299231
// FILE:    deleteClient.php

// include database connection file
include '../../db.inc.php';

// set timezone
date_default_timezone_set("UTC");

include "../clientHead.php";

// print header
echo "<!-- Main Content Area -->
        <div class='content'>
		<h1>Delete a Client</h1>
		<!--form w/ submit button-->
<form class='mainForm' action = 'deleteClient.html.php' method = 'POST' >";

//--------------------------------------SQL STATEMENTS
$sqlClient = "UPDATE Client
SET delete_flag = 1
WHERE client_id = '$_POST[client_id]'";

$sqlBid = "UPDATE Bid
SET delete_flag=1
WHERE client_id = '$_POST[client_id]'";

$sqlProperty = "UPDATE Property
SET delete_flag=1
WHERE owner = '$_POST[client_id]'";


//--------------------------------------EXECUTE STATEMENTS
// error check for bad sql
if(!mysqli_query($con,$sqlClient))
{
    die("An error in the SQL query: " . mysqli_error($con));
}
if(!mysqli_query($con,$sqlBid))
{
    die("An error in the SQL query: " . mysqli_error($con));
}
if(!mysqli_query($con,$sqlProperty))
{
    die("An error in the SQL query: " . mysqli_error($con));
}

// print successful result
echo "<br>'$_POST[name]' has been deleted.";
echo "<br>All their bids & properties have also been removed.";

// end connection
mysqli_close($con);

?>

    <br>
<br>
    <input class="myButton" type="submit" value="Return"/>
</form>

</div>
</form>
</div> 
</body>
</html>