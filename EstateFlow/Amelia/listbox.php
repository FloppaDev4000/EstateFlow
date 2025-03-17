<!-- Name:                 Amelia Hamulewicz -->
<!-- Student Number:       C00296605 -->
<!-- Title:                Select Option  -->
<!-- Date:                 26 February 2025 -->

<?php
// Include the database connection file
include "db.inc.php"; 

// Set the default timezone to UTC
date_default_timezone_set('UTC');

// SQL query to fetch person details where DeletedFlag is 0
$sql = "SELECT client_id, name FROM Client WHERE seller =1";

// Execute the query and check for errors
if (!$result = mysqli_query($con, $sql)) {
    // Display an error message and terminate the script if the query fails
    die('Error in querying the database: ' . mysqli_error($con));
}

// Start the dropdown list with an 'onclick' event to trigger the populate() function
echo "<br><select name='owner' id='owner' onchange='toggleLock()'>";

echo "<option value ='' disabled selected> Select an Owner</option>";

// Fetch the results and populate the dropdown options
while ($row = mysqli_fetch_array($result)) {
    // Extract values from the fetched row
    $id = $row['client_id'];
    $name = $row['name'];

    // Add an option to the dropdown list with the formatted text
    echo "<option value='$id'>$name</option>";
}

// Close the select dropdown
echo "</select>";

// Close the database connection
mysqli_close($con);
?>