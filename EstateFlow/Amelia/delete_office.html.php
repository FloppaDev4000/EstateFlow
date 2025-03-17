<!-- Name:                 Amelia Hamulewicz -->
<!-- Student Number:       C00296605 -->
<!-- Title:                Task 1  -->
<!-- Date:                 6 March 2025 --> 

<?php session_start(); ?>
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
        <a class ="button selected" href="delete_office.html.php">Delete an Office Property</a>
        <a class ="button" href="amendview_office.html.php">Amend/View an Office Property</a>
        <a class ="button" >Exit</a>
    </div>
    <div class="content">
        <!-- heading -->
        <h1>Delete a Property</h1>
        <h4>Please select a property and then click the delete button</h4>

        <script>
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
                document.getElementById("delp_id").value = propertyDetails[1]; // Property ID
                document.getElementById("delowner").value = propertyDetails[2]; // Owner Name
                document.getElementById("deltype").value = propertyDetails[3]; // Property Type
                document.getElementById("deladdress").value = propertyDetails[4]; // Address
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
            }

            function confirmCheck() 
            {
                var response = confirm("Are you sure you want to delete the property?");
                
                if (response) 
                {
                    // Enable form fields for submission
                    document.getElementById("delp_id").disabled = false;
                    document.getElementById("delowner").disabled = false;
                    document.getElementById("deltype").disabled = false;
                    document.getElementById("deladdress").disabled = false;
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

        <p id="display"></p>

        <form action="delete.php" method="POST" onsubmit="return confirmCheck();">
            <h2>Delete an Office Property</h2> 
            
            <div class="formContainer">
                <!-- Property Details -->
                <fieldset>
                    <legend>Property Details</legend>
                    <p>
                        <label for="deleircode">Eircode: </label>
                        <?php include 'del_listbox.php'; ?>
                    </p>
                    
                    <p><label for="delp_id">Property ID: </label>
                    <input type="number" name="delp_id" id="delp_id" readonly disabled/></p>

                    <p><label for="delowner">Owner: </label>
                    <input type="text" name="delowner" id="delowner" required disabled/></p>

                    <p><label for="deltype">Property Type: </label>
                    <input type="text" name="deltype" id="deltype" readonly disabled/></p>

                    <p><label for="deladdress">Address: </label>
                    <input type="text" name="deladdress" id="deladdress" required disabled/></p>

                    <p><label for="delloc">Location: </label>
                    <input type="text" name="delloc" id="delloc"  required disabled/></p>

                    <p><label for="delprice">Asking Price: </label>
                    <input type="number" step="0.01" name="delprice" id="delprice" required disabled/></p>

                    <p><label for="deltimes">Viewing Times: </label>
                    <input type="text" name="deltimes" id="deltimes" required disabled/></p>

                    <p>
                        <label for="delstatus">Status: </label>
                        <select name="delstatus" id="delstatus" required disabled>
                            <option value="0">Sale</option>
                            <option value="1">Sale Agreed</option>
                            <option value="2">Sale Completed</option>
                        </select>
                    </p>

                    <p><label for="delhbid">Highest Bid: </label>
                    <input type="number" step="0.01" name="delhbid" id="delhbid" readonly disabled/></p>

                    <p><label for="dellist">Date Listed: </label>
                    <input type="date" name="dellist" id="dellist" required disabled/></p>
                </fieldset>
                
                <!-- Office Details -->
                <fieldset>
                    <legend>Office Details</legend>
                    <p><label for="delo_id">Office ID: </label>
                    <input type="number" name="delo_id" id="delo_id" readonly disabled/></p>

                    <p><label for="delfloor">Floor: </label>
                    <input type="text" name="delfloor" id="delfloor"  required disabled/></p>

                    <p><label for="delarea">Area (sqm): </label>
                    <input type="number" step="0.01" name="delarea" id="delarea" required disabled/></p>

                    <p><label for="dellayout">Layout: </label>
                    <input type="text" name="dellayout" id="dellayout"  required disabled/></p>

                    <p><label for="delinternet">Internet: </label>
                    <input type="text" name="delinternet" id="delinternet" required disabled/></p>

                    <p><label for="delaccess">Access: </label>
                    <input type="text" name="delaccess" id="delaccess"  required disabled/></p>

                    <p><label for="deltel">Telephone System: </label>
                    <input type="text" name="deltel" id="deltel" required disabled/></p>

                    <p><label for="delreception">Reception Facilities: </label>
                    <input type="text" name="delreception" id="delreception" required disabled/></p>

                    <p><label for="delsec">Type of Security: </label>
                    <input type="text" name="delsec" id="delsec" required disabled/></p>

                    <p><label for="delcanteen">Canteen Facilities: </label>
                    <input type="text" name="delcanteen" id="delcanteen"  required disabled/></p>

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