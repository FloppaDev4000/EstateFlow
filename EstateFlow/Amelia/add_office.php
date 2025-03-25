<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Page title and metadata -->
    <title>EstateFlow - Add Office</title>
    <meta charset="UTF-8">
    <!-- External CSS stylesheets -->
    <link rel="stylesheet" href="..\menu.css">
    <link rel="stylesheet" href="office.css">
	<link rel="icon" type="image/x-icon" href="../images/icon.png">

</head>
<body>
    <!-- Top bar displaying the application name -->
    <div class="topBar">EstateFlow</div>

    <!-- Sidebar navigation menu -->
    <div class="sidebar" id="mySidebar">
        <!-- Logo that links back to the main menu -->
        <div class="logo">
            <a href ="..\menu.html"><img src="..\images/logo.png" alt="EstateFlow Logo"></a>
        </div>

        <!-- Navigation buttons -->
        <a class ="button selected" href="add_office.html.php">Add a New Office Property</a>
        <a class ="button" href="delete_office.html.php">Delete an Office Property</a>
        <a class ="button" href="ammendview_office.html.php">Amend/View an Office Property</a>
        <a class ="button" id="exit" href="../menu.html">Return to Menu</a>
    </div>
    
<!-- Main Content Area -->
<div class="content">
    <?php
        // Include database connection file
        include 'db.inc.php';

        // Set the default timezone to Coordinated Universal Time (UTC)
        date_default_timezone_set("UTC");
		
		// Combine address fields into one string
		$addressLine1 = $_POST['address_line1'];
		$addressLine2 = $_POST['address_line2'];
		$addressLine3 = $_POST['address_line3'];

		// Combine them into one address string
		$combinedAddress = $addressLine1 . ", " . $addressLine2 . ", " . $addressLine3;

        // SQL query to insert the received data into the 'Property' table
        $sql = "INSERT INTO Property (owner, type, address, eircode, location, asking_price, viewing_times, status, highest_bid, delete_flag)
        VALUES ('$_POST[id]', '$_POST[type]', '$combinedAddress', '$_POST[eircode]', '$_POST[location]', 
        '$_POST[asking_price]', '$_POST[viewing_times]', '$_POST[status]', '$_POST[highest_bid]', '0')";

        // Execute the query and check for errors
        if (!mysqli_query($con, $sql)) {
            die("An Error in the SQL Query: " . mysqli_error($con)); // Output error message if query fails
        }

        // Get the last inserted property_id
        $property_id = mysqli_insert_id($con);
	
        // SQL query to insert the received data into the 'Property' table
        $sql = "INSERT INTO Office (property_id, floor, area, layout, internet, access, telephone_system, reception, security, canteen, ownership, delete_flag)
        VALUES ($property_id, '$_POST[floor]', '$_POST[area]', '$_POST[layout]', '$_POST[internet]', '$_POST[access]', 
        '$_POST[telephone_system]', '$_POST[reception]', '$_POST[security]', '$_POST[canteen]', '$_POST[ownership]', '0')";


        // Execute the query and check for errors
        if (!mysqli_query($con, $sql)) {
            die("An Error in the SQL Query: " . mysqli_error($con)); // Output error message if query fails
        }

        // Close the database connection
        mysqli_close($con);
    ?>

    <div class="formContainer">
		<!-- Form to return to the insert page -->
		<form action="add_office.html.php" method="POST">
			<br>
			<input type="submit" value="Return to Insert Page"/>
		</form>
    </div>
</div>
</body>
</html>