<!-- Estate Flow - View Client Page  -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Sets title -->
        <title>EstateFlow - Amend/View Client</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../menu.css">
		<script src="amendViewClient.js"></script>
    </head>

    <body>

        <!-- Fixed Top Bar displaying the page title -->
        <div class="topBar">EstateFlow</div>
    
        <!-- Sidebar Navigation Menu -->
        <div class="sidebar" id="mySidebar">
            <!-- Logo Section inside Sidebar -->
            <div class="logo">
                <a href ="../../menu.html"><img src="../../images/logo.png" alt="EstateFlow Logo"></a>
            </div>
            <!-- Navigation Links -->
            <a class ="button" href="../addClient/addClient.html">Add a New Client</a>
            <a class ="button" href="../deleteClient/deleteClient.html.php">Delete a Client</a>
            <a class ="button selected" href="amendViewClient.html.php">Amend/View a Client</a>
            <a class ="button">Exit</a>
        </div>
        
        <!-- Main Content Area -->
        <div class="content">
            <h2>Amend/View a Client</h2>

            <input type="button" value="View Details" id="amendViewButton" onclick="toggleLock()">

            <form name="amendViewForm" action="amendViewClient.php" method="Post" onsubmit="return validateForm()">

                <?php include 'amendViewClient-listBox.php';?>
                

                <!--client_id-->
                <div class="field">
                    <label for="client_id">Client id</label>
                    <input type="text" name="client_id" id="client_id" readonly class="canPopulate"> <!--cannot toggleLock-->
                </div>

                <!--name-->
                <div class="field">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" readonly class="canPopulate canToggleLock">
                </div>

                <!--address-->
                <div class="field">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" readonly class="canPopulate canToggleLock">
                </div>
                
                <!--eircode-->
                <div class="field">
                    <label for="eircode">Eircode</label>
                    <input type="text" name="eircode" id="eircode" readonly class="canPopulate canToggleLock">
                </div>

                <!--phone_no-->
                <div class="field">
                    <label for="phone_no">Phone No</label>
                    <input type="text" name="phone_no" id="phone_no" readonly class="canPopulate canToggleLock">
                </div>

                <!--email-->
                <div class="field">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" readonly class="canPopulate canToggleLock">
                </div>

                <input type="submit" value="Submit">

            </form>
        </div>

    </body>
</html>