
<!-- Estate Flow - View Land Page  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Sets title -->
    <title>EstateFlow - View Land</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="..\menu.css">
    <link rel="stylesheet" href="add_land.css">
    <script src="view_land.js"></script>
</head>
<body onload = "toggleLock()">

    <!-- Fixed Top Bar displaying the page title -->
    <div class="topBar">EstateFlow</div>
   
    <!-- Sidebar Navigation Menu -->
    <div class="sidebar" id="mySidebar">
        <!-- Logo Section inside Sidebar -->
        <div class="logo">
            <a href ="..\menu.html"><img src="..\images/logo.png" alt="EstateFlow Logo"/>
        </div>
        <!-- Navigation Links -->
        <a class ="button" href="..\Darius/add_residential.html">Add a New Resedential Property</a>
        <a class ="button" href="..\Darius/delete_residential.html">Delete a Residential Property</a>
        <a class ="button" href="..\Darius/view_residential.html">Amend/View a Residential Property</a>
        <a class ="button" href="add_land.html.php">Add a New Land Property</a>
        <a class ="button" href="delete_land.html.php">Delete a Land Property</a>
        <a class ="button selected" href="view_land.html.php">Amend/View a Land Property</a>
        <a class ="button" href="..\Amelia/add_office.html">Add a New Office Property</a>
        <a class ="button" href="..\Amelia/delete_office.html">Delete a New Office Property</a>
        <a class ="button" href="..\Amelia/view_office.html">Amend/View an Office Property</a>
        <a class ="button" >Exit</a>
    </div>
    
   <!-- Main Content Area -->
   <div class="content">
    <!-- Start form, sending info via Post to add_land.php -->
    <form action="view_land.php" onsubmit="return confirmCheck()" method="Post">
        <!-- Set heading for the form -->
        <h1>Amend a Land Property</h1>

		<!-- Name:  Mark Lambert, Student ID:   C00192497, Purpose: AmendView.php 12/2/2025 -->
