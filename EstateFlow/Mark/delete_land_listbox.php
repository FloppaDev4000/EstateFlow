<!-- Name:  Mark Lambert, Student ID:   C00192497, Purpose: listbox.php 12/2/2025 -->
<?php
// Include php script that connects to the db
    include "db.inc.php";
    date_default_timezone_set('UTC');
// Prepare the statement for the SELECT query on LAND which INNER JOINS with the PROPERTY table where their property id's are equal respectively
//This gives us ALL the Property info for ALL Land entries on the Property table
    $sql = "SELECT * FROM Land INNER JOIN Property ON Land.property_id = Property.property_id";

// Error handling, if a problem with the query, print a relevant message
    if ( !$result = mysqli_query($con, $sql))
    {
        // Die kills rest of script
        die('Error in querying the database' . mysqli_error($con));
    }


    // Creates a dropdown list (<select>) with a id listbox, when the user clicks the dropdown the function populate() when a user is clicked
    echo "<br><select name = 'listbox' id = 'listbox' onblur = 'populate()' required>";
    // populate(), populates the forms inputboxes with further information from the db about the person

    //Adds a hidden option to the listbox, which is hidden and disabled so that the user can't accidentally add this to the D/B
    //Purpose is to have a default selected value that displays a message asking user to select from the listbox
    echo "<option value ='none' selected disabled hidden selected>Select a Land Property</option>";
    // Iterate through the result set
    while($row = mysqli_fetch_array($result))
    {
        // Property values
        $type = $row['type'];
        $address = $row['address'];
        $eircode = $row['eircode'];
        $location = $row['location'];
        $status = $row['status'];
        $highest_bid = $row['highest_bid'];
        $asking_price = $row['asking_price'];
        $viewing_times = $row['viewing_times'];
        $date_listed = $row['date_listed'];
        // Then Land
        $id = $row['land_id'];
        $acres = $row['acres'];
        $buildings = $row['buildings'];
        $residence_details = $row['residence_details'];
        $quotas = $row['quotas'];
        $notes = $row['notes'];
		//Assign allText all of the values, separated by the delim '#'
        $allText = "$type#$address#$eircode#$location#$status#$highest_bid#$asking_price#$viewing_times#$date_listed#$id#$acres#$buildings#$residence_details#$quotas#$notes";
        // Assigns each field in the listbox with the values and displays each entry via their eircode
        echo "<option value = '$allText'>$eircode</option>";
    }

    // End the select (listbox)
    echo "</select>";
    // Close connection
    mysqli_close($con);

?>