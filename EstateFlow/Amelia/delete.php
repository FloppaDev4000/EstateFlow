<!-- Estate Flow - Complete Sale Page  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Sets title -->
    <title>EstateFlow - Delete an Office</title>
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
        <div class="logo">
            <a href ="..\menu.html"><img src="..\images/logo.png" alt="EstateFlow Logo"></a>
        </div>
        <a class ="button" href="add_office.html.php">Add a New Office Property</a>
        <a class ="button selected" href="delete_office.html.php">Delete an Office Property</a>
        <a class ="button" href="ammendview_office.html.php">Amend/View an Office Property</a>
        <a class ="button" id="exit" href="../menu.html">Return to Menu</a>
</div>
    
<!-- Main Content Area -->
<div class="content">
<?php 
    session_start();

//establish database connection
include 'db.inc.php';

//mark for deletion in database table (delete flag = 1)
$sql = "UPDATE Office SET delete_flag = true WHERE property_id = '$_POST[delp_id]'";

//execute query and check for errors
if (!mysqli_query($con, $sql)) 
{
    echo "Error " . mysqli_error($con);
}

$bidsql = "UPDATE Bid SET delete_flag = true WHERE property_id = '$_POST[delp_id]'";
//execute query and check for errors
if (!mysqli_query($con, $bidsql)) 
{
    echo "Error " . mysqli_error($con);
}

// Combine address fields into one string
$addressLine1 = $_POST['deladdress1'];
$addressLine2 = $_POST['deladdress2'];
$addressLine3 = $_POST['deladdress3'];

// Combine them into one address string
$combinedAddress = $addressLine1 . ", " . $addressLine2 . ", " . $addressLine3;


// Set session variables
$_SESSION["office_id"] = $_POST['delo_id'];
$_SESSION["property_id"] = $_POST['delp_id'];
$_SESSION["floor"] = $_POST['delfloor'];
$_SESSION["area"] = $_POST['delarea'];
$_SESSION["layout"] = $_POST['dellayout'];
$_SESSION["internet"] = $_POST['delinternet'];

$_SESSION["access"] = $_POST['delaccess'];
$_SESSION["telephone_system"] = $_POST['deltel'];
$_SESSION["reception"] = $_POST['delreception'];
$_SESSION["security"] = $_POST['delsec'];
$_SESSION["canteen"] = $_POST['delcanteen'];
$_SESSION["ownership"] = $_POST['delownership'];

//mark for deletion in database table (delete flag = 1)
$sql = "UPDATE Property SET delete_flag = true WHERE property_id = '$_POST[delp_id]'";

//execute query and check for errors
if (!mysqli_query($con, $sql)) 
{
    echo "Error " . mysqli_error($con);
}

// Set session variables
$_SESSION["property_id"] = $_POST['delp_id'];
$_SESSION["type"] = $_POST['deltype'];
$_SESSION["address"] = $combinedAddress;
$_SESSION["eircode"] = $_POST['deleircode'];
$_SESSION["location"] = $_POST['delloc'];

$_SESSION["status"] = $_POST['delstatus'];
$_SESSION["owner"] = $_POST['delowner'];
$_SESSION["highest_bid"] = $_POST['delhbid'];
$_SESSION["asking_price"] = $_POST['delprice'];
$_SESSION["viewing_times"] = $_POST['deltimes'];
$_SESSION["date_listed"] = $_POST['dellist'];

mysqli_close($con);
session_destroy();
?>

    <div class="formContainer">
        <!-- Redirect button -->
		<form action="delete_office.html.php" method="post">
			<input type="submit" value="Return to Previous Screen">
		</form>
    </div>
</div>
</body>
</html>
        