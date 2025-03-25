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

    <script>
    /**
     * Function to confirm the user's intent to save changes.
     * This function is triggered when the form is submitted.
     * Returns true if the user confirms, otherwise prevents form submission.
    */
        function confirmSubmission() 
        {
            return confirm("Do you want to insert this record?");
        }

        /**
         * Populates the hidden owner fields based on dropdown selection.
         * Parses a comma-separated value (e.g., "123,John Doe") and fills in the Owner ID and Name fields.
         */
		function populateOwner() {
			var select = document.getElementById("ownerSelect");
			var selectedValue = select.value; // Get the selected CSV value (ID, Name)

			if (selectedValue) {
				var data = selectedValue.split(','); // Split the value into an array
				document.getElementById("id").value = data[0];   // Owner ID
				document.getElementById("owner").value = data[1]; // Owner Name

				console.log("Owner ID set:", data[0]);  // Debugging log
        		console.log("Owner Name set:", data[1]);  // Debugging log
			} else 
            {
				document.getElementById("id").value = ""; //null
				document.getElementById("owner").value = "";
			}
		}




        /**
         * Enables or disables form fields based on whether an owner is selected.
         * If an owner is selected, it populates the fields and makes them editable.
         * If no selection, the fields remain read-only.
         */
        function toggleLock() 
        {
            var selectedValue = document.getElementById("ownerSelect").value.trim();
            if (selectedValue === "" || selectedValue === " ") 
            {
                // Disable the form fields (read-only mode) until owner is selected
				document.getElementById("owner").disabled = true;
                document.getElementById("id").disabled = true;
                document.getElementById("type").disabled = true;
                document.getElementById("address_line1").disabled = true;
				document.getElementById("address_line2").disabled = true;
				document.getElementById("address_line3").disabled = true;
                document.getElementById("eircode").disabled = true;
                document.getElementById("location").disabled = true;
                document.getElementById("asking_price").disabled = true;
                document.getElementById("viewing_times").disabled = true;
                document.getElementById("status").disabled = true;
                document.getElementById("highest_bid").disabled = true;
                
                document.getElementById("floor").disabled = true;
                document.getElementById("area").disabled = true;
                document.getElementById("layout").disabled = true;
                document.getElementById("internet").disabled = true;
                document.getElementById("access").disabled = true;
                document.getElementById("telephone_system").disabled = true;
                document.getElementById("reception").disabled = true;
                document.getElementById("security").disabled = true;
                document.getElementById("canteen").disabled = true;
                document.getElementById("ownership").disabled = true;

            } else 
            {
                populateOwner();
                // Enable and populate fields
				document.getElementById("owner").disabled = false;
                document.getElementById("id").disabled = false;
                document.getElementById("type").disabled = false;
                document.getElementById("address_line1").disabled = false;
				document.getElementById("address_line2").disabled = false;
				document.getElementById("address_line3").disabled = false;
                document.getElementById("eircode").disabled = false;
                document.getElementById("location").disabled = false;
                document.getElementById("asking_price").disabled = false;
                document.getElementById("viewing_times").disabled = false;
                document.getElementById("status").disabled = false;
                document.getElementById("highest_bid").disabled = false;

                document.getElementById("floor").disabled = false;
                document.getElementById("area").disabled = false;
                document.getElementById("layout").disabled = false;
                document.getElementById("internet").disabled = false;
                document.getElementById("access").disabled = false;
                document.getElementById("telephone_system").disabled = false;
                document.getElementById("reception").disabled = false;
                document.getElementById("security").disabled = false;
                document.getElementById("canteen").disabled = false;
                document.getElementById("ownership").disabled = false;
            }
            /**
             * Helper function to populate owner and confirm before submission.
             * This ensures both behaviors are triggered.
             */
			function handleFormSubmit() {
				populateOwner();
				return confirmSubmission(); // Ensures confirmation before submission
			}


        }
    </script>
    <!-- Main content area with form -->
    <div class="content">
        <!-- Form to submit new office property -->
        <form action="add_office.php" method="POST" onsubmit="handleFormSubmit(); return true;">

        <h2>Add an Office Property</h2> 

        <!-- Instructions for the user -->
        <h4>Please select an Owner you wish to add a property to..</h4>
        <br>
        <!-- PHP file that generates the dropdown list -->
        <?php include 'listbox.php'; ?>
            <div class = formContainer>
            <!-- Property Details -->
            <fieldset>
                <legend>Property Details</legend>

                <!-- Owner fields (auto-filled) -->
                <p>
                    <label for="owner">Owner: </label>
					<input type="text" name="owner" id="owner" value="" readonly>

                </p>
                
                <!-- owner ic -->
                <p><label for="id">Owner Id: </label>
                <input type="number" name="id" id="id" value="" readonly/></p>

                <!-- property type -->
                <p><label for="type">Property Type: </label>
                <input type="text" name="type" id="type" value="Office" readonly disabled/></p>

                <!-- Address inputs split across lines -->
                <p><label for="address">Address: </label>
				<input type="text" name="address_line1" id="address_line1" placeholder="Address Line 1" required disabled/> <br>
				<input type="text" name="address_line2" id="address_line2" placeholder="Street Name" required disabled/> <br>
				<input type="text" name="address_line3" id="address_line3" placeholder="Town/City" required disabled/></p>

                <!-- Eircode input with pattern validation -->
                <p>
					<label for="eircode">Eircode: </label>
					<input type="text" name="eircode" id="eircode" placeholder="R93 WR00" 
						pattern="^[A-Za-z]\d{2}\s?[A-Za-z0-9]{4}$" 
						title="Eircode must be in the format A12 B3CD (e.g., R93 WR00)" 
						required disabled/>
				</p>

                <!-- location -->
                <p><label for="location">Location: </label>
                <input type="text" name="location" id="location" placeholder="County" required disabled/></p>

                <!-- Asking Price -->
                <p><label for="asking_price">Asking Price: </label>
                <input type="number" step="0.01" name="asking_price" id="asking_price" placeholder="€10000" required disabled/></p>

                <!-- Viewing Times -->
                <p><label for="viewing_times">Viewing Times: </label>
                <input type="text" name="viewing_times" id="viewing_times" placeholder="10:00 - 19:00" required disabled/></p>

                <!-- Status -->
                <p>
					<label for="status">Status: </label>
					<select name="status" id="status" readonly disabled>
						<option value="0">Sale</option>  
						<option value="1">Sale Agreed</option>  
                        <option value="2">Sale Complete</option>  
					</select>
				</p>

                <!-- highest bid -->
                <p><label for="highest_bid">Highest Bid: </label>
                    <input type="number" step="0.01" name="highest_bid" id="highest_bid" value="0" readonly disabled/></p>
                

            </fieldset>
            
            <!-- Office Details -->
            <fieldset>
                <legend>Office Details</legend>

                <!-- floor -->
                <p><label for="floor">Floor: </label>
                <input type="text" name="floor" id="floor" placeholder="e.g. 7" required disabled/></p>

                <!-- area -->
                <p><label for="area">Area (sqm): </label>
                <input type="number" step="0.01" name="area" id="area" placeholder="Square metres" required disabled/></p>

                <!-- layout -->
                <p><label for="layout">Layout: </label>
                <input type="text" name="layout" id="layout" placeholder="e.g. large open area, 2 small rooms, etc." required disabled/></p>

                <!-- internet -->
                <p><label for="internet">Internet: </label>
                <input type="text" name="internet" id="internet" placeholder="e.g. wireless" required disabled/></p>

                <!-- access -->
                <p><label for="access">Access: </label>
                <input type="text" name="access" id="access" placeholder="e.g. ramps/elevators" required disabled/></p>

                <!-- telephone system -->
                <p><label for="telephone_system">Telephone System: </label>
                <input type="text" name="telephone_system" id="telephone_system" placeholder="e.g. VoIP" required disabled/></p>

                <!-- reception facilities -->
                <p><label for="reception">Reception Facilities: </label>
                <input type="text" name="reception" id="reception" placeholder="e.g. receptionist on duty" required disabled/></p>

                <!-- security -->
                <p><label for="security">Type of Security: </label>
                <input type="text" name="security" id="security" placeholder="e.g. Netwatch, patrols, etc." required disabled/></p>

                <!-- canteen -->
                <p><label for="canteen">Canteen Facilities: </label>
                <input type="text" name="canteen" id="canteen" placeholder="e.g. large open-access canteen" required disabled/></p>

                <!-- ownership -->
                <p><label for="ownership">Type of Ownership: </label>
                <input type="text" name="ownership" id="ownership" placeholder="Freehold or Long Lease" required disabled/></p>
            </fieldset>
            </div>
            <br>
            <!-- Submit and Clear form buttons -->
            <div class="myButton">
                <input type="submit" value="Submit"/>
                <input type="reset" value="Clear"/>
            </div>
        </form>
    </div>
</body>
</html>