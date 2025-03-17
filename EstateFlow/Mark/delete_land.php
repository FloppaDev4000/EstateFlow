<!-- Estate Flow - View Land Page  -->
<!DOCTYPE html>
<? php
		session_start();
?>

<?php
    include 'db.inc.php';
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
            echo mysqli_affected_rows($con) . " record(s) updated <br>";
        }
        // Otherwise, the user didn't input anything new, so let them know that the detials have stayed the same
        else
        {
            echo "No records were changed";
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
				echo mysqli_affected_rows($con) . " record(s) updated <br>";
            }
            // Otherwise, the user didn't input anything new, so let them know that the detials have stayed the same
            else
            {
                echo "No records were changed";
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
                echo mysqli_affected_rows($con) . " record(s) updated <br>";
            }
            // Otherwise, the user didn't input anything new, so let them know that the detials have stayed the same
            else
            {
                echo "No records were changed";
            }
        }
                $_SESSION['land_id'] = $_POST['land_id'];
				$_SESSION['eircode'] = $_POST['eircode'];
    mysqli_close($con);
    ?>
	
		
    <script>
        // Send to the main Delete page
        window.location = "delete_land.html.php"

    </script>

