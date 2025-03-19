<!-- Estate Flow - Delete Land Page php  -->
<!--Name: Mark Lambert
 Purpose: php script for deleting a land propert
Student ID: C00192497y-->
<!DOCTYPE html>
<?php
		session_start();
?>

<?php
    include '../db.inc.php';
    date_default_timezone_set('UTC');
    //UPDATE statements for deleting the entries in the table
	// UPDATE statement for the Property table
    $propSQL = "UPDATE Property SET delete_flag = 1 WHERE property_id = '$_POST[property_id]'";
    // UPDATE statement for the Land Table                                           
    $landSQL =  "UPDATE Land SET delete_flag = 1 WHERE land_id = '$_POST[land_id]'";
	//Update statement for the Bid table
	$bidSQL = "UPDATE Bid SET delete_flag = 1 WHERE property_ID = '$_POST[property_id]'";

    // If there's a problem with the query
    if(!mysqli_query($con, $propSQL))
    {
        echo "There was an error with your query: " . mysqli_error();
    }
    // Otherwise
    else
    {
        // So long as AT LEAT 1 row was affected, we will execute the update
        if(mysqli_affected_rows($con) !=0)
        {
			$_SESSION['land_id'] = $_POST['property_id'];
        }
    }
		
		
        // If there's a problem with the query for LAND
        if(!mysqli_query($con, $landSQL))
        {
            echo "There was an error with your query: " . mysqli_error();
        }
        // Otherwise
		else{
            // So long as AT LEAT 1 row was affected, we will execute the update
            if(mysqli_affected_rows($con) !=0)
            {
				$_SESSION['eircode'] = $_POST['eircode'];
            }
		}
		// If there's a problem with the query for BID
        if(!mysqli_query($con, $bidSQL))
        {
            echo "There was an error with your query: " . mysqli_error();
        }
        // Otherwise
		else{
            // So long as AT LEAT 1 row was affected, we will execute the update
            if(mysqli_affected_rows($con) !=0)
            {
                 $_SESSION['bid'] = 1;
            }
        }
                

	header('Location: delete_land.html.php');
    mysqli_close($con);

    ?>
	


