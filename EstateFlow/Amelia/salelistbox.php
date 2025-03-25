<?php
// Include database connection
include "db.inc.php"; 

$sqlProperty = "SELECT eircode, property_id, owner, type, address, location, asking_price, 
                viewing_times, status, highest_bid, date_listed 
                FROM Property 
                WHERE status = '1' AND delete_flag = 0 AND  highest_bid >0";

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

    // Get highest bid + client who made it
    $sqlBid = "SELECT client_id, amount AS highest_bid 
               FROM Bid 
               WHERE property_id = '$propertyId' 
               ORDER BY amount DESC 
               LIMIT 1";
    $resultBid = mysqli_query($con, $sqlBid);
    $rowBid = mysqli_fetch_assoc($resultBid);

    $highestBid = $rowBid['highest_bid'] ?? "0"; // fallback if no bids
    $rowBuyer = $rowBid ?? ['client_id' => '', 'highest_bid' => '0']; // default structure

    // Update Property table with latest highest bid
    $sqlUpdate = "UPDATE Property SET highest_bid = '$highestBid' WHERE property_id = '$propertyId'";
    mysqli_query($con, $sqlUpdate); 

    // Format date
    $dateListed = !empty($rowProperty['date_listed']) 
                    ? date("d/m/Y", strtotime($rowProperty['date_listed'])) 
                    : "N/A";
    $rowProperty['date_listed'] = $dateListed;

    // Fetch property-type specific details
    $propertyType = strtolower($rowProperty['type']);
    $typeFields = [];
    $rowType = [];

    if ($propertyType == "office") {
        $typeFields = ['office_id', 'floor', 'area', 'layout', 'internet', 'access', 
                       'telephone_system', 'reception', 'security', 'canteen', 'ownership'];
        $sqlType = "SELECT " . implode(',', $typeFields) . " FROM Office WHERE property_id = '$propertyId'";
    } elseif ($propertyType == "land") {
        $typeFields = ['land_id', 'acres', 'buildings', 'residence_details', 'quotas', 'notes'];
        $sqlType = "SELECT " . implode(',', $typeFields) . " FROM Land WHERE property_id = '$propertyId'";
    } else {
        $typeFields = ['residential_id', 'levels', 'reception', 'bedrooms', 'bathrooms', 'area', 'heating', 
                       'notes', 'amenities'];
        $sqlType = "SELECT " . implode(',', $typeFields) . " FROM Residential WHERE property_id = '$propertyId'";
    }

    $resultType = mysqli_query($con, $sqlType);
    $rowType = mysqli_fetch_assoc($resultType) ?? array_fill_keys($typeFields, "");

    // Merge all data for <option> value
    $mergedData = array_merge($rowProperty, ['highest_bid' => $highestBid], $rowType, $rowBuyer);
    $optionValue = htmlspecialchars(implode(';', $mergedData), ENT_QUOTES);

    $eircode = htmlspecialchars($rowProperty['eircode']);
    $address = htmlspecialchars($rowProperty['address']);
    
    echo "<option value='$optionValue'>$eircode ($address)</option>";
}


// Close dropdown and connection
echo "</select>";
mysqli_close($con);
?>
