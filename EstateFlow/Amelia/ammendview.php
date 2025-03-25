<!-- Estate Flow - Complete Sale Page  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Sets title -->
    <title>EstateFlow - Ammend/View a Sale</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="..\menu.css">
	<link rel="stylesheet" href="office.css">
	<link rel="icon" type="image/x-icon" href="../images/icon.png">
</head>
<body>

<!-- Fixed Top Bar displaying the page title -->
<div class="topBar">EstateFlow</div>

<!-- Sidebar Navigation Menu -->
<div class="sidebar" id="mySidebar">
    <!-- Logo Section inside Sidebar -->
    <div class="logo">
            <a href ="..\menu.html"><img src="..\images/logo.png" alt="EstateFlow Logo"></a>
        </div>
        <a class ="button" href="add_office.html.php">Add a New Office Property</a>
        <a class ="button" href="delete_office.html.php">Delete an Office Property</a>
        <a class ="button selected" href="ammendview_office.html.php">Amend/View an Office Property</a>
        <a class ="button" id="exit" href="../menu.html">Return to Menu</a>
</div>
    
<!-- Main Content Area -->
<div class="content"><?php
// Include database connection

include 'db.inc.php';

// Start the session
session_start();

// Set default timezone
date_default_timezone_set('UTC');


// **VALIDATE PROPERTY ID BEFORE FETCHING DATE**
if (!isset($_POST['amendid']) || empty($_POST['amendid'])) {
    die("Error: Property ID is missing or empty.");
}

// Combine address fields into one string
$addressLine1 = $_POST['amendaddress1'];
$addressLine2 = $_POST['amendaddress2'];
$addressLine3 = $_POST['amendaddress3'];

// Combine them into one address string
$combinedAddress = $addressLine1 . ", " . $addressLine2 . ", " . $addressLine3;

// SQL query to update the Property and Office tables
$sqlProperty = "UPDATE Property SET 
            owner = '{$_POST['amendowner']}', 
            type = '{$_POST['amendtype']}', 
            address = '$combinedAddress', 
            location = '{$_POST['amendlocation']}', 
            asking_price = '{$_POST['amendprice']}', 
            viewing_times = '{$_POST['amendtimes']}', 
            status = '{$_POST['amendstatus']}', 
            highest_bid = '{$_POST['amendhbid']}' 
        WHERE property_id = '{$_POST['amendid']}'";

// Execute the property update query
if (!mysqli_query($con, $sqlProperty)) {
    echo "Error updating Property: " . mysqli_error($con);
}

$affectedProperty = mysqli_affected_rows($con);

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

// Get affected rows separately
$affectedOffice = mysqli_affected_rows($con);

// Store updated session variables (similar to delete.php)
$_SESSION["property_id"] = $_POST['amendid'];
$_SESSION["owner"] = $_POST['amendowner'];
$_SESSION["type"] = $_POST['amendtype'];
$_SESSION["address"] = $combinedAddress;
$_SESSION["location"] = $_POST['amendlocation'];
$_SESSION["status"] = $_POST['amendstatus'];
$_SESSION["highest_bid"] = $_POST['amendhbid'];
$_SESSION["asking_price"] = $_POST['amendprice'];
$_SESSION["viewing_times"] = $_POST['amendtimes'];

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


if ($affectedProperty != 0 || $affectedOffice != 0) {
    echo "<h3>Record(s) updated successfully.</h3>";
    echo "<p>Property ID: {$_POST['amendid']} - {$combinedAddress}</p>";
} else {
    echo "<p>No changes were made.</p>";
}


// **Fetch the highest bid for the selected property**
$propertyId = $_POST['amendid'];
$sqlHighestBid = "SELECT MAX(amount) AS highest_bid FROM Bid WHERE property_id = '$propertyId'";
$resultHighestBid = mysqli_query($con, $sqlHighestBid);

if ($resultHighestBid) {
    $row = mysqli_fetch_assoc($resultHighestBid);
    $highestBid = $row['highest_bid'] ? $row['highest_bid'] : "No bids yet";
    echo "<p><strong>Highest Bid for Property ID $propertyId:</strong> €$highestBid</p>";
} else {
    echo "<p>Error fetching highest bid: " . mysqli_error($con) . "</p>";
}



// Close the database connection
mysqli_close($con);
?>

<!-- Redirect button -->
    <div class="formContainer">
        <!-- Form to return to the insert page -->
        <form action="ammendview_office.html.php" method="post">
			<input type="submit" value="Return to Previous Screen">
		</form>
    </div>
</div>
</body>
</html>
