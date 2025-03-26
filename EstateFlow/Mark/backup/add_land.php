<!-- Estate Flow - Add Land Page  -->
<!--Name: Mark Lambert,
Student ID: C00192497
Purpose: Add Land PHP page
Date: February 2025
EstateFlow Project Y2 2025 -->
<?php
    session_start();
//  Note: inclusion of db.inc.php file, as we first need to connect to the db.
    include '../db.inc.php';
    // Set variables for POST
    // Generic Property Details
    $property_type = $_POST['property_type'];
    $adrs = $_POST['adrs'] . " " . $_POST['adrs2'] . " " . $_POST['adrs3'];
    $eircode = $_POST['eircode'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $owner = $_POST['owner'];
    $price = $_POST['price'];
    $viewing_times = $_POST['viewing_times'];

    // Land-Specific Details
    $property_id;
    $acres = $_POST['acres'];
    $buildings = $_POST['buildings'];
    $details = $_POST['details'];
    $quotas = $_POST['quotas'];
    $notes = $_POST['notes'];

    // INSERT statement for the Property table
    $sql = "INSERT INTO Property (type,address,eircode,location,status,owner,asking_price,viewing_times) 
    VALUES ('$property_type','$adrs','$eircode','$location','$status','$owner','$price','$viewing_times')";

    // If the SQL query fails
    if(!mysqli_query($con,$sql))
    {
        // Print the following message with the last occured error that occured within the connection
        die("There was an error with your Property Query: " . mysqli_error($con));
    }

    // Gets the last AUTO ID value inserted, meaning we don't have to prompt the user for an input on what the property id of this land property is
    $property_id = mysqli_insert_id($con);

    // String sql is assigned the Insert statement for DB
    $sql = "INSERT INTO Land (property_id,acres,buildings,residence_details, quotas, notes) 
    VALUES ('$property_id','$acres','$buildings','$details','$quotas','$notes')";

    // If the SQL query fails
    if(!mysqli_query($con,$sql))
    {
        // Print the following message with the last occured error that occured within the connection
        die("There was an error with your Land Property Query: " . mysqli_error($con));
    }
    //Set the session variable property_id for a success message
        $_SESSION["property_id"] = $property_id;
    // Close connection
    mysqli_close($con);
?> 
	
<script>
    // Send to the main Add page
    window.location = "add_land.html.php"

</script>

			