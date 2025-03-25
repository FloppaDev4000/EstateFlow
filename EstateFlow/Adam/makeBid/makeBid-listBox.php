<?php

// NAME:    Adam Noonan
// NUMBER:  C00299231
// FILE:    listbox file for makeBid

// connection file
include "../../db.inc.php";

//---------------------------------------CLIENT BOX

// prepare statement
$sql = "SELECT *
FROM Client
WHERE delete_flag = 0
AND buyer = 1";

// error catch for bad connection
if(!$result = mysqli_query($con, $sql))
{
    die("Error in querying the database" . mysqli_error($con));
}

// place listbox on page
echo "<div class='field listBox'>";
echo "<select name='clientBox' id='clientBox' onclick='populateClient()' required>";
echo "<option value='' selected disabled hidden>Select Client</option>
";

// fetch array from query result
while ($row=mysqli_fetch_array($result))
{
    // client stuff
    $id = $row['client_id'];
    $name = $row['name'];
    $address = $row['address'];
    $eircode = $row['eircode'];
    $phone_no = $row['phone_no'];
    $email = $row['email'];

    // put client data together w/ unique delimiter
    $total = "$id;!$name;!$address;!$eircode;!$phone_no;!$email";

	// place option tag
    echo "<option value='$total'>$name</option>
	";
}
// close select tag
echo "</select>";
echo "</div>";
//---------------------------------------PROPERTY BOX

// get id of selected clientBox item

// prepare statement
$sql2 = "SELECT
P.property_id, P.type, P.address, P.eircode, P.location, P.status, P.owner, P.highest_bid, P.asking_price, P.viewing_times, P.date_listed,
L.land_id, L.acres, L.buildings, L.residence_details, L.quotas, L.notes AS landNotes,
O.office_id, O.floor, O.area AS officeArea, O.layout, O.internet, O.access, O.telephone_system, O.reception AS officeReception, O.security, O.canteen, O.ownership,
R.residential_id, R.levels, R.reception, R.bedrooms, R.bathrooms, R.area, R.heating, R.notes, R.amenities
FROM Property P
LEFT JOIN Land L ON P.property_id = L.property_id
LEFT JOIN Office O ON P.property_id = O.property_id
LEFT JOIN Residential R ON P.property_id = R.property_id
WHERE P.delete_flag = 0;";

// error catch for bad connection
if(!$result2 = mysqli_query($con, $sql2))
{
    die("Error in querying the database" . mysqli_error($con));
}

// place selectbox on page
echo "<br><div class='field listBox'>";
echo "<select name='propertyBox' id='propertyBox' onclick='populateProperty()'required>";
echo "<option value='' selected disabled hidden>Select Property</option>
";

// fetch array from query result
while ($row=mysqli_fetch_array($result2))
{
    // property stuff
    $id = $row['property_id'];
    $address = $row['address'];
    $eircode = $row['eircode'];
    $location = $row['location'];
    $highest_bid = $row['highest_bid'];
    $asking_price = $row['asking_price'];
    $viewing_times = $row['viewing_times'];
    $type = $row['type'];

    //---------------SPECIFIC PROPERTY STUFF
    // land stuff
    $land_acres = $row['acres'];
    $land_buildings = $row['buildings'];
    $land_residence_details = $row['residence_details'];
    $land_quotas = $row['quotas'];
    $land_notes = $row['landNotes'];

    // office stuff
    $office_floor = $row['floor'];
    $office_area = $row['officeArea'];
    $office_layout = $row['layout'];
    $office_internet = $row['internet'];
    $office_access = $row['access'];
    $office_telephone_system = $row['telephone_system'];
    $office_reception = $row['officeReception'];
    $office_security = $row['security'];
    $office_canteen = $row['canteen'];
    $office_ownership = $row['ownership'];

    // residential stuff

    $owner = $row['owner'];

    // delimited property data
    $total = "$id;!$address;!$eircode;!$location;!$highest_bid;!$asking_price;!$viewing_times;!$type";

    // delimited land data
    $landStuff = "$land_acres;!$land_buildings;!$land_residence_details;!$land_quotas;!$land_notes";
    
    // delimited office data
    $officeStuff = "$office_floor;!$office_area;!$office_layout;!$office_internet;!$office_access;!$office_telephone_system;!$office_reception;!$office_security;!$office_canteen;!$office_ownership";
    
    // delimited residential data
    $residentialStuff = "";

	// different delimiter to connect all data
    echo "<option value='$owner;?$total;?$landStuff;?$officeStuff;?$residentialStuff' class='propertyOptions'>$address, $eircode</option>
	";
}
// close select tag
echo "</select>";
echo "</div>";

// close connection
mysqli_close($con);