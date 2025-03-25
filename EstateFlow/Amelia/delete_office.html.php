<?php session_start(); ?>

<!-- Estate Flow - Complete Sale Page  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Sets title -->
    <title>EstateFlow - Complete a Sale</title>
    <meta charset="UTF-8">
    <!-- external style sheets -->
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
        <a class ="button" href="add_office.html.php">Add a New Office Property</a>
        <a class ="button selected" href="delete_office.html.php">Delete an Office Property</a>
        <a class ="button" href="ammendview_office.html.php">Amend/View an Office Property</a>
        <a class ="button" id="exit" href="../menu.html">Return to Menu</a>
    </div>
    <div class="content">
        <script>
            // function to populate the form
            function populate() 
            {
                // Get the dropdown element
                var sel = document.getElementById("listbox");
                var result;

                // Get the value of the selected option
                result = sel.options[sel.selectedIndex].value;
                
                // Split the retrieved value into individual details
                var propertyDetails = result.split(';');

                // Display the selected details on the page
                document.getElementById("display").innerHTML = "";

                // Assign values to form fields
                document.getElementById("deleircode").value = propertyDetails[0]; // Property ID
                document.getElementById("delp_id").value = propertyDetails[1]; // Property ID
                document.getElementById("delowner").value = propertyDetails[2]; // Owner Name
                document.getElementById("deltype").value = propertyDetails[3]; // Property Type
                document.getElementById("deladdress1").value = propertyDetails[4].split(',')[0]; // Address Line 1
				document.getElementById("deladdress2").value = propertyDetails[4].split(',')[1]; // Address Line 2
				document.getElementById("deladdress3").value = propertyDetails[4].split(',')[2]; // Postal Codes
                document.getElementById("delloc").value = propertyDetails[5]; // Location
                document.getElementById("delprice").value = propertyDetails[6]; // Asking Price
                document.getElementById("deltimes").value = propertyDetails[7]; // Viewing Times
				document.getElementById("delstatus").value = propertyDetails[8];
                document.getElementById("delhbid").value = propertyDetails[9]; // Highest Bid
                document.getElementById("dellist").value = propertyDetails[10]; // Date Listed

                document.getElementById("delo_id").value = propertyDetails[11]; // Office ID
                document.getElementById("delfloor").value = propertyDetails[12]; // Floor
                document.getElementById("delarea").value = propertyDetails[13]; // Area (sqm)
                document.getElementById("dellayout").value = propertyDetails[14]; // Layout
                document.getElementById("delinternet").value = propertyDetails[15]; // Internet
                document.getElementById("delaccess").value = propertyDetails[16]; // Access
                document.getElementById("deltel").value = propertyDetails[17]; // Telephone System
                document.getElementById("delreception").value = propertyDetails[18]; // Reception Facilities
                document.getElementById("delsec").value = propertyDetails[19]; // Security Type
                document.getElementById("delcanteen").value = propertyDetails[20]; // Canteen
                document.getElementById("delownership").value = propertyDetails[21]; // Ownership Type
				
				// Check if there is a bid
				var highestBid = parseFloat(propertyDetails[9]);  // Highest bid is in the 10th index
				if (highestBid > 0) {
					// Display a warning message if there is a bid
					document.getElementById("bidWarning").innerHTML = "Warning: This property has a bid associated with it. If you delete the property, all associated bids will also be deleted.";
				} 
                else 
                {
					document.getElementById("bidWarning").innerHTML = "";  // Clear the warning if no bid
				}
				
				// Check if there is a bid
				var highestBid = parseFloat(propertyDetails[9]);  // Highest bid is in the 10th index
				if (highestBid > 0) {
					// Show an alert if there is a bid
					alert("Warning: This property has a bid associated with it. If you delete the property, all associated bids will also be deleted.");
				}
            }

            // check if user wants to submit the sale as completed
            function confirmCheck() 
            {
                var response = confirm("Are you sure you want to delete the property?");
                
                // if yes
                if (response) 
                {
                    // Enable form fields for submission
					document.getElementById("deleircode").disabled = false;
                    document.getElementById("delp_id").disabled = false;
                    document.getElementById("delowner").disabled = false;
                    document.getElementById("deltype").disabled = false;
                    document.getElementById("deladdress1").disabled = false;
					document.getElementById("deladdress2").disabled = false;
					document.getElementById("deladdress3").disabled = false;
                    document.getElementById("delloc").disabled = false;
                    document.getElementById("delprice").disabled = false;
                    document.getElementById("deltimes").disabled = false;
                    document.getElementById("delstatus").disabled = false;
                    document.getElementById("delhbid").disabled = false;
                    document.getElementById("dellist").disabled = false;

                    document.getElementById("delo_id").disabled = false;
                    document.getElementById("delfloor").disabled = false;
                    document.getElementById("delarea").disabled = false;
                    document.getElementById("dellayout").disabled = false;
                    document.getElementById("delinternet").disabled = false;
                    document.getElementById("delaccess").disabled = false;
                    document.getElementById("deltel").disabled = false;
                    document.getElementById("delreception").disabled = false;
                    document.getElementById("delsec").disabled = false;
                    document.getElementById("delcanteen").disabled = false;
                    document.getElementById("delownership").disabled = false;

                    return true; // Submit form
                } 
                else 
                {
                    // Restore original values without making fields editable
                    populate();
                    return false; // Cancel submission
                }
            }

        </script>

		<!-- In delete_office.html.php, add a div for bid warning -->
		<p id="bidWarning" style="color: red;"></p>

        <p id="display"></p>

        <form action="delete.php" method="POST" onsubmit="return confirmCheck();">
            <h2>Delete an Office Property</h2> 

            <!-- Instructions for the user -->
            <h4>Please select an Office to mark for deletion..</h4>
            <br>
            <!-- Include the PHP file that generates the dropdown list -->
            <?php include 'del_listbox.php'; ?>

            <div class="formContainer">
                <!-- Property Details -->
                <fieldset>
                    <legend>Property Details</legend>
                    <!-- Eircode -->
                    <p>
                        <label for="deleircode">Eircode: </label>
                        <input type="text" name="deleircode" id="deleircode" readonly disabled/>
                    </p>
                    
                    <!-- Property Id -->
                    <p><label for="delp_id">Property ID: </label>
                    <input type="number" name="delp_id" id="delp_id" readonly disabled/></p>

                    <!-- Owner -->
                    <p><label for="delowner">Owner: </label>
                    <input type="text" name="delowner" id="delowner" required disabled/></p>

                    <!-- Property Type -->
                    <p><label for="deltype">Property Type: </label>
                    <input type="text" name="deltype" id="deltype" readonly disabled/></p>

                    <!-- Address -->
    				<p><label for="deladdress1">Address: </label>
    				<input type="text" name="deladdress1" id="deladdress1"  required disabled/> </p>
    				<p><input type="text" name="deladdress2" id="deladdress2" required disabled/> </p>
    				<p><input type="text" name="deladdress3" id="deladdress3" required disabled/> </p>
				
                    <!-- Location -->
                    <p><label for="delloc">Location: </label>
                    <input type="text" name="delloc" id="delloc"  required disabled/></p>

                    <!-- Price -->
                    <p><label for="delprice">Asking Price: </label>
                    <input type="number" step="0.01" name="delprice" id="delprice" required disabled/></p>

                    <!-- Viewing times -->
                    <p><label for="deltimes">Viewing Times: </label>
                    <input type="text" name="deltimes" id="deltimes" required disabled/></p>

                    <!-- Status -->
                    <p>
                        <label for="delstatus">Status: </label>
                        <select name="delstatus" id="delstatus" readonly disabled>
                            <option value="0">Sale</option>
                            <option value="1">Sale Agreed</option>
                            <option value="2">Sale Completed</option>
                        </select>
                    </p>

                    <!-- Highest Bid -->
                    <p><label for="delhbid">Highest Bid: </label>
                    <input type="number" step="0.01" name="delhbid" id="delhbid" readonly disabled/></p>

                    <!-- Date Listed -->
                    <p><label for="dellist">Date Listed: </label>
                    <input type="text" name="dellist" id="dellist" required disabled/></p>
                </fieldset>
                
                <!-- Office Details -->
                <fieldset>
                    <legend>Office Details</legend>
                    <!-- Office Id -->
                    <p><label for="delo_id">Office ID: </label>
                    <input type="number" name="delo_id" id="delo_id" readonly disabled/></p>

                    <!-- Floor -->
                    <p><label for="delfloor">Floor: </label>
                    <input type="text" name="delfloor" id="delfloor"  required disabled/></p>

                    <!-- area -->
                    <p><label for="delarea">Area (sqm): </label>
                    <input type="number" step="0.01" name="delarea" id="delarea" required disabled/></p>

                    <!-- layout -->
                    <p><label for="dellayout">Layout: </label>
                    <input type="text" name="dellayout" id="dellayout"  required disabled/></p>

                    <!-- internet -->
                    <p><label for="delinternet">Internet: </label>
                    <input type="text" name="delinternet" id="delinternet" required disabled/></p>

                    <!-- access -->
                    <p><label for="delaccess">Access: </label>
                    <input type="text" name="delaccess" id="delaccess"  required disabled/></p>

                    <!-- Telephone System -->
                    <p><label for="deltel">Telephone System: </label>
                    <input type="text" name="deltel" id="deltel" required disabled/></p>

                    <!-- Reception -->
                    <p><label for="delreception">Reception Facilities: </label>
                    <input type="text" name="delreception" id="delreception" required disabled/></p>

                    <!-- Security -->
                    <p><label for="delsec">Type of Security: </label>
                    <input type="text" name="delsec" id="delsec" required disabled/></p>

                    <!-- Canteen -->
                    <p><label for="delcanteen">Canteen Facilities: </label>
                    <input type="text" name="delcanteen" id="delcanteen"  required disabled/></p>

                    <!-- Ownership -->
                    <p><label for="delownership">Type of Ownership: </label>
                    <input type="text" name="delownership" id="delownership"  required disabled/></p>
                </fieldset>
            </div>
            <br>
            <div class="myButton">
                <input type="submit" value="Delete the record">
            </div>
        </form>

        
        <?php
            //if an ID is chosen
            if (isset($_SESSION["eircode"])) 
            { 
                //output message
                echo "<h1 class='myMessage'>Record deleted for Property Id: " 
                . $_SESSION["property_id"] . "</h1>"; 

            }
            //end session
            session_destroy();
        ?>
    </div>   
</body>        
</html>