<!-- Name:  Mark Lambert, Student ID:   C00192497, Purpose: AmendView.php 12/2/2025 -->
<?php
	session_start();
    include '../db.inc.php';
    date_default_timezone_set('UTC');
    
    //$property_type = $_POST['property_type'];
    $adrs = $_POST['adrs'] . " " . $_POST['adrs2'] . " " . $_POST['adrs3'];
    $eircode = $_POST['eircode'];
    $location = $_POST['location'];
    //$status = $_POST['status'];
    $owner = $_POST['owner'];
    $price = $_POST['price'];
    $viewing_times = $_POST['viewing_times'];

    // Land-Specific Details
    $acres = $_POST['acres'];
    $buildings = $_POST['buildings'];
    $details = $_POST['details'];
    $quotas = $_POST['quotas'];
    $notes = $_POST['notes'];
	$ownerName = $_POST['ownerName'];

    // INSERT statement for the Property table
    $propSQL = "UPDATE Property SET address = '$adrs',
                eircode = '$eircode',
                location = '$location',
                asking_price = $price,
                viewing_times = '$viewing_times' WHERE property_id = $_POST[property_id]";
                                                
    $landSQL =  "UPDATE Land SET acres = $acres,
                buildings = '$buildings',
                residence_details = '$details',
                quotas = $quotas,
                notes = '$notes' WHERE land_id = $_POST[id]";

    // Note, client_ID = 
    $clientSQL = "UPDATE Client SET name = '$ownerName' WHERE client_ID = '{$_POST['owner']}'";


    // If there's a problem with the query
    if(!mysqli_query($con, $propSQL))
    {
        die("There was an error with your Property Query: " . mysqli_error($con));
    }
    // Otherwise
    else
    {
        // So long as AT LEAT 1 row was affected, we will execute the update
        if(mysqli_affected_rows($con) !=0)
        {
			//Set the property_id session variable upon success
			$_SESSION['property_id'] = $_POST['property_id'];
        }
    }
		
	// If there's a problem with the query for LAND
	if(!mysqli_query($con, $landSQL))
	{
        die("There was an error with your Land Property Query: " . mysqli_error($con));
	}
	// Otherwise
	else{
		// So long as AT LEAT 1 row was affected, we will execute the update
		if(mysqli_affected_rows($con) !=0)
		{
			//Set the eircode session variable upon success
			$_SESSION['eircode'] = $_POST['eircode'];
		}
	}

	// If there's a problem with the query for CLIENT
	if(!mysqli_query($con, $clientSQL))
	{
        die("There was an error with your Client Query: " . mysqli_error($con));
	}
	// Otherwise
	else{
		// So long as AT LEAT 1 row was affected, we will execute the update
		if(mysqli_affected_rows($con) !=0)
		{
			//Set the client session var to 1, to use as a signifier that the client was updated also
			//$_SESSION['client'] = 1;
			//Set the eircode session variable upon success
			$_SESSION['eircode'] = $_POST['eircode'];
		}
	}
                

	header('Location: view_land.html.php');
    mysqli_close($con);

?>
	
