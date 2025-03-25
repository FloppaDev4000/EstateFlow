<?php
// Include database connection
include "db.inc.php"; 

// Fetch Owner details
$sqlOwners = "SELECT client_id, name FROM Client WHERE seller = 1";
$resultOwners = mysqli_query($con, $sqlOwners);
if (!$resultOwners) {
    die('Error querying Client table: ' . mysqli_error($con));
}

// Start dropdown
echo "<br><select name='ownerSelect' id='ownerSelect' onchange='toggleLock()'>";
echo "<option value='' disabled selected>Select an Owner</option>";

// Fetch each owner
while ($row = mysqli_fetch_assoc($resultOwners)) {
    $ownerId = $row['client_id'];
    $ownerName = $row['name'];

    // Store data as a CSV string (ID, Name)
    $optionValue = "$ownerId,$ownerName";

    echo "<option value='$optionValue'>$ownerName</option>";
}

// Close dropdown and connection
echo "</select>";
mysqli_close($con);
?>
