<!-- Name:  Mark Lambert, Student ID:   C00192497, Purpose: listbox.php 12/2/2025 -->
<?php
// Include php script that connects to the db
    include "db.inc.php";
    date_default_timezone_set('UTC');
// Prepare the statement for the SELECT query
    $sql = "SELECT * FROM Land";

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
        $id = $row['land_id'];
        $property_id = $row['property_id'];
        $acres = $row['acres'];
        $buildings = $row['buildings'];
        $residence_details = $row['residence_details'];
        $quotas = $row['quotas'];
        $notes = $row['notes'];
        $allText = "$id,$property_id,$acres,$buildings,$residence_details,$quotas,$notes";
        // Assigns each field in the listbox (each person) with their respective more detailed information
        echo "<option value = '$allText'>$id</option>";
    }

    // End the select (listbox)
    echo "</select>";
    // Close connection
    mysqli_close($con);

?>