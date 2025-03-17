<!DOCTYPE html>
<html lang="en">
<head>
    <title>EstateFlow - Add Office</title>
    <meta charset="UTF-8">
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
        <a class ="button" href="..\Darius/add_residential.html">Add a New Residential Property</a>
        <a class ="button" href="..\Darius/delete_residential.html">Delete a Residential Property</a>
        <a class ="button" href="..\Darius/view_residential.html">Amend/View a Residential Property</a>
        <a class ="button" href="..\Mark/add_land.html.php">Add a New Land Property</a>
        <a class ="button" href="..\Mark/delete_land.html">Delete a Land Property</a>
        <a class ="button" href="..\Mark/view_land.html">Amend/View a Land Property</a>
        <a class ="button selected" href="add_office.html.php">Add a New Office Property</a>
        <a class ="button" href="delete_office.html.php">Delete an Office Property</a>
        <a class ="button" href="view_office.html.php">Amend/View an Office Property</a>
        <a class ="button" >Exit</a>
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

        function populateOwnerId() 
        {
            // Get the dropdown element
            var sel = document.getElementById("owner");
            var selectedValue = sel.options[sel.selectedIndex].value;

            // Check if an owner is selected
            if (selectedValue === "" || selectedValue === " ") {
                document.getElementById("id").value = ""; // Clear the Owner ID if no owner is selected
                return;
            }

            // Populate the Owner ID field
            document.getElementById("id").value = selectedValue;
        }

        /**
         * Function to toggle the form fields between editable and read-only.
         * Triggered when the "Amend Details" button is clicked.
         */
        function toggleLock() 
        {
            var selectedValue = document.getElementById("owner").value.trim();
            if (selectedValue === "" || selectedValue === " ") 
            {
                // Disable the form fields (read-only mode)
                // If switching back to "View Details", repopulate with original data
                // Enable the form fields for editing
                document.getElementById("id").disabled = true;
                document.getElementById("type").disabled = true;
                document.getElementById("address").disabled = true;
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
                populateOwnerId();
                // Enable the form fields for editing
                document.getElementById("id").disabled = false;
                document.getElementById("type").disabled = false;
                document.getElementById("address").disabled = false;
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
        }
    </script>
    <div class="content">
        <form action="add_office.php" method="POST" onsubmit="return confirmSubmission();">

            <h2>Add a New Office Property</h2> 
            
            <div class = formContainer>
            <!-- Property Details -->
            <fieldset>
                <legend>Property Details</legend>
                <p>
                    <label for="owner">Owner: </label>
                    <!-- Include the PHP file that generates the dropdown list -->
                    <?php include 'listbox.php'; ?>
                </p>
                
                <p><label for="id">Owner Id: </label>
                <input type="number" name="id" id="id" value="" readonly disabled/></p>

                <p><label for="type">Property Type: </label>
                <input type="text" name="type" id="type" value="Office" readonly disabled/></p>

                <p><label for="address">Address: </label>
                <input type="text" name="address" id="address" placeholder="Street, town, and county" required disabled/></p>

                <p>
					<label for="eircode">Eircode: </label>
					<input type="text" name="eircode" id="eircode" placeholder="R93 WR00" 
						pattern="^[A-Za-z]\d{2}\s?[A-Za-z0-9]{4}$" 
						title="Eircode must be in the format A12 B3CD (e.g., R93 WR00)" 
						required disabled/>
				</p>


                <p><label for="location">Location: </label>
                <input type="text" name="location" id="location" placeholder="Block D, Rear Wing" required disabled/></p>

                <p><label for="asking_price">Asking Price: </label>
                <input type="number" step="0.01" name="asking_price" id="asking_price" placeholder="€10000" required disabled/></p>

                <p><label for="viewing_times">Viewing Times: </label>
                <input type="text" name="viewing_times" id="viewing_times" placeholder="10:00 - 19:00" required disabled/></p>

                <p>
					<label for="status">Status: </label>
					<select name="status" id="status" readonly disabled>
						<option value="0">Sale</option>  
						<option value="1">Sale Agreed</option>  
                        <option value="2">Sale Complete</option>  
					</select>
				</p>

                
                <p><label for="highest_bid">Highest Bid: </label>
                    <input type="number" step="0.01" name="highest_bid" id="highest_bid" value="0" readonly disabled/></p>
                

            </fieldset>
            
            <!-- Office Details -->
            <fieldset>
                <legend>Office Details</legend>
                <p><label for="floor">Floor: </label>
                <input type="text" name="floor" id="floor" placeholder="e.g. 7th floor" required disabled/></p>

                <p><label for="area">Area (sqm): </label>
                <input type="number" step="0.01" name="area" id="area" placeholder="Square metres" required disabled/></p>

                <p><label for="layout">Layout: </label>
                <input type="text" name="layout" id="layout" placeholder="e.g. large open area, 2 small rooms, etc." required disabled/></p>

                <p><label for="internet">Internet: </label>
                <input type="text" name="internet" id="internet" placeholder="e.g. wireless" required disabled/></p>

                <p><label for="access">Access: </label>
                <input type="text" name="access" id="access" placeholder="e.g. ramps/elevators" required disabled/></p>

                <p><label for="telephone_system">Telephone System: </label>
                <input type="text" name="telephone_system" id="telephone_system" placeholder="e.g. VoIP" required disabled/></p>

                <p><label for="reception">Reception Facilities: </label>
                <input type="text" name="reception" id="reception" placeholder="e.g. receptionist on duty" required disabled/></p>

                <p><label for="security">Type of Security: </label>
                <input type="text" name="security" id="security" placeholder="e.g. Netwatch, patrols, etc." required disabled/></p>

                <p><label for="canteen">Canteen Facilities: </label>
                <input type="text" name="canteen" id="canteen" placeholder="e.g. large open-access canteen" required disabled/></p>

                <p><label for="ownership">Type of Ownership: </label>
                <input type="text" name="ownership" id="ownership" placeholder="Freehold or Long Lease" required disabled/></p>
            </fieldset>
            </div>
            <br>
            <div class="myButton">
                <input type="submit" value="Submit"/>
                <input type="reset" value="Clear"/>
            </div>
        </form>
    </div>
</body>
</html>