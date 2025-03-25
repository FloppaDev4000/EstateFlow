<?php

// NAME:    Adam Noonan
// NUMBER:  C00299231
// FILE:    makeBid.php

// include database connection file
include '../../db.inc.php';

// set timezone
date_default_timezone_set("UTC");

// set up sql statement
$sql = "INSERT INTO Bid (date, amount, client_id, property_id)
VALUES ('$_POST[date]', '$_POST[amount]', '$_POST[clientBox]', '$_POST[property_id]');";

// error check for bad sql
if(!mysqli_query($con,$sql))
{
    die("An error in the SQL query: " . mysqli_error($con));
}


// print header
include "../bidHead.php";
        
// print result
echo "<!-- Main Content Area -->
        <div class='content'>
        <script src='makeBid.js'></script>
		
		<h1>Make a Bid</h1>
		<!--form w/ submit button-->
<form class='mainForm' action = 'makeBid.html.php' method = 'POST' >

        <br>A record has been added for this bid.";

//-------------------------------EDIT HIGHEST BID OF PROPERTY
$sql2 = "UPDATE Property
SET highest_bid='$_POST[amount]'
WHERE property_id='$_POST[property_id]'";

// error check for bad sql
if(!mysqli_query($con,$sql2))
{
    die("An error in the SQL query: " . mysqli_error($con));
}

// print successful result
echo "<br>Highest bid updated in property table.";

// end connection
mysqli_close($con);

?>

    <br><br>
    <input class="myButton" type="submit" value="Return"/>
</form>

</div>
</form>
</div> 
</body>
</html>