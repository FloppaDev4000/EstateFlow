
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
<body>

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
        <a class ="button" href="..\Amelia/add_office.html.php">Add a New Office Property</a>
        <a class ="button" href="..\Amelia/delete_office.html">Delete a New Office Property</a>
        <a class ="button" href="..\Amelia/view_office.html">Amend/View an Office Property</a>
        <a class ="button" >Exit</a>
    </div>
    
   <!-- Main Content Area -->
   <div class="content">
    <!-- Start form, sending info via Post to add_land.php -->
    <form action="view_land.php" onsubmit="return confirmCheck()" method="Post">
		

		<!-- Button which when clicked, calls the toggleLock function (toggleLock, switches between the two states of Amend and View) -->
			<div class = "myButton">
            	<input type = "button" value = "Amend Details" id = "amendViewbutton" onclick = "toggleLock()">
				<input type='button' value='Filter by Sold' id='filterLand' onclick='filterBySold()'>
				<input type='button' value='Filter by Not Sold' id='filterNotSold' onclick='filterByNotSold()'>
				<input type='button' value='Show All' id='filterAll' onclick='filterAll()'>

			</div>
        <!-- Set heading for the form -->
        <h1>Amend a Land Property</h1>

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
                    <input type="text" name="property_type" id="property_type" value = "Land" disabled>
                </div>
        
                <!-- Container for Eircode -->
                <div class = "inputbox">
                    <label for = "eircode">Eircode: </label><br/>
                    <!-- Pattern: Eircode 1 alpha char(upper or lowercase) followed by TWO digits, any number of spaces then another alpha char and THREE digits -->
                    <input type="text" name="eircode" id="eircode" required placeholder="Y21 234" pattern="[A-Za-z]?\d{2} *[A-Za-z]?\d{3}" disabled autofocus>
                </div>
                <!-- Container for Location -->
                <div class = "inputbox">
                    <label for ="location">Location: </label><br/>
                    <input type="text" name="location" id="location" required placeholder="Carlow" disabled>
                </div>
                <!-- Container for Status -->
                <div class = "inputbox">
                    <label for ="status">Status: </label><br/>
                    <select name = "status" id = status> 			
						<option value="0">For Sale</option>  
						<option value="1">Sale Agreed</option>  
                        <option value="2">Sale Complete</option>  
					</select>
                </div>
                <!-- Container for Owner -->
                <div class = "inputbox">
                    <label for = "ownerName">Owner: </label><br/>
                    <input type="text" name="ownerName" id="ownerName" disabled>
                </div>

                <!-- Container for Highest Bid -->
                <div class = "inputbox">
                    <label for = "bid">Highest Bid: </label><br/>
                    <input type="number" name="bid" id="bid" min="1" required disabled>
                </div>

                <!-- Container for Asking Price -->
                <div class = "inputbox">
                    <label for = "price">Asking Price: </label><br/>
                    <input type="number" name="price" id="price" min="1" required disabled>
                </div>
                
                <!-- Container for Viewing Times -->
                <div class = "inputbox">
                    <label for = "viewing_times">Viewing Times: </label><br/>
                    <input type="text" name="viewing_times" id="viewing_times" placeholder= "Weekends 12pm - 5pm" required disabled>
                </div>
                             
                </fieldset>
                <!-- Begin Fieldset for Land Specific Details -->
                <fieldset>
                <legend>Land-Specific Details</legend>

                            <!-- Container for Address -->
                <div class = "inputbox">
                    <label for ="adrs">Address: </label><br/>
                    <input type="text" name="adrs" id="adrs" required autofocus placeholder="Line 1 (Required)" disabled> <br><br>
                    <input type="text" name="adrs2" id="adrs2" autofocus placeholder="Line 2 (Optional)" disabled> <br><br>
                    <input type="text" name="adrs3" id="adrs3" autofocus placeholder="Line 3 (Optional)" disabled> 
                </div>

            <!-- Container for Acres -->
            <div class = "inputbox">
                <label for ="acres">Acres: </label><br/>
                <!-- Min 1 - validation that we have atleast an acre of land -->
                <input type="number" name="acres" id="acres" required placeholder="2500" min="1" disabled>
            </div>

            <br><br>

            <!-- Container for Buildings -->
            <div class = "inputbox">
                <label for = "buildings">Buildings: </label><br/>
                <input type="text" name="buildings" id="buildings" required placeholder="Two large buildings, one shed" disabled>
            </div>

            <br><br>

            <!-- Container for Residence Details -->
            <div class = "inputbox">
                <label for ="details">Residence Details: </label><br/>
                <input type="text" name="details" id="details" required placeholder="4 bedroom period residence in need of repair" disabled>
            </div>

            <br><br>

            <!-- Container for Quotas -->
            <div class = "inputbox">
                <label for ="quotas">Quotas: </label><br/>
                <input type="number" name="quotas" id="quotas" required placeholder="50" min="0" max="10000" disabled>
            </div>

            <br><br>

            <!-- Container for Notes -->
            <div class = "inputbox">
                <label for = "notes">Notes: </label><br/>
                <input type="text" name="notes" id="notes" placeholder="Exceptional condition, beautiful view, next to local village" disabled>
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
