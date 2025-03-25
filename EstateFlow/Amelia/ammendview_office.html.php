<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Page title and metadata -->
    <title>EstateFlow - Ammend Office</title>
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
        <a class ="button" href="add_office.html.php">Add a New Office Property</a>
        <a class ="button" href="delete_office.html.php">Delete an Office Property</a>
        <a class ="button selected" href="ammendview_office.html.php">Amend/View an Office Property</a>
        <a class ="button" id="exit" href="../menu.html">Return to Menu</a>
    </div>
    <div class="content">
        <script>
            /**
             * Function to populate the form fields with selected property's details.
             * This function is triggered when an item is selected from the dropdown list.
             */

			function populate() {
            // Get the <select> element by its ID "listbox"
            var sel = document.getElementById("listbox");

            // Get the value of the currently selected option
            var result = sel.options[sel.selectedIndex].value;

            // Split the selected value into an array using semicolon as the delimiter
            // Assumes the value contains multiple property details joined by ";"
            var propertyDetails = result.split(';');

            // Clear any existing content inside the element with ID "display"
            document.getElementById("display").innerHTML = "";


				document.getElementById("amendeircode").value = propertyDetails[0]; // Eircode
				document.getElementById("amendid").value = propertyDetails[1]; // Property ID
				document.getElementById("amendowner").value = propertyDetails[2]; // Owner Name
				document.getElementById("amendtype").value = propertyDetails[3]; // Property Type
				document.getElementById("amendaddress1").value = propertyDetails[4].split(',')[0]; // Address Line 1
				document.getElementById("amendaddress2").value = propertyDetails[4].split(',')[1]; // Address Line 2
				document.getElementById("amendaddress3").value = propertyDetails[4].split(',')[2]; // Postal Code
				document.getElementById("amendlocation").value = propertyDetails[5]; // Location
				document.getElementById("amendprice").value = propertyDetails[6]; // Asking Price
				document.getElementById("amendtimes").value = propertyDetails[7]; // Viewing Times
				document.getElementById("amendstatus").value = propertyDetails[8]; // Status
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
                    document.getElementById("amendaddress1").disabled = false; // Address
					document.getElementById("amendaddress2").disabled = false; // Address
					document.getElementById("amendaddress3").disabled = false; // Address
                    document.getElementById("amendlocation").disabled = false; // Location
                    document.getElementById("amendprice").disabled = false; // Asking Price
                    document.getElementById("amendtimes").disabled = false; // Viewing Times
                    document.getElementById("amendstatus").disabled = true; // Status
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
                    document.getElementById("amendaddress1").disabled = true; // Address
					document.getElementById("amendaddress2").disabled = true; // Address
					document.getElementById("amendaddress3").disabled = true; // Address
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
			
            // Initialize a boolean variable to keep track of visibility state
            var hidden = true;

            /**
             * Toggles the visibility of the element with ID 'togglee'
             * Each time this function is called, it switches between hidden and visible
             */
            function action() {
                // Flip the boolean value (true becomes false, false becomes true)
                hidden = !hidden;

                // If hidden is true, hide the element
                if (hidden) {
                    document.getElementById('togglee').style.visibility = 'hidden';
                } 
                // If hidden is false, show the element
                else {
                    document.getElementById('togglee').style.visibility = 'visible';
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
                    document.getElementById("amendaddress1").disabled = false; // Address
					document.getElementById("amendaddress2").disabled = false; // Address
					document.getElementById("amendaddress3").disabled = false; // Address
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
			
            /**
             * This function runs when a button is clicked.
             * It performs two actions:
             * 1. Calls toggleLock() to enable/disable form fields based on selection.
             * 2. Calls action() to toggle visibility of a specific element.
             */
			function button() 
			{
				toggleLock();
				action();
			}
			
            // Function to handle property filtering based on user selection
            function filterProperties(choice) 
            {
                // Set the value of the hidden input field to the selected choice
                document.getElementById("filterChoice").value = choice;

                // Submit the form named 'filterForm' to apply the selected filter
                // This approach avoids modifying the URL manually
                document.filterForm.submit(); // Submit form instead of modifying the URL
            }

				
        </script>

		<?php
			// Default filter choice
			$statusFilter = "all"; 

			// Check if a sorting choice was submitted via GET request
			if (isset($_GET['status'])) 
			{
				$statusFilter = $_GET['status']; // Assign the chosen filter
			}
		?>
		
        <!-- Paragraph to display selected person's details -->
        <p id="display"></p>
		<form action="ammendview_office.html.php" method="get" name="filterForm" id="filterForm" hidden>
			<input type="text"  name="status" id="filterChoice" hidden>
		</form>
        <!-- Form for submitting the updated details -->
               <!-- Form for submitting the updated details -->
        <form name="myForm" action="ammendview.php" onsubmit="return confirmCheck()" method="post">
            <h2>Amend/View an Office Property</h2> 
			
            <!-- Instructions for the user -->
            <h4>Please select an Office and then click the amend button if you wish to update..</h4>
            <br>
			<!-- Button container for filtering -->
			<div class='button-container'>
				<input type="button" class='filter-button' id="allButton" value="All"
					   onclick="filterProperties('all')" title="Click here to see all properties">
				<input type="button" class='filter-button' id="soldButton" value="Sold"
					   onclick="filterProperties('sold')" title="Click here to see all Sold properties">
				<input type="button" class='filter-button' id="unsoldButton" value="Unsold"
					   onclick="filterProperties('unsold')" title="Click here to see all Unsold properties">
			</div>
            <!-- Include the PHP file that generates the dropdown list -->
            <?php include 'ammendview_listbox.php'; ?>
			<br>
			
			
			<?php
				if ($statusFilter == "all") 
				{
			?>
					<!-- Disable All button... Enable others -->
					<script>
						document.getElementById("allButton").disabled = true;
						document.getElementById("soldButton").disabled = false;
						document.getElementById("unsoldButton").disabled = false;
					</script>
			<?php
				} 
				elseif ($statusFilter == "unsold") 
				{
			?>
					<!-- Disable Unsold button... Enable others -->
					<script>
						document.getElementById("allButton").disabled = false;
						document.getElementById("soldButton").disabled = false;
						document.getElementById("unsoldButton").disabled = true;
					</script>
			<?php
				} 
				else  
				{
			?>
					<!-- Disable Sold button... Enable others -->
					<script>
						document.getElementById("allButton").disabled = false;
						document.getElementById("soldButton").disabled = true;
						document.getElementById("unsoldButton").disabled = false;
					</script>
			<?php
				}
			?>

			<!-- Button to toggle form fields between editable and read-only -->
			<input type="button" value="Amend Details" id="amendViewbutton" onclick="button()">
            <div class="formContainer">
                <!-- Property Details -->
                <fieldset>
                    <legend>Property Details</legend>
                    <p>
                        <label for="amendeircode">Eircode: </label>
                        <input type="text" name="amendeircode" id="amendeircode"
                        pattern="^[A-Za-z]\d{2}\s?[A-Za-z0-9]{4}$" required disabled/>
                    </p>
                    
                    <!-- Property Id -->
                    <p><label for="amendid">Property ID: </label>
                    <input type="number" name="amendid" id="amendid" readonly disabled/></p>

                    <!-- Owner -->
                    <p><label for="amendowner">Owner: </label>
                    <input type="text" name="amendowner" id="amendowner" readonly disabled/></p>

                    <!-- Property Type -->
                    <p><label for="amendtype">Property Type: </label>
                    <input type="text" name="amendtype" id="amendtype" readonly disabled/></p>

                    <!-- Address -->
    				<p><label for="amendaddress1">Address: </label>
    				<input type="text" name="amendaddress1" id="amendaddress1"  required disabled/></p>
    				<input type="text" name="amendaddress2" id="amendaddress2" required disabled/>
    				<input type="text" name="amendaddress3" id="amendaddress3" required disabled/>

                    <!-- Location -->
                    <p><label for="amendlocation">Location: </label>
                    <input type="text" name="amendlocation" id="amendlocation" required disabled/></p>

                    <!-- Asking Price -->
                    <p><label for="amendprice">Asking Price: </label>
                    <input type="number" step="0.01" name="amendprice" id="amendprice" required disabled/></p>

                    <!-- Viewing Times -->
                    <p><label for="amendtimes">Viewing Times: </label>
                    <input type="text" name="amendtimes" id="amendtimes" required disabled/></p>

                    <!-- Status -->
                    <p>
                        <label for="amendstatus">Status: </label>
                        <select name="amendstatus" id="amendstatus" readonly disabled>
                            <option value="0">Sale</option>
                            <option value="1">Sale Agreed</option>
                            <option value="2">Sale Completed</option>
                        </select>
                    </p>

                    <!-- Highest Bid -->
                    <p><label for="amendhbid">Highest Bid: </label>
                    <input type="number" step="0.01" name="amendhbid" id="amendhbid" readonly disabled/></p>

                    <!-- Date Listed -->
                    <p><label for="amendlist">Date Listed: </label>
					<input type="text" name="amendlist" id="amendlist" value="" readonly disabled/>
					</p>

                </fieldset>
                
                <!-- Office Details -->
                <fieldset>
                    <legend>Office Details</legend>

                    <!-- office id -->
                    <p><label for="amendo_id">Office ID: </label>
                    <input type="number" name="amendo_id" id="amendo_id" readonly disabled/></p>

                    <!-- floor -->
                    <p><label for="amendfloor">Floor: </label>
                    <input type="text" name="amendfloor" id="amendfloor" required disabled/></p>

                    <!-- area -->
                    <p><label for="amendarea">Area (sqm): </label>
                    <input type="number" step="0.01" name="amendarea" id="amendarea" required disabled/></p>

                    <!-- layout -->
                    <p><label for="amendlayout">Layout: </label>
                    <input type="text" name="amendlayout" id="amendlayout" required disabled/></p>

                    <!-- interent -->
                    <p><label for="amendinternet">Internet: </label>
                    <input type="text" name="amendinternet" id="amendinternet" required disabled/></p>

                    <!-- Access -->
                    <p><label for="amendaccess">Access: </label>
                    <input type="text" name="amendaccess" id="amendaccess" required disabled/></p>

                    <!-- Telephone System -->
                    <p><label for="amendtel">Telephone System: </label>
                    <input type="text" name="amendtel" id="amendtel" required disabled/></p>

                    <!-- Reception Facilities -->
                    <p><label for="amendreception">Reception Facilities: </label>
                    <input type="text" name="amendreception" id="amendreception" required disabled/></p>

                    <!-- Type of Security -->
                    <p><label for="amendsecurity">Type of Security: </label>
                    <input type="text" name="amendsecurity" id="amendsecurity" required disabled/></p>

                    <!-- Canteen Facilities -->
                    <p><label for="amendcanteen">Canteen Facilities: </label>
                    <input type="text" name="amendcanteen" id="amendcanteen" required disabled/></p>

                    <!-- Ownership -->
                    <p><label for="amendownership">Type of Ownership: </label>
                    <input type="text" name="amendownership" id="amendownership" required disabled/></p>
                </fieldset>
            </div>
            <br>

            <!-- Submit button, hidden by default, shown via JS toggle -->
            <div class="myButton">
                <input type="submit" id="togglee" value="Save Changes" style="visibility: hidden;">
            </div>
        </form>
    </div>   
</body>  
</html> 