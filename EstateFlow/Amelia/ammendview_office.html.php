<!-- Name:                 Amelia Hamulewicz -->
<!-- Student Number:       C00296605 -->
<!-- Title:                Task 2  -->
<!-- Date:                 26 February 2025 -->

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="..\menu.css">
    <link rel="stylesheet" href="office_form.css">
	<script src="office.js"></script>
    </head>

    <body>
    <div class="topBar">EstateFlow</div>
    <div class="sidebar" id="mySidebar">
        <div class="logo">
            <a href ="..\menu.html"><img src="..\images/logo.png" alt="EstateFlow Logo"></a>
        </div>
        <a class ="button" href="..\Darius/add_residential.html.php">Add a New Residential Property</a>
        <a class ="button" href="..\Darius/delete_residential.html.php">Delete a Residential Property</a>
        <a class ="button" href="..\Darius/view_residential.html.php">Amend/View a Residential Property</a>
        <a class ="button" href="..\Mark/add_land.html.php">Add a New Land Property</a>
        <a class ="button" href="..\Mark/delete_land.html.php">Delete a Land Property</a>
        <a class ="button" href="..\Mark/view_land.html">Amend/View a Land Property</a>
        <a class ="button" href="add_office.html.php">Add a New Office Property</a>
        <a class ="button" href="delete_office.html.php">Delete an Office Property</a>
        <a class ="button selected" href="view_office.html.php">Amend/View an Office Property</a>
        <a class ="button" >Exit</a>
    </div>
    <div class="content">
        <!-- Header for the page -->
        <h1>Amend/View an Office</h1>
        <br>
        <!-- Instructions for the user -->
        <h4>Please select an Office and then click the amend button if you wish to update</h4>
        <br>
        <!-- Include the PHP file that generates the dropdown list -->
        <?php include 'listbox.php'; ?>

        <script>
            /**
             * Function to populate the form fields with selected person's details.
             * This function is triggered when an item is selected from the dropdown list.
             */
            function populate() 
            {
                // Get the dropdown element
                var sel = document.getElementById("listbox");
                var result;

                // Get the value of the selected option
                result = sel.options[sel.selectedIndex].value;
                
                // Split the retrieved value into individual details
                var propertyDetails = result.split(',');

                // Display the selected details on the page
                document.getElementById("display").innerHTML = "The details of the selected property are: " + result;

                // Assign values to form fields

				document.getElementById("amendid").value = propertyDetails[1]; // Property ID
				document.getElementById("amendowner").value = propertyDetails[2]; // Owner Name
				document.getElementById("amendtype").value = propertyDetails[3]; // Property Type
				document.getElementById("amendaddress").value = propertyDetails[4]; // Address
				document.getElementById("amendlocation").value = propertyDetails[5]; // Location
				document.getElementById("amendprice").value = propertyDetails[6]; // Asking Price
				document.getElementById("amendtimes").value = propertyDetails[7]; // Viewing Times
				document.getElementById("amendstatus").value = propertyDetails[8]; // Convert Status Number to Text
				document.getElementById("amendhbid").value = propertyDetails[9]; // Highest Bid
				document.getElementById("amendlist").value = propertyDetails[10]; // Date Listed

				document.getElementById("amendo_id").value = propertyDetails[11]; // Office ID
				document.getElementById("amendfloor").value = propertyDetails[12]; // Floor
				document.getElementById("amendarea").value = propertyDetails[13]; // Area (sqm)
				document.getElementById("amendlayout").value = propertyDetails[14]; // Layout
				document.getElementById("amendinternet").value = propertyDetails[15]; // Internet
				document.getElementById("amendaccess").value = propertyDetails[16]; // Access
				document.getElementById("amendtel").value = propertyDetails[17]; // Telephone System
				document.getElementById("amendreception").value = propertyDetails[18]; // Reception Facilities
				document.getElementById("amendsecurity").value = propertyDetails[19]; // Security Type
				document.getElementById("amendcanteen").value = propertyDetails[20]; // Canteen
				document.getElementById("amendownership").value = propertyDetails[21]; // Ownership Type

            }
            /**
             * Function to toggle the form fields between editable and read-only.
             * Triggered when the "Amend Details" button is clicked.
             */
            function toggleLock() 
            {
                
                // Check if the button text is "Amend Details"
                if (document.getElementById("amendViewbutton").value == "Amend Details") 
                {
                    // Enable form fields for submission
                    document.getElementById("amendid").disabled = false; // Property ID
                    document.getElementById("amendowner").disabled = false; // Owner Name
                    document.getElementById("amendtype").disabled = false; // Property Type
                    document.getElementById("amendaddress").disabled = false; // Address
                    document.getElementById("amendlocation").disabled = false; // Location
                    document.getElementById("amendprice").disabled = false; // Asking Price
                    document.getElementById("amendtimes").disabled = false; // Viewing Times
                    document.getElementById("amendstatus").disabled = false; // Status
                    document.getElementById("amendhbid").disabled = false; // Highest Bid
                    document.getElementById("amendlist").disabled = false; // Date Listed

                    document.getElementById("amendo_id").disabled = false; // Office ID
                    document.getElementById("amendfloor").disabled = false; // Floor
                    document.getElementById("amendarea").disabled = false; // Area (sqm)
                    document.getElementById("amendlayout").disabled = false; // Layout
                    document.getElementById("amendinternet").disabled = false; // Internet
                    document.getElementById("amendaccess").disabled = false; // Access
                    document.getElementById("amendtel").disabled = false; // Telephone System
                    document.getElementById("amendreception").disabled = false; // Reception Facilities
                    document.getElementById("amendsecurity").disabled = false; // Security Type
                    document.getElementById("amendcanteen").disabled = false; // Canteen
                    document.getElementById("amendownership").disabled = false; // Ownership Type

                    document.getElementById("amendViewbutton").value = "View Details"; // Change button text
                } 
                else 
                {
                    // Disable the form fields (read-only mode)
                    // If switching back to "View Details", repopulate with original data
                    populate(); // Repopulate with original values
                    // Enable form fields for submission
                    document.getElementById("amendid").disabled = true; // Property ID
                    document.getElementById("amendowner").disabled = true; // Owner Name
                    document.getElementById("amendtype").disabled = true; // Property Type
                    document.getElementById("amendaddress").disabled = true; // Address
                    document.getElementById("amendlocation").disabled = true; // Location
                    document.getElementById("amendprice").disabled = true; // Asking Price
                    document.getElementById("amendtimes").disabled = true; // Viewing Times
                    document.getElementById("amendstatus").disabled = true; // Status
                    document.getElementById("amendhbid").disabled = true; // Highest Bid
                    document.getElementById("amendlist").disabled = true; // Date Listed

                    document.getElementById("amendo_id").disabled = true; // Office ID
                    document.getElementById("amendfloor").disabled = true; // Floor
                    document.getElementById("amendarea").disabled = true; // Area (sqm)
                    document.getElementById("amendlayout").disabled = true; // Layout
                    document.getElementById("amendinternet").disabled = true; // Internet
                    document.getElementById("amendaccess").disabled = true; // Access
                    document.getElementById("amendtel").disabled = true; // Telephone System
                    document.getElementById("amendreception").disabled = true; // Reception Facilities
                    document.getElementById("amendsecurity").disabled = true; // Security Type
                    document.getElementById("amendcanteen").disabled = true; // Canteen
                    document.getElementById("amendownership").disabled = true; // Ownership Type

                    document.getElementById("amendViewbutton").value = "Amend Details"; // Change button text back
                }
            }

            /**
             * Function to confirm the user's intent to save changes.
             * This function is triggered when the form is submitted.
             * Returns true if the user confirms, otherwise prevents form submission.
             */
            function confirmCheck() 
            {
                var response;
                response = confirm('Are you sure you want to save these changes?');

                if (response) 
                {
                    // Enable all fields before submitting (so they are included in POST data)
                    document.getElementById("amendid").disabled = false; // Property ID
                    document.getElementById("amendowner").disabled = false; // Owner Name
                    document.getElementById("amendtype").disabled = false; // Property Type
                    document.getElementById("amendaddress").disabled = false; // Address
                    document.getElementById("amendlocation").disabled = false; // Location
                    document.getElementById("amendprice").disabled = false; // Asking Price
                    document.getElementById("amendtimes").disabled = false; // Viewing Times
                    document.getElementById("amendstatus").disabled = false; // Status
                    document.getElementById("amendhbid").disabled = false; // Highest Bid
                    document.getElementById("amendlist").disabled = false; // Date Listed

                    document.getElementById("amendo_id").disabled = false; // Office ID
                    document.getElementById("amendfloor").disabled = false; // Floor
                    document.getElementById("amendarea").disabled = false; // Area (sqm)
                    document.getElementById("amendlayout").disabled = false; // Layout
                    document.getElementById("amendinternet").disabled = false; // Internet
                    document.getElementById("amendaccess").disabled = false; // Access
                    document.getElementById("amendtel").disabled = false; // Telephone System
                    document.getElementById("amendreception").disabled = false; // Reception Facilities
                    document.getElementById("amendsecurity").disabled = false; // Security Type
                    document.getElementById("amendcanteen").disabled = false; // Canteen
                    document.getElementById("amendownership").disabled = false; // Ownership Type

                    return true; // Proceed with form submission
                } 
                else 
                {
                    // If the user cancels, repopulate the fields and re-lock them
                    populate();
                    toggleLock();
                    return false; // Prevent form submission
                }
            }
        </script>

        <!-- Paragraph to display selected person's details -->
        <p id="display"></p>

        <!-- Button to toggle form fields between editable and read-only -->
        <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">
        <!-- Form for submitting the updated details -->
        <form name="myForm" action="ammendview.php" onsubmit="return confirmCheck()" method="post">
            <h2>Amend/View an Office Property</h2> 

            <div class="formContainer">
                <!-- Property Details -->
                <fieldset>
                    <legend>Property Details</legend>
                    <p>
                        <label for="amendeircode">Eircode: </label>
                        <?php include 'del_listbox.php'; ?>
                    </p>
                    
                    <p><label for="amendid">Property ID: </label>
                    <input type="number" name="amendid" id="amendid" readonly disabled/></p>

                    <p><label for="amendowner">Owner: </label>
                    <input type="text" name="amendowner" id="amendowner" required disabled/></p>

                    <p><label for="amendtype">Property Type: </label>
                    <input type="text" name="amendtype" id="amendtype" readonly disabled/></p>

                    <p><label for="amendaddress">Address: </label>
                    <input type="text" name="amendaddress" id="amendaddress" required disabled/></p>

                    <p><label for="amendlocation">Location: </label>
                    <input type="text" name="amendlocation" id="amendlocation" required disabled/></p>

                    <p><label for="amendprice">Asking Price: </label>
                    <input type="number" step="0.01" name="amendprice" id="amendprice" required disabled/></p>

                    <p><label for="amendtimes">Viewing Times: </label>
                    <input type="text" name="amendtimes" id="amendtimes" required disabled/></p>

                    <p>
                        <label for="amendstatus">Status: </label>
                        <select name="amendstatus" id="amendstatus" required disabled>
                            <option value="0">Sale</option>
                            <option value="1">Sale Agreed</option>
                            <option value="2">Sale Completed</option>
                        </select>
                    </p>

                    <p><label for="amendhbid">Highest Bid: </label>
                    <input type="number" step="0.01" name="amendhbid" id="amendhbid" readonly disabled/></p>

                    <p><label for="amendlist">Date Listed: </label>
                    <input type="date" name="amendlist" id="amendlist" readonly disabled/></p>
                </fieldset>
                
                <!-- Office Details -->
                <fieldset>
                    <legend>Office Details</legend>
                    <p><label for="amendo_id">Office ID: </label>
                    <input type="number" name="amendo_id" id="amendo_id" readonly disabled/></p>

                    <p><label for="amendfloor">Floor: </label>
                    <input type="text" name="amendfloor" id="amendfloor" required disabled/></p>

                    <p><label for="amendarea">Area (sqm): </label>
                    <input type="number" step="0.01" name="amendarea" id="amendarea" required disabled/></p>

                    <p><label for="amendlayout">Layout: </label>
                    <input type="text" name="amendlayout" id="amendlayout" required disabled/></p>

                    <p><label for="amendinternet">Internet: </label>
                    <input type="text" name="amendinternet" id="amendinternet" required disabled/></p>

                    <p><label for="amendaccess">Access: </label>
                    <input type="text" name="amendaccess" id="amendaccess" required disabled/></p>

                    <p><label for="amendtel">Telephone System: </label>
                    <input type="text" name="amendtel" id="amendtel" required disabled/></p>

                    <p><label for="amendreception">Reception Facilities: </label>
                    <input type="text" name="amendreception" id="amendreception" required disabled/></p>

                    <p><label for="amendsecurity">Type of Security: </label>
                    <input type="text" name="amendsecurity" id="amendsecurity" required disabled/></p>

                    <p><label for="amendcanteen">Canteen Facilities: </label>
                    <input type="text" name="amendcanteen" id="amendcanteen" required disabled/></p>

                    <p><label for="amendownership">Type of Ownership: </label>
                    <input type="text" name="amendownership" id="amendownership" required disabled/></p>
                </fieldset>
            </div>
            <br>
            <div class="myButton">
                <input type="submit" value="Save Changes">
            </div>
        </form>
    </div>   
</body>        