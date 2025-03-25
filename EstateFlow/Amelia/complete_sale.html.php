<!-- Estate Flow - Complete Sale Page  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Sets title -->
    <title>EstateFlow - Complete a Sale</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="..\menu.css">
	<link rel="stylesheet" href="office.css">
	<link rel="icon" type="image/x-icon" href="../images/icon.png">

    <style>
        .hidden {
            display: none !important;
        }

        .completeForm {
            width: 800px; /* or any width you prefer */
            max-width: 90%; /* prevent it from overflowing on smaller screens */
            margin: 0 auto; /* center it horizontally */
            padding: 20px;
            box-sizing: border-box;
        }

    </style>
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
        <a class ="button" href="..\construction/agree_sale.html">Agree a Sale</a>
        <a class ="button selected" href="complete_sale.html.php">Complete a Sale</a>
        <a class ="button" id="exit" href="../menu.html">Return to Menu</a>
    </div>
    
    <!-- Main Content Area -->
    <div class="content">
        <script>
            /**
             * Function to populate the form fields with selected Property's details.
             * This function is triggered when an item is selected from the dropdown list.
             */

             function populate() 
             {
                var sel = document.getElementById("listbox");
                var result = sel.options[sel.selectedIndex].value;
                var propertyDetails = result.split(';');

                document.getElementById("display").innerHTML = "";


                document.getElementById("eircode").value = propertyDetails[0];
                document.getElementById("id").value = propertyDetails[1];
                document.getElementById("owner").value = propertyDetails[2];
                document.getElementById("type").value = propertyDetails[3];

                document.getElementById("address1").value = propertyDetails[4].split(',')[0];
                document.getElementById("address2").value = propertyDetails[4].split(',')[1];
                document.getElementById("address3").value = propertyDetails[4].split(',')[2];
                document.getElementById("location").value = propertyDetails[5];
                document.getElementById("asking_price").value = propertyDetails[6];
                document.getElementById("viewing_times").value = propertyDetails[7];
                document.getElementById("status").value = propertyDetails[8];
                document.getElementById("highest_bid").value = propertyDetails[9];
                document.getElementById("date_listed").value = propertyDetails[10];

                // declare variable "type" and convert type to lower case 
                const type = propertyDetails[3].toLowerCase();

                // check if type matches residential/office/land
                if (type === "residential") 
                {
                    // unhide the residential field
                    document.querySelector('.residential-field').hidden = false;
                    document.querySelector('.land-field').hidden = true;
                    document.querySelector('.office-field').hidden = true;
                    document.querySelector('.completeForm').hidden = true;

                    document.getElementById("residential_id").value = propertyDetails[11];
                    document.getElementById("levels").value = propertyDetails[12];
                    document.getElementById("res_reception").value = propertyDetails[13];
                    document.getElementById("bedrooms").value = propertyDetails[14];
                    document.getElementById("bathrooms").value = propertyDetails[15];
                    document.getElementById("res_area").value = propertyDetails[16];
                    document.getElementById("heating").value = propertyDetails[17];
                    document.getElementById("res_notes").value = propertyDetails[18];
                    document.getElementById("amenities").value = propertyDetails[19];

                    document.getElementById("buyer_id").value = propertyDetails[20];
                    document.getElementById("price_paid").value = propertyDetails[9];
                } else if (type === "office") 
                {
                    // unhide the office field
                    document.querySelector('.office-field').hidden = false;
                    document.querySelector('.land-field').hidden = true;
                    document.querySelector('.residential-field').hidden = true;
                    document.querySelector('.completeForm').hidden = true;

                    document.getElementById("office_id").value = propertyDetails[11];
                    document.getElementById("floor").value = propertyDetails[12];
                    document.getElementById("off_area").value = propertyDetails[13];
                    document.getElementById("layout").value = propertyDetails[14];
                    document.getElementById("internet").value = propertyDetails[15];
                    document.getElementById("access").value = propertyDetails[16];
                    document.getElementById("telephone_system").value = propertyDetails[17];
                    document.getElementById("off_reception").value = propertyDetails[18];
                    document.getElementById("security").value = propertyDetails[19];
                    document.getElementById("canteen").value = propertyDetails[20];
                    document.getElementById("ownership").value = propertyDetails[21];

                    document.getElementById("buyer_id").value = propertyDetails[22];
                    document.getElementById("price_paid").value = propertyDetails[9];
                } else if (type === "land") 
                {
                    // unhide the land field
                    document.querySelector('.land-field').hidden = false;
                    document.querySelector('.residential-field').hidden = true;
                    document.querySelector('.office-field').hidden = true;
                    document.querySelector('.completeForm').hidden = true;
                    document.getElementById("land_id").value = propertyDetails[11];
                    document.getElementById("acres").value = propertyDetails[12];
                    document.getElementById("buildings").value = propertyDetails[13];
                    document.getElementById("residence_details").value = propertyDetails[14];
                    document.getElementById("quotas").value = propertyDetails[15];
                    document.getElementById("land_notes").value = propertyDetails[16];

                    document.getElementById("buyer_id").value = propertyDetails[17];
                    document.getElementById("price_paid").value = propertyDetails[9];
                }
            }

            // unhide the field which allows you to continue and submit the form to the database
            function toggle()
            {
                document.querySelector('.completeForm').hidden = false;
            }


            function toggleLock() 
            {
                    // Enable form fields for submission
                    document.getElementById("id").disabled = false; // Property ID
                    document.getElementById("owner").disabled = false; // Owner Name
                    document.getElementById("type").disabled = false; // Property Type
                    document.getElementById("address1").disabled = false; // Address
					document.getElementById("address2").disabled = false; // Address
					document.getElementById("address3").disabled = false; // Address
                    document.getElementById("location").disabled = false; // Location
                    document.getElementById("price").disabled = false; // Asking Price
                    document.getElementById("times").disabled = false; // Viewing Times
                    document.getElementById("status").disabled = true; // Status
                    document.getElementById("highest_bid").disabled = false; // Highest Bid
                    document.getElementById("date_listed").disabled = false; // Date Listed
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
                    document.getElementById("id").disabled = false; // Property ID
                    document.getElementById("owner").disabled = false; // Owner Name
                    document.getElementById("type").disabled = false; // Property Type
                    document.getElementById("address1").disabled = false; // Address
					document.getElementById("address2").disabled = false; // Address
					document.getElementById("address3").disabled = false; // Address
                    document.getElementById("location").disabled = false; // Location
                    document.getElementById("price").disabled = false; // Asking Price
                    document.getElementById("times").disabled = false; // Viewing Times
                    document.getElementById("status").disabled = false; // Status
                    document.getElementById("highest_bid").disabled = false; // Highest Bid
                    document.getElementById("date_listed").disabled = false; // Date Listed

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
        <!-- Form for submitting the updated details -->
               <!-- Form for submitting the updated details -->
        <form name="myForm" action="completesale.php" onsubmit="return confirmCheck()" method="post">
            <h2>Complete a Sale</h2> 
			
            <!-- Instructions for the user -->
            <h4>Below is a list of properties with active sale agreements.<br> 
				Please select a property to complete a sale...</h4>
            <br>
            <!-- Include the PHP file that generates the dropdown list -->
            <?php include 'salelistbox.php'; ?>
			<br>

			<br>
            <div class="formContainer">
                <!-- Property Details -->
                <fieldset>
                <legend>Property Details</legend>

                <!-- Owner -->
                <p>
                <label for="owner">Owner: </label>
                <input type="text" name="owner" id="owner" value="" readonly>
                </p>
                
                <!-- Property Id -->
                <p><label for="id">Property Id: </label>
                <input type="number" name="id" id="id" value="" readonly/></p>

                <!-- Property Type -->
                <p><label for="type">Property Type: </label>
                <input type="text" name="type" id="type" value="" readonly disabled/></p>

                <!-- Address -->
                <p><label for="address">Address: </label>
				<input type="text" name="address1" id="address1" placeholder="Address Line 1" required disabled/> <br>
				<input type="text" name="address2" id="address2" placeholder="Street Name" required disabled/> <br>
				<input type="text" name="address3" id="address3" placeholder="Town/City" required disabled/></p>
				
				<!-- Hidden input to hold combined address -->
				<input type="hidden" name="address" id="combined_address">

                <!-- Eircode -->
                <p>
					<label for="eircode">Eircode: </label>
					<input type="text" name="eircode" id="eircode" placeholder="R93 WR00" 
						pattern="^[A-Za-z]\d{2}\s?[A-Za-z0-9]{4}$" 
						title="Eircode must be in the format A12 B3CD (e.g., R93 WR00)" 
						required disabled/>
				</p>


                <!-- Location -->
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

                <!-- Highest Bid -->
                <p><label for="highest_bid">Highest Bid: </label>
                    <input type="number" step="0.01" name="highest_bid" id="highest_bid" value="0" readonly disabled/></p>
                
                <!-- Date Listed -->
                <p><label for="date_listed">Date Listed </label>
                <input type="text"  name="date_listed" id="date_listed" readonly disabled/></p>
            
                </fieldset>


				<!-- Residential Fields -->
                <div class="residential-field" hidden>
                    <fieldset>
                        <legend>Residential Details</legend>

                        <!-- Residential ID -->
                        <p><label for="residential_id">Residential ID: </label>
                        <input type="number" name="residential_id" id="residential_id" readonly /></p>

                        <!-- Levels -->
                        <p><label for="levels">Levels: </label>
                        <input type="number" name="levels" id="levels" readonly /></p>

                        <!-- Reception -->
                        <p><label for="res_reception">Reception: </label>
                        <input type="text" name="res_reception" id="res_reception" readonly /> </p>

                        <!-- Bedrooms -->
                        <p><label for="bedrooms">Bedrooms: </label>
                        <input type="number" name="bedrooms" id="bedrooms" readonly /></p>

                        <!-- Bathrooms -->
                        <p><label for="bathrooms">Bathrooms: </label>
                        <input type="number" name="bathrooms" id="bathrooms" readonly /></p>

                        <!-- Area -->
                        <p><label for="res_area">Area (sqm): </label>
                        <input type="number" name="res_area" id="res_area" readonly /></p>

                        <!-- Heating -->
                        <p><label for="heating">Heating: </label>
                        <input type="text" name="heating" id="heating" readonly /></p>

                        <!-- Notes -->
                        <p><label for="res_notes">Notes: </label>
                        <textarea name="res_notes" id="res_notes" readonly></textarea></p>

                        <!-- Ammenities -->
                        <p><label for="amenities">Amenities: </label>
                        <textarea name="amenities" id="amenities" readonly></textarea></p>
                    </fieldset>
                </div>

                <!-- Office Details -->
                <div class="office-field" hidden>
                    <fieldset>
                        <legend>Office Details</legend>
                        <!-- Office Id -->
                        <p><label for="office_id">Office ID: </label>
                        <input type="number" name="office_id" id="office_id" readonly /></p>

                        <!-- Floor Number -->
                        <p><label for="floor">Floor Number: </label>
                        <input type="number" name="floor" id="floor" readonly /></p>

                        <!-- Office Area -->
                        <p><label for="off_area">Office Area (sqm): </label>
                        <input type="number" name="off_area" id="off_area" readonly /></p>

                        <!-- Layout -->
                        <p><label for="layout">Layout: </label>
                        <input type="text" name="layout" id="layout" readonly /></p>

                        <!-- Internet -->
                        <p><label for="internet">Internet Available: </label>
                        <input type="text" name="internet" id="internet" readonly /></p>

                        <!-- Access -->
                        <p><label for="access">Access: </label>
                        <input type="text" name="access" id="access" readonly /></p>

                        <!-- Telephone System -->
                        <p><label for="telephone_system">Telephone System: </label>
                        <input type="text" name="telephone_system" id="telephone_system" readonly /></p>

                        <!-- Reception -->
                        <p><label for="off_reception">Reception: </label>
                        <input type="text" name="off_reception" id="off_reception" readonly /></p>

                        <!-- Security -->
                        <p><label for="security">Security Type: </label>
                        <input type="text" name="security" id="security" readonly /></p>

                        <!-- Canteen -->
                        <p><label for="canteen">Canteen: </label>
                        <input type="text" name="canteen" id="canteen" readonly /></p>

                        <!-- Ownership Type -->
                        <p><label for="ownership">Ownership Type: </label>
                        <input type="text" name="ownership" id="ownership" readonly /></p>
                    </fieldset>
                </div>

                <!-- Land Details -->
                <div class="land-field" hidden>
                    <fieldset>
                        <legend>Land Details</legend>
                        <!-- Land ID -->
                        <p><label for="land_id">Land ID: </label>
                        <input type="number" name="land_id" id="land_id" readonly /></p>

                        <!-- Acres -->
                        <p><label for="acres">Acres: </label>
                        <input type="number" name="acres" id="acres" readonly /></p>

                        <!-- Buildings -->
                        <p><label for="buildings">Buildings: </label>
                        <input type="text" name="buildings" id="buildings" readonly /></p>

                        <!-- Residential Details -->
                        <p><label for="residence_details">Residence Details: </label>
                        <input type="text" name="residence_details" id="residence_details" readonly /></p>

                        <!-- Quotas -->
                        <p><label for="quotas">Quotas: </label>
                        <input type="text" name="quotas" id="quotas" readonly /></p>

                        <!-- Notes -->
                        <p><label for="land_notes">Notes: </label>
                        <textarea name="land_notes" id="land_notes" readonly></textarea></p>
                    </fieldset>
                </div>

            </div>
            <br>
            <!-- button to continue after reviewing property details -->
            <div class="myButton">
                <input type="button" class='filter-button' id="allButton" value="Continue..."
                        onclick="toggle()" title="Click here to complete the sale">
            </div>
            <br>
            <!-- Additional details to submit for completing a sale -->
            <div class="completeForm" hidden>
                <fieldset>
                    <legend>Property Details for Completing a Sale</legend>
                
                    <!-- Buyer Id -->
					<p><label for="buyer_id">Buyer Id: </label>
					<input type="number" name="buyer_id" id="buyer_id" value=""  readonly/></p>

                    <!-- Completion Date -->
					<p>
						<label for="completion_date">Completion Date: </label>
						<input type="date" name="completion_date" id="completion_date" value="">
					</p>

                    <!-- Price Paid -->
					<p><label for="price_paid">Price Paid: </label>
					<input type="number" name="price_paid" id="price_paid" value="" readonly  /></p>
				</fieldset>
			</div>
            <div class="myButton">
                <input type="submit" value="Confirm Property.."/>
            </div>
        </form>
    </div>

</body>
</html>