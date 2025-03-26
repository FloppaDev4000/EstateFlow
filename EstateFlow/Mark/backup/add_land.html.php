<!-- Estate Flow - Add Land Page  -->
<!--Name: Mark Lambert,
Student ID: C00192497
Purpose: Add Land HTML form page
Date: February 2025
EstateFlow Project Y2 2025 -->
<!DOCTYPE html>
<?php
	include "land_maintenance.html.php";
	session_start();
?>   
<!-- Main Content Area -->
<div class="content">
	<script src="add_land.js"></script>
	<!-- Start form, sending info via Post to add_land.php, an submit call the function confirmCheck to ensure data doesnt send when false is returned -->
	<form action="add_land.php" onsubmit="return confirmCheck()" method="Post">
		<!-- Set heading for the form -->
		<h1>Add a New Land Property</h1>

		<!-- Container for Listbox containing all clients w/ their client_id in the values-->
		<div class = "owner-listbox">
			<label for = "owner-listbox"><h2>Select a Property Owner</h2></label>
			<!-- Calls the php script to make the dynamic listbox and insert it into the form via an echo -->
			<?php include 'add_land_listbox.php'; ?>
		</div>

		<!-- Script which checks if the session variable has been set for when a land property has been added, if so, echo a message out -->
		<?php
		if(ISSET($_SESSION["property_id"]))
		{
			echo "<h2>Land Property added with Property ID: " . $_SESSION["property_id"];		
		}
		session_destroy();
		?>

		<!-- Begin Form Input Section -->
		<div class = "formContainer">

			<fieldset>

				<!-- Property Specific Details -->
				<legend>Property Details</legend>

				<div class = "inputbox">
					<label for = "property_type">Property Type: </label><br>
					<!-- Set value to Land as it cannot be anything other than Land when entering a Land property, disabled the box so cannot be edited -->
					<input type="text" name="property_type" id="property_type" value = "Land" disabled>
				</div>



				<!-- Container for Eircode -->
				<div class = "inputbox">
					<!-- Use of span for required fields to signify to user -->
					<label for = "eircode">Eircode: <span class="required">*</span></label><br>
					<!-- Pattern: Eircode 1 alpha char(upper or lowercase) followed by TWO digits, zero to one spaces any four of a alpha char or number -->
					<input type="text" name="eircode" id="eircode" required autofocus placeholder="Y21 234" pattern="[A-Za-z]{1}\d{2}[ ]?[A-Za-z\d]{4}" autofocus title="Valid Eircode is required (e.g Y21 R234)">
				</div>

				<!-- Container for Location -->
				<div class = "inputbox">
					<label for ="location">Location: <span class="required">*</span></label><br>
					<input type="text" name="location" id="location" required placeholder="Carlow">
				</div>

				<!-- Container for Status -->
				<div class = "inputbox">
					<label for ="status">Status: </label><br>
					<select name = "status" id = status disabled> 			
						<option value="0">For Sale</option>  
						<option value="1">Sale Agreed</option>  
						<option value="2">Sale Complete</option>  
					</select>
				</div>

				<!-- Container for Owner -->
				<div class = "inputbox">
					<label for = "owner">Owner: </label><br>
					<input type="number" name="owner" id="owner">
				</div>

				<!-- Container for Asking Price -->
				<div class = "inputbox">
					<label for = "price">Asking Price: <span class="required">*</span></label><br>
					<!-- Min = €1, max = €100 million-->
					<input type="number" name="price" id="price" placeholder="€400000" min="1" max="100000000" required>
				</div>

				<!-- Container for Viewing Times -->
				<div class = "inputbox">
					<label for = "viewing_times">Viewing Times: <span class="required">*</span></label><br>
					<!-- Pattern  allows for any alphabetic/number character, space's hyphens and colons-->
					<input type="text" name="viewing_times" id="viewing_times" placeholder= "Weekends 12pm - 5pm" required pattern="[A-Za-z \d\-\:]+">
				</div>  

			</fieldset>

			<!-- Begin Fieldset for Land Specific Details -->
			<fieldset>

				<legend>Land-Specific Details</legend>

				<!-- Container for Address -->
				<div class = "inputbox">
					<label for ="adrs">Address: <span class="required">*</span></label><br>
					<input type="text" name="adrs" id="adrs" required placeholder="Line 1 (Required)"> <br><br>
					<input type="text" name="adrs2" id="adrs2" placeholder="Line 2 (Optional)"> <br><br>
					<input type="text" name="adrs3" id="adrs3" placeholder="Line 3 (Optional)"> 
				</div>

				<!-- Container for Acres -->
				<div class = "inputbox">
					<label for ="acres">Acres: <span class="required">*</span></label><br>
					<!-- Min 1 - validation that we have atleast an acre of land, max=1000000 (one hundread thousand acres)-->
					<input type="number" name="acres" id="acres" required placeholder="2500" min="1" max="100000">
				</div>

				<!-- Container for Buildings -->
				<div class = "inputbox">
					<label for = "buildings">Buildings: <span class="required">*</span></label><br>
					<input type="text" name="buildings" id="buildings" required placeholder="Two large buildings, one shed">
				</div>

				<!-- Container for Residence Details -->
				<div class = "inputbox">
					<label for ="details">Residence Details: <span class="required">*</span></label><br>
					<input type="text" name="details" id="details" required placeholder="4 bedroom period residence in need of repair">
				</div>

				<!-- Container for Quotas -->
				<div class = "inputbox">
					<label for ="quotas">Quotas: <span class="required">*</span></label><br>
					<!-- Max set to 1 million -->
					<input type="number" name="quotas" id="quotas" required placeholder="50000" min="0" max="1000000" title = "A quota may represent the amount of produce permitted to be produced (e.g 500,000 litres of milk)">
				</div>

				<!-- Container for Notes -->
				<div class = "inputbox">
					<label for = "notes">Notes: </label><br>
					<input type="text" name="notes" id="notes" placeholder="Exceptional condition, beautiful view, next to local village">
				</div>

			</fieldset>
			<!-- End Form COntainer -->
		</div>

		<!-- Submit/Reset buttons -->
		<div class = "myButton">
			<input type="submit" value = "Add Land" name = "submit" id="submit" class ="button" disabled>
			<!-- Note, on click reset re-locks fields -->
			<input type="reset" value = "Reset" name = "reset" class ="button" onclick="toggleLock()">
		</div>

	</form>
	<!-- End Main Content Area -->
</div>