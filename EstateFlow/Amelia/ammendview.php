<?php
// Include database connection
include 'db.inc.php';

// Start the session
session_start();

// Set default timezone
date_default_timezone_set('UTC');

// Convert the date format to match database format (YYYY-MM-DD)
$dbDate = date("Y-m-d", strtotime($_POST['amendlist']));

// SQL query to update the Property and Office tables
$sqlProperty = "UPDATE Property SET 
            owner = '{$_POST['amendowner']}', 
            type = '{$_POST['amendtype']}', 
            address = '{$_POST['amendaddress']}', 
            location = '{$_POST['amendlocation']}', 
            asking_price = '{$_POST['amendprice']}', 
            viewing_times = '{$_POST['amendtimes']}', 
            status = '{$_POST['amendstatus']}', 
            highest_bid = '{$_POST['amendhbid']}', 
            date_listed = '$dbDate'
        WHERE property_id = '{$_POST['amendid']}'";

// Execute the property update query
if (!mysqli_query($con, $sqlProperty)) {
    echo "Error updating Property: " . mysqli_error($con);
}

// Update Office details
$sqlOffice = "UPDATE Office SET 
            floor = '{$_POST['amendfloor']}', 
            area = '{$_POST['amendarea']}', 
            layout = '{$_POST['amendlayout']}', 
            internet = '{$_POST['amendinternet']}', 
            access = '{$_POST['amendaccess']}', 
            telephone_system = '{$_POST['amendtel']}', 
            reception = '{$_POST['amendreception']}', 
            security = '{$_POST['amendsecurity']}', 
            canteen = '{$_POST['amendcanteen']}', 
            ownership = '{$_POST['amendownership']}'
        WHERE office_id = '{$_POST['amendo_id']}'";

// Execute the office update query
if (!mysqli_query($con, $sqlOffice)) {
    echo "Error updating Office: " . mysqli_error($con);
}

// Store updated session variables (similar to delete.php)
$_SESSION["property_id"] = $_POST['amendid'];
$_SESSION["owner"] = $_POST['amendowner'];
$_SESSION["type"] = $_POST['amendtype'];
$_SESSION["address"] = $_POST['amendaddress'];
$_SESSION["location"] = $_POST['amendlocation'];
$_SESSION["status"] = $_POST['amendstatus'];
$_SESSION["highest_bid"] = $_POST['amendhbid'];
$_SESSION["asking_price"] = $_POST['amendprice'];
$_SESSION["viewing_times"] = $_POST['amendtimes'];
$_SESSION["date_listed"] = $dbDate;

$_SESSION["office_id"] = $_POST['amendo_id'];
$_SESSION["floor"] = $_POST['amendfloor'];
$_SESSION["area"] = $_POST['amendarea'];
$_SESSION["layout"] = $_POST['amendlayout'];
$_SESSION["internet"] = $_POST['amendinternet'];
$_SESSION["access"] = $_POST['amendaccess'];
$_SESSION["telephone_system"] = $_POST['amendtel'];
$_SESSION["reception"] = $_POST['amendreception'];
$_SESSION["security"] = $_POST['amendsecurity'];
$_SESSION["canteen"] = $_POST['amendcanteen'];
$_SESSION["ownership"] = $_POST['amendownership'];

// Check if rows were affected
if (mysqli_affected_rows($con) != 0) {
    echo "<h3>Record(s) updated successfully.</h3>";
    echo "<p>Property ID: {$_POST['amendid']} - {$_POST['amendaddress']}</p>";
} else {
    echo "<p>No changes were made.</p>";
}

// Close the database connection
mysqli_close($con);
?>

<!-- Redirect button -->
<form action="ammendview_office.html.php" method="post">
    <input type="submit" value="Return to Previous Screen">
</form>
