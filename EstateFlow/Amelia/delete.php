<!-- Name:                 Amelia Hamulewicz -->
<!-- Student Number:       C00296605 -->
<!-- Title:                Task 1  -->
<!-- Date:                 6 March 2025 -->  
<?php 
    session_start();
    ?><br><br>
<?php

//establish database connection
include 'db.inc.php';

//mark for deletion in database table (delete flag = 1)
$sql = "UPDATE Office SET deleted_flag = true WHERE property_id = '$_POST[delp_id]'";

//execute query and check for errors
if (!mysqli_query($con, $sql)) 
{
    echo "Error " . mysqli_error($con);
}

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
$sql = "UPDATE Property SET deleted_flag = true WHERE property_id = '$_POST[delp_id]'";

//execute query and check for errors
if (!mysqli_query($con, $sql)) 
{
    echo "Error " . mysqli_error($con);
}

// Set session variables
$_SESSION["property_id"] = $_POST['delp_id'];
$_SESSION["type"] = $_POST['deltype'];
$_SESSION["address"] = $_POST['deladdress'];
$_SESSION["eircode"] = $_POST['deleircode'];
$_SESSION["location"] = $_POST['delloc'];

$_SESSION["status"] = $_POST['delstatus'];
$_SESSION["owner"] = $_POST['delowner'];
$_SESSION["highest_bid"] = $_POST['delhbid'];
$_SESSION["asking_price"] = $_POST['delprice'];
$_SESSION["viewing_times"] = $_POST['deltimes'];
$_SESSION["date_listed"] = $_POST['dellist'];

mysqli_close($con);

// header('Location: delete.html.php');
// exit();
?>

<!-- redirect -->
<script>
    window.location = "delet_office.html.php";
</script>
        