<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add office </title> 
</head>
<body>
    <?php
        // Include database connection file
        include 'db.inc.php';

        // Set the default timezone to Coordinated Universal Time (UTC)
        date_default_timezone_set("UTC");

        // Display user-submitted data
        echo "The details sent down are: <br>";

        echo "Owner: " . $_POST['owner'] . "<br>";
        echo "Property Type: " . $_POST['type'] . "<br>";
        echo "Address: " . $_POST['address'] . "<br>";
        echo "Eircode: " . $_POST['eircode'] . "<br>";
        echo "Location: " . $_POST['location'] . "<br>";
        echo "Asking Price: " . $_POST['asking_price'] . "<br>";
        echo "Viewing Times: " . $_POST['viewing_times'] . "<br>";
        echo "Status: " . $_POST['status'] . "<br>";
        echo "Highest Bid: " . $_POST['highest_bid'] . "<br>";


        // SQL query to insert the received data into the 'Property' table
        $sql = "INSERT INTO Property (owner, type, address, eircode, location, asking_price, viewing_times, status, highest_bid, delete_flag)
        VALUES ('$_POST[owner]', '$_POST[type]', '$_POST[address]', '$_POST[eircode]', '$_POST[location]', 
        '$_POST[asking_price]', '$_POST[viewing_times]', '$_POST[status]', '$_POST[highest_bid]', '0')";

        // Execute the query and check for errors
        if (!mysqli_query($con, $sql)) {
            die("An Error in the SQL Query: " . mysqli_error($con)); // Output error message if query fails
        }

        // Display user-submitted data
        echo "The details sent down are: <br>";

        // Get the last inserted property_id
        $property_id = mysqli_insert_id($con);
        echo "Property ID: " . $property_id . "<br>";
        echo "Floor: " . $_POST['floor'] . "<br>";
        echo "Area (sqm): " . $_POST['area'] . "<br>";
        echo "Layout: " . $_POST['layout'] . "<br>";
        echo "Internet: " . $_POST['internet'] . "<br>";
        echo "Access: " . $_POST['access'] . "<br>";
        echo "Telephone System: " . $_POST['telephone_system'] . "<br>";
        echo "Reception Facilities: " . $_POST['reception'] . "<br>";
        echo "Type of Security: " . $_POST['security'] . "<br>";
        echo "Canteen Facilities: " . $_POST['canteen'] . "<br>";
        echo "Type of Ownership: " . $_POST['ownership'] . "<br>";


        // SQL query to insert the received data into the 'Property' table
        $sql = "INSERT INTO Office (property_id, floor, area, layout, internet, access, telephone_system, reception, security, canteen, ownership, delete_flag)
        VALUES ($property_id, '$_POST[floor]', '$_POST[area]', '$_POST[layout]', '$_POST[internet]', '$_POST[access]', 
        '$_POST[telephone_system]', '$_POST[reception]', '$_POST[security]', '$_POST[canteen]', '$_POST[ownership]', '0')";


        // Execute the query and check for errors
        if (!mysqli_query($con, $sql)) {
            die("An Error in the SQL Query: " . mysqli_error($con)); // Output error message if query fails
        }

        // Confirm successful record addition
        echo "<br>A record has been added for " . $_POST['owner'] ;

        // Close the database connection
        mysqli_close($con);
    ?>

    <!-- Form to return to the insert page -->
    <form action="add_office.html.php" method="POST">
        <br>
        <input type="submit" value="Return to Insert Page"/>
    </form>

</body>
</html>