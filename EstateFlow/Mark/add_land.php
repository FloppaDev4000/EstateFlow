<!-- Estate Flow - Add Land Page  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Sets title -->
    <title>EstateFlow - Add Land</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="..\menu.css">
    <link rel="stylesheet" href="add_land.css">

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
        <!-- Navigation Links -->
        <a class ="button" href="..\Darius/add_residential.html">Add a New Resedential Property</a>
        <a class ="button" href="..\Darius/delete_residential.html">Delete a Residential Property</a>
        <a class ="button" href="..\Darius/view_residential.html">Amend/View a Residential Property</a>
        <a class ="button selected" href="add_land.html">Add a New Land Property</a>
        <a class ="button" href="delete_land.html">Delete a Land Property</a>
        <a class ="button" href="view_land.html">Amend/View a Land Property</a>
        <a class ="button" href="..\Amelia/add_office.html">Add a New Office Property</a>
        <a class ="button" href="..\Amelia/delete_office.html">Delete a New Office Property</a>
        <a class ="button" href="..\Amelia/view_office.html">Amend/View an Office Property</a>
        <a class ="button" >Exit</a>
    </div>
    
    <!-- Main Content Area -->
    <div class="content">
        <?php
        //  Note: inclusion of db.inc.php file, as we first need to connect to the db.
        // All variables within this file are within scope for this insert.php script
            include 'db.inc.php';
            echo"The details sent down are: <br>";
            // Set variables for POST
            // Generic Property Details
            $property_type = $_POST['property_type'];
            $adrs = $_POST['adrs'];
            $eircode = $_POST['eircode'];
            $location = $_POST['location'];
            $status = $_POST['status'];
            $owner = $_POST['owner'];
            $price = $_POST['price'];
            $bid = $_POST['bid'];
            $viewing_times = $_POST['viewing_times'];
            $date_listed = date_create($_POST['date_listed']);
            $date_listed = date_format($date_listed, "Y-m-d");
            // Land-Specific Details
            $property_id;
            $acres = $_POST['acres'];
            $buildings = $_POST['buildings'];
            $details = $_POST['details'];
            $quotas = $_POST['quotas'];
            $notes = $_POST['notes'];

            // INSERT statement for the Property table
            $sql = "INSERT INTO Property (type,address,eircode,location,status,owner,highest_bid,asking_price,viewing_times,date_listed) 
            VALUES ('$property_type','$adrs','$eircode','$location','$status','$owner','$price','$bid','$viewing_times','$date_listed')";

            // If the SQL query fails
            if(!mysqli_query($con,$sql))
            {
                // Print the following message with the last occured error that occured within the connection
                die ("An Error in the SQL Query: " .mysqli_error($con));
            }

            // Gets the last AUTO ID value inserted, meaning we don't have to prompt the user for an input on what the property id of this land property is
            $property_id = mysqli_insert_id($con);

            // String sql is assigned the Insert statement for DB
            $sql = "INSERT INTO Land (property_id,acres,buildings,residence_details, quotas, notes) 
            VALUES ('$property_id','$acres','$buildings','$details','$quotas','$notes')";

            // If the SQL query fails
            if(!mysqli_query($con,$sql))
            {
                // Print the following message with the last occured error that occured within the connection
                die ("An Error in the SQL Query: " .mysqli_error($con));
            }


            // Otherwise, insert success
            echo "<br>A record has been added for " . $property_id;

            // Close connection
            mysqli_close($con);
        ?>    


        <!-- Form to bring user back to insert another Person -->
        <form action = "add_land.html.php" method = "POST">
            <br>
            <input type="submit" value = "Return to Land Page"/>
        </form>

    </div>

</body>
</html>