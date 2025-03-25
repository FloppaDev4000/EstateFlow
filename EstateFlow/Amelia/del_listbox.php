<?php
// Include database connection
include "db.inc.php"; 

// Fetch Property details
$sqlProperty = "SELECT eircode, property_id, owner, type, address, location, asking_price, 
                viewing_times, status, highest_bid, date_listed 
                FROM Property 
                WHERE type = 'Office' AND delete_flag = 0";

$resultProperty = mysqli_query($con, $sqlProperty);
// if query fails
if (!$resultProperty) 
{
    die('Error querying Property table: ' . mysqli_error($con));
}

// Start dropdown
echo "<br><select name='listbox' id='listbox' onchange='populate()'>";
echo "<option value='' disabled selected>Select a Property</option>";

// Fetch each property
while ($rowProperty = mysqli_fetch_assoc($resultProperty)) 
{
    $propertyId = $rowProperty['property_id'];

    // Fetch Office details
    $sqlOffice = "SELECT office_id, floor, area, layout, internet, access, 
                  telephone_system, reception, security, canteen, ownership 
                  FROM Office WHERE property_id = '$propertyId'";

    $resultOffice = mysqli_query($con, $sqlOffice);
    $rowOffice = mysqli_fetch_assoc($resultOffice) ?: array_fill_keys([
        'office_id', 'floor', 'area', 'layout', 'internet', 'access', 
        'telephone_system', 'reception', 'security', 'canteen', 'ownership'
    ], "");  // Fill missing office data with empty values

	
    // Ensure date_listed is properly formatted (DD/MM/YYYY)
    $dateListed = !empty($rowProperty['date_listed']) ? date("d/m/Y", strtotime($rowProperty['date_listed'])) : "N/A";
    // Merge property and office data (include formatted date_listed)
    $rowProperty['date_listed'] = $dateListed;
    // Merge property and office data in the correct order
    $optionValue = implode(';', array_merge($rowProperty, $rowOffice));

    $eircode = $rowProperty['eircode'];
    
    echo "<option value='$optionValue'>$eircode ({$rowProperty['address']})</option>";

}

// Close dropdown and connection
echo "</select>";
mysqli_close($con);
?>
