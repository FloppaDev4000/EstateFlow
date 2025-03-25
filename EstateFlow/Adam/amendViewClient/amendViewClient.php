<?php

//NAME:   Adam Noonan
//NUMBER: C00299231
//FILE:   amendViewClient.php

// include database connection file
include '../../db.inc.php';

// set timezone
date_default_timezone_set("UTC");

include "../clientHead.php";

// print header
echo "<!-- Main Content Area -->
        <div class='content'>
		<h1>Amend/View a Client</h1>
		
		<!--option to return-->
<form class='mainForm' action='amendViewClient.html.php' method='post'>";

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
        echo "<br>No records were changed.";
    }
}

// close connection
mysqli_close($con);
?>

	<br><br>
    <input class="myButton" type="submit" value="Return">
</form>

</div>
</form>
</div> 
</body>
</html>