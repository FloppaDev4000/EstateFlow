<!-- Estate Flow - Add Land Page  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Sets title -->
    <title>EstateFlow - Add Land</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="..\menu.css">
    <link rel="stylesheet" href="add_land.css">
    <script src="add_land.js"></script>

</head>
<body onload="toggleLock()">

    <!-- Fixed Top Bar displaying the page title -->
    <div class="topBar">EstateFlow</div>
   
    <!-- Sidebar Navigation Menu -->
    <div class="sidebar" id="mySidebar">
        <!-- Logo Section inside Sidebar -->
        <div class="logo">
            <a href ="..\menu.html"><img src="..\images/logo.png" alt="EstateFlow Logo"></a>
        </div>
        <!-- Navigation Links -->
        <a class ="button" href="..\Darius/add_residential.html">Add a New Resedential Property</a>
        <a class ="button" href="..\Darius/delete_residential.html">Delete a Residential Property</a>
        <a class ="button" href="..\Darius/view_residential.html">Amend/View a Residential Property</a>
        <a class ="button selected" href="add_land.html">Add a New Land Property</a>
        <a class ="button" href="delete_land.html">Delete a Land Property</a>
        <a class ="button" href="view_land.html">Amend/View a Land Property</a>
        <a class ="button" href="..\Amelia/add_office.html">Add a New Office Property</a>
        <a class ="button" href="..\Amelia/delete_office.html">Delete a New Office Property</a>
        <a class ="button" href="..\Amelia/view_office.html">Amend/View an Office Property</a>
        <a class ="button" >Exit</a>
    </div>
    
    <!-- Main Content Area -->
    <div class="content">
        <!-- Start form, sending info via Post to add_land.php -->
        <form action="add_land.php" method="Post">
            <!-- Set heading for the form -->
            <h1>Add a New Land Property</h1>

            <div class = "formContainer">
            <fieldset>

                <legend>Property Details</legend>

                <!-- Container for Listbox containing all clients w/ their client_id in the values-->
                <div class = "owner-listbox">
                    <label for = "owner-listbox">Property Owner: </label> 
                    <!-- Calls the php script to make the dynamic listbox and insert it into the form via an echo -->
                    <?php include 'add_land_listbox.php'; ?>
                </div>

                <div class = "inputbox">
                    <label for = "property_type">Property Type: </label><br/>
                    <!-- Set value to Land as it cannot be anything other than Land when entering a Land property, disabled the box so cannot be edited -->
                    <input type="text" name="property_type" id="property_type" value = "Land">
                </div>
    
                <!-- Container for Address -->
                <div class = "inputbox">
                    <label for ="adrs">Address: </label><br/>
                    <input type="text" name="adrs" id="adrs" required autofocus placeholder="Carlow St, Carlow">
                </div>
    
                <!-- Container for Eircode -->
                <div class = "inputbox">
                    <label for = "eircode">Eircode: </label><br/>
                    <!-- Pattern: Eircode 1 alpha char(upper or lowercase) followed by TWO digits, any number of spaces then another alpha char and THREE digits -->
                    <input type="text" name="eircode" id="eircode" placeholder="Y21 234" pattern="[A-Za-z]?\d{2} *[A-Za-z]?\d{3}">
                </div>
                <!-- Container for Location -->
                <div class = "inputbox">
                    <label for ="location">Location: </label><br/>
                    <input type="text" name="location" id="location" required placeholder="Carlow">
                </div>
                <!-- Container for Status -->
                <div class = "inputbox">
                    <label for ="status">Status: </label><br/>
                    <input type="int" name="status" id="status" pattern="[0-1]{1}">
                </div>
                <!-- Container for Owner -->
                <div class = "inputbox">
                    <label for = "owner">Owner: </label><br/>
                    <input type="number" name="owner" id="owner" placeholder="00001">
                </div>

                <!-- Container for Highest Bid -->
                <div class = "inputbox">
                    <label for = "bid">Highest Bid: </label><br/>
                    <input type="number" name="bid" id="bid" min="1">
                </div>

                <!-- Container for Asking Price -->
                <div class = "inputbox">
                    <label for = "price">Asking Price: </label><br/>
                    <input type="number" name="price" id="price" min="1">
                </div>
                
                <!-- Container for Viewing Times -->
                <div class = "inputbox">
                    <label for = "viewing_times">Viewing Times: </label><br/>
                    <input type="text" name="viewing_times" id="viewing_times">
                </div>
                
                <!-- Container for Date Listed -->
                <div class = "inputbox">
                    <label for = "date_listed">Date Listed: </label><br/>
                    <input type="date" name="date_listed" id="date_listed" onblur="checkDate(this)">
                </div>                
                </fieldset>

                <fieldset>
                <legend>Land-Specific Details</legend>
            <!-- Container for Property ID-->
            <!-- <div class = "inputbox">
                <label for = "property_id">Property ID: </label><br/>
                <input type="number" name="property_id" id="property_id" required placeholder="00001">
            </div> -->

            <br><br>

            <!-- Container for Acres -->
            <div class = "inputbox">
                <label for ="acres">Acres: </label><br/>
                <input type="number" name="acres" id="acres" required placeholder="2500" min="1">
            </div>

            <br><br>

            <!-- Container for Buildings -->
            <div class = "inputbox">
                <label for = "buildings">Buildings: </label><br/>
                <input type="text" name="buildings" id="buildings" placeholder="Two large buildings, one shed">
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
                <input type="number" name="quotas" id="quotas" placeholder="50.00" min="0" max="100">
            </div>

            <br><br>

            <!-- Container for Notes -->
            <div class = "inputbox">
                <label for = "notes">Notes: </label><br/>
                <input type="text" name="notes" id="notes" placeholder="Exceptional condition, beautiful view, next to local village">
            </div>


        </div>

                <!-- Submit/Reset buttons -->
                <div class = "myButton">
                    <input type="submit" value = "Send Form" name = "submit" class ="button" onclick="confirmCheck()"/>
                    <input type="reset" value = "Clear Form" name = "reset" class ="button"/>
                </div>
        </form>

    </div>

</body>
</html>