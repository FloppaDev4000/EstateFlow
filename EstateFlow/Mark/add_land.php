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
        <a class ="button selected" href="add_land.html.php">Add a New Land Property</a>
        <a class ="button" href="delete_land.html">Delete a Land Property</a>
        <a class ="button" href="view_land.html">Amend/View a Land Property</a>
        <a class ="button" href="..\Amelia/add_office.html">Add a New Office Property</a>
        <a class ="button" href="..\Amelia/delete_office.html">Delete a New Office Property</a>
        <a class ="button" href="..\Amelia/view_office.html">Amend/View an Office Property</a>
        <a class ="button" >Exit</a>
    </div>
    
    <!-- Main Content Area -->
    <div class="content">
    <!-- Main Content Area -->
    <div class="content">
        <!-- Start form, sending info via Post to add_land.php -->
        <form action="add_land.php" method="Post">
            <!-- Set heading for the form -->
            <h1>Add a New Land Property</h1>
            <?php
        //  Note: inclusion of db.inc.php file, as we first need to connect to the db.
            include 'db.inc.php';
            // Set variables for POST
            // Generic Property Details
            $property_type = $_POST['property_type'];
            $adrs = $_POST['adrs'] . " " . $_POST['adrs2'] . " " . $_POST['adrs3'];
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
            echo "<br><h2>A Land property has been added with Property ID: " . $property_id . "</h2>";

            // Close connection
            mysqli_close($con);
        ?> 
            <div class = "formContainer">
            <fieldset>

                <legend>Property Details</legend> 
                <!-- Container for Listbox containing all clients w/ their client_id in the values-->
                <div class = "owner-listbox">
                    <label for = "owner-listbox">Property Owner: </label> 
                    <!-- Calls the php script to make the dynamic listbox and insert it into the form via an echo -->
                    <?php include 'add_land_listbox.php'; ?>
                </div>

                <div class = "inputbox">
                    <label for = "property_type">Property Type: </label><br/>
                    <!-- Set value to Land as it cannot be anything other than Land when entering a Land property, disabled the box so cannot be edited -->
                    <input type="text" name="property_type" id="property_type" value = "Land">
                </div>
    
                <!-- Container for Address -->
                <div class = "inputbox">
                    <label for ="adrs">Address: </label><br/>
                    <input type="text" name="adrs" id="adrs" required autofocus placeholder="Line 1 (Required)">
                    <input type="text" name="adrs2" id="adrs2" autofocus placeholder="Line 2 (Optional)">
                    <input type="text" name="adrs3" id="adrs3" autofocus placeholder="Line 3 (Optional)">
                </div>
    
                <!-- Container for Eircode -->
                <div class = "inputbox">
                    <label for = "eircode">Eircode: </label><br/>
                    <!-- Pattern: Eircode 1 alpha char(upper or lowercase) followed by TWO digits, any number of spaces then another alpha char and THREE digits -->
                    <input type="text" name="eircode" id="eircode" placeholder="Y21 234" pattern="[A-Za-z]?\d{2} *[A-Za-z]?\d{3}">
                </div>
                <!-- Container for Location -->
                <div class = "inputbox">
                    <label for ="location">Location: </label><br/>
                    <input type="text" name="location" id="location" required placeholder="Carlow">
                </div>
                <!-- Container for Status -->
                <div class = "inputbox">
                    <label for ="status">Status: </label><br/>
                    <input type="int" name="status" id="status" pattern="[0-1]{1}">
                </div>
                <!-- Container for Owner -->
                <div class = "inputbox">
                    <label for = "owner">Owner: </label><br/>
                    <input type="number" name="owner" id="owner" placeholder="00001">
                </div>

                <!-- Container for Highest Bid -->
                <div class = "inputbox">
                    <label for = "bid">Highest Bid: </label><br/>
                    <input type="number" name="bid" id="bid" min="1">
                </div>

                <!-- Container for Asking Price -->
                <div class = "inputbox">
                    <label for = "price">Asking Price: </label><br/>
                    <input type="number" name="price" id="price" min="1">
                </div>
                
                <!-- Container for Viewing Times -->
                <div class = "inputbox">
                    <label for = "viewing_times">Viewing Times: </label><br/>
                    <input type="text" name="viewing_times" id="viewing_times">
                </div>
                
                <!-- Container for Date Listed -->
                <div class = "inputbox">
                    <label for = "date_listed">Date Listed: </label><br/>
                    <input type="date" name="date_listed" id="date_listed" onblur="checkDate(this)">
                </div>                
                </fieldset>

                <!-- Begin Fieldset for Land Specific Details -->
                <fieldset>
                <legend>Land-Specific Details</legend>
            <br><br>

            <!-- Container for Acres -->
            <div class = "inputbox">
                <label for ="acres">Acres: </label><br/>
                <!-- Min 1 - validation that we have atleast an acre of land -->
                <input type="number" name="acres" id="acres" required placeholder="2500" min="1">
            </div>

            <br><br>

            <!-- Container for Buildings -->
            <div class = "inputbox">
                <label for = "buildings">Buildings: </label><br/>
                <input type="text" name="buildings" id="buildings" placeholder="Two large buildings, one shed">
            </div>

            <br><br>

            <!-- Container for Residence Details -->
            <div class = "inputbox">
                <label for ="details">Residence Details: </label><br/>
                <input type="text" name="details" id="details" required placeholder="4 bedroom period residence in need of repair">
            </div>

            <br><br>

            <!-- Container for Quotas -->
            <div class = "inputbox">
                <label for ="quotas">Quotas: </label><br/>
                <input type="number" name="quotas" id="quotas" placeholder="50.00" min="0" max="100">
            </div>

            <br><br>

            <!-- Container for Notes -->
            <div class = "inputbox">
                <label for = "notes">Notes: </label><br/>
                <input type="text" name="notes" id="notes" placeholder="Exceptional condition, beautiful view, next to local village">
            </div>


        </div>

                <!-- Submit/Reset buttons -->
                <div class = "myButton">
                    <input type="submit" value = "Send Form" name = "submit" class ="button" onclick="confirmCheck()"/>
                    <input type="reset" value = "Clear Form" name = "reset" class ="button"/>
                </div>
        </form>

    </div>

</body>
</html>