<?php
    include 'db.inc.php';
    date_default_timezone_set('UTC');
    
    $property_type = $_POST['property_type'];
    $adrs = $_POST['adrs'] . " " . $_POST['adrs2'] . " " . $_POST['adrs3'];
    $eircode = $_POST['eircode'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $owner = $_POST['owner'];
    $price = $_POST['price'];
    $bid = $_POST['bid'];
    $viewing_times = $_POST['viewing_times'];

    // Land-Specific Details
    $acres = $_POST['acres'];
    $buildings = $_POST['buildings'];
    $details = $_POST['details'];
    $quotas = $_POST['quotas'];
    $notes = $_POST['notes'];
	$ownerName = $_POST['ownerName'];

    // INSERT statement for the Property table
    $propSQL = "UPDATE Property SET address = '$adrs',
														eircode = '$eircode',
														location = '$location',
														status = '$status',
														highest_bid = $bid,
														asking_price = $price,
														viewing_times = '$viewing_times' WHERE property_id = $_POST[property_id]";
                                                
    $landSQL =  "UPDATE Land SET acres = $acres,
                                buildings = '$buildings',
                                residence_details = '$details',
                                quotas = $quotas,
                                notes = '$notes' WHERE land_id = $_POST[id]";

    $clientSQL = "UPDATE Client SET name = '$ownerName' WHERE client_ID = '{$_POST['owner']}'";


    // If there's a problem with the query
    if(!mysqli_query($con, $propSQL))
    {
        echo "There was an error with your query: " . mysqli_error();
    }
    // Otherwise
    else
    {
        // So long as AT LEAT 1 row was affected, we will execute the update
        if(mysqli_affected_rows($con) !=0)
        {
            echo mysqli_affected_rows($con) . " record(s) updated <br>";
        }
        // Otherwise, the user didn't input anything new, so let them know that the detials have stayed the same
        else
        {
            echo "No records were changed";
        }
    }
        // If there's a problem with the query
        if(!mysqli_query($con, $landSQL))
        {
            echo "There was an error with your query: " . mysqli_error();
        }
        // Otherwise
        else
        {
            // So long as AT LEAT 1 row was affected, we will execute the update
            if(mysqli_affected_rows($con) !=0)
            {
                echo mysqli_affected_rows($con) . " record(s) updated <br>";
            }
            // Otherwise, the user didn't input anything new, so let them know that the detials have stayed the same
            else
            {
                echo "No records were changed";
            }
        }
            // If there's a problem with the query
    if(!mysqli_query($con, $clientSQL))
    {
        echo "There was an error with your query: " . mysqli_error();
    }
    // Otherwise
    else
    {
        // So long as AT LEAT 1 row was affected, we will execute the update
        if(mysqli_affected_rows($con) !=0)
        {
            echo mysqli_affected_rows($con) . " record(s) updated <br>";
        }
        // Otherwise, the user didn't input anything new, so let them know that the detials have stayed the same
        else
        {
            echo "No records were changed";
        }
    }

    mysqli_close($con);
    ?>
    <!-- End script -->

    <!-- Form to go back to the Amend/View screen -->
    <form action = "AmendView.html.php" method = "post">

    <input type = "submit" value = "Return to Previous Screen">
    </form>
		
		
        <div class = "formContainer">
        <fieldset>

            <legend>Amend a Land Property</legend>

            <!-- Container for Listbox containing all clients w/ their client_id in the values-->
            <div class = "view-listbox">
                <label for = "view-listbox">Land Property: </label> 
                <!-- Calls the php script to make the dynamic listbox and insert it into the form via an echo -->
                <?php include 'view_land_listbox.php'; ?>
            </div>

            <div class = "inputbox">
                    <label for = "property_type">Property Type: </label><br/>
                    <!-- Set value to Land as it cannot be anything other than Land when entering a Land property, disabled the box so cannot be edited -->
                    <input type="text" name="property_type" id="property_type" value = "Land">
                </div>
    

    
                <!-- Container for Eircode -->
                <div class = "inputbox">
                    <label for = "eircode">Eircode: </label><br/>
                    <!-- Pattern: Eircode 1 alpha char(upper or lowercase) followed by TWO digits, any number of spaces then another alpha char and THREE digits -->
                    <input type="text" name="eircode" id="eircode" required placeholder="Y21 234" pattern="[A-Za-z]?\d{2} *[A-Za-z]?\d{3}">
                </div>
                <!-- Container for Location -->
                <div class = "inputbox">
                    <label for ="location">Location: </label><br/>
                    <input type="text" name="location" id="location" required placeholder="Carlow">
                </div>
                <!-- Container for Status -->
                <div class = "inputbox">
                    <label for ="status">Status: </label><br/>
                    <select name = "status" id = status> 
                        <option value = "0">Not Sold</option>
                        <option value = "1">Sold</option>
                    </select>
                </div>
                <!-- Container for Owner -->
                <div class = "inputbox">
                    <label for = "ownerName">Owner: </label><br/>
                    <input type="text" name="ownerName" id="ownerName">
                </div>

                <!-- Container for Highest Bid -->
                <div class = "inputbox">
                    <label for = "bid">Highest Bid: </label><br/>
                    <input type="number" name="bid" id="bid" min="1" required>
                </div>

                <!-- Container for Asking Price -->
                <div class = "inputbox">
                    <label for = "price">Asking Price: </label><br/>
                    <input type="number" name="price" id="price" min="1" required>
                </div>
                
                <!-- Container for Viewing Times -->
                <div class = "inputbox">
                    <label for = "viewing_times">Viewing Times: </label><br/>
                    <input type="text" name="viewing_times" id="viewing_times" placeholder= "Weekends 12pm - 5pm" required>
                </div>
                             
                </fieldset>
                <!-- Begin Fieldset for Land Specific Details -->
                <fieldset>
                <legend>Land-Specific Details</legend>

                            <!-- Container for Address -->
                <div class = "inputbox">
                    <label for ="adrs">Address: </label><br/>
                    <input type="text" name="adrs" id="adrs" required autofocus placeholder="Line 1 (Required)"> <br><br>
                    <input type="text" name="adrs2" id="adrs2" autofocus placeholder="Line 2 (Optional)"> <br><br>
                    <input type="text" name="adrs3" id="adrs3" autofocus placeholder="Line 3 (Optional)"> 
                </div>

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
                <input type="text" name="buildings" id="buildings" required placeholder="Two large buildings, one shed">
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
                <input type="number" name="quotas" id="quotas" required placeholder="50" min="0" max="10000">
            </div>

            <br><br>

            <!-- Container for Notes -->
            <div class = "inputbox">
                <label for = "notes">Notes: </label><br/>
                <input type="text" name="notes" id="notes" placeholder="Exceptional condition, beautiful view, next to local village">
            </div>
					
			            <!-- Container for Owner ID - Hidden, as ID is only needed when updating to the correct entry in table -->
            <div class = "inputbox">
                <input type="number" name="owner" id="owner" hidden>
            </div>		

			            <!-- Container for Property ID - Hidden, as ID is only needed when updating to the correct entry in table -->
            <div class = "inputbox">

                <input type="number" name="property_id" id="property_id" hidden>
            </div>
					
			            <!-- Container for Land ID - Hidden, as ID is only needed when updating to the correct entry in table -->
            <div class = "inputbox">

                <input type="number" name="id" id="id" hidden>
            </div>		

        </div>

                <!-- Submit/Reset buttons -->
                <div class = "myButton">
                    <input type="submit" value = "Update Record" name = "submit" class ="button" />
                    <input type="reset" value = "Reset" name = "reset" class ="button"/>
                </div>
        </form>

    </div>

</body>
</html>
