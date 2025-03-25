<?php

//NAME:   Adam Noonan
//NUMBER: C00299231
//FILE:   addClient.php

// include database connection file
include '../../db.inc.php';

// set timezone
date_default_timezone_set("UTC");

include "../clientHead.php";

// print header
echo "<!-- Main Content Area -->
        <div class='content'>
		<h1>Add a New Client</h1>
		<!--form w/ submit button-->
<form class='mainForm' action = 'addClient.html.php' method = 'POST' >";

// get int values from bools
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
<!--closing html values-->
<br>
<br>
<input class="myButton" type="submit" value="Return"/>
</form>

</div> 
</body>
</html>