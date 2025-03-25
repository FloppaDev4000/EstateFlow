<?php
// Include database connection
include "db.inc.php"; 

// Get filter value (default to 'all' if not set)
$statusFilter = isset($_GET['status']) ? $_GET['status'] : 'all';

// Define SQL condition based on filter
$statusCondition = "";
if ($statusFilter == "sold") {
    $statusCondition = "AND status = 2"; // Sold properties
} elseif ($statusFilter == "unsold") {
    $statusCondition = "AND status < 2"; // Unsold properties (Sale or Sale Agreed)
}


// Fetch Property details
$sqlProperty = "SELECT eircode, property_id, owner, type, address, location, asking_price, 
                viewing_times, status, highest_bid, date_listed 
                FROM Property 
                WHERE type = 'Office' AND highest_bid != 0 AND delete_flag = 0  $statusCondition";

$resultProperty = mysqli_query($con, $sqlProperty);
if (!$resultProperty) {
    die('Error querying Property table: ' . mysqli_error($con));
}

// Start dropdown
echo "<br><select name='listbox' id='listbox' onchange='populate()'>";
echo "<option value='' disabled selected>Select a Property</option>";

// Fetch each property
while ($rowProperty = mysqli_fetch_assoc($resultProperty)) 
{
    $propertyId = $rowProperty['property_id'];

    // Fetch the highest bid from the Bid table
    $sqlBid = "SELECT MAX(amount) AS highest_bid FROM Bid WHERE property_id = '$propertyId'";
    $resultBid = mysqli_query($con, $sqlBid);
    $rowBid = mysqli_fetch_assoc($resultBid);
    $highestBid = $rowBid['highest_bid'] ? $rowBid['highest_bid'] : "0"; // Default to 0 if no bids

	// Update highest bid in Property table
    $sqlUpdate = "UPDATE Property SET highest_bid = '$highestBid' WHERE property_id = '$propertyId'";
    mysqli_query($con, $sqlUpdate); 
	
    // Ensure date_listed is properly formatted (DD/MM/YYYY)
    $dateListed = !empty($rowProperty['date_listed']) ? date("d/m/Y", strtotime($rowProperty['date_listed'])) : "N/A";

    // Fetch Office details
    $sqlOffice = "SELECT office_id, floor, area, layout, internet, access, 
                  telephone_system, reception, security, canteen, ownership 
                  FROM Office WHERE property_id = '$propertyId'";

    $resultOffice = mysqli_query($con, $sqlOffice);
    $rowOffice = mysqli_fetch_assoc($resultOffice) ?: array_fill_keys([
        'office_id', 'floor', 'area', 'layout', 'internet', 'access', 
        'telephone_system', 'reception', 'security', 'canteen', 'ownership'
    ], "");  // Fill missing office data with empty values

    // Merge property and office data (include formatted date_listed)
    $rowProperty['date_listed'] = $dateListed;
    $optionValue = implode(';', array_merge($rowProperty, $rowOffice, ['highest_bid' => $highestBid]));

    $eircode = $rowProperty['eircode'];
    
    echo "<option value='$optionValue'>$eircode ({$rowProperty['address']})</option>";
}

// Close dropdown and connection
echo "</select>";
mysqli_close($con);
?>
