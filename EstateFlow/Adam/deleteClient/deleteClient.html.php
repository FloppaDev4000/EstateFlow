<!DOCTYPE html>
<html>
    <head>
        <title>EstateFlow - Delete Client</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../menu.css">
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
            <a class ="button selected" href="deleteClient.html.php">Delete a Client</a>
            <a class ="button" href="../amendViewClient/viewClient.html.php">Amend/View a Client</a>
            <a class ="button" >Exit</a>
        </div>
   
        <!-- Main Content Area -->
        <div class="content">
            <!--linked javascript-->
            <script src="deleteClient.js"></script>
            <form name="deletClientForm" class="mainForm" action="deleteClient.php" method="Post" onsubmit="return validateForm()">

                <!--name-->
                <div class="field">
                    <?php include "deleteClient-listBox.php";?>
                </div>

                <!--------------------------------->

                <!--num-->
                <div class="field">
                    <label for="client_id">Client ID</label>
                    <input type="text" id="client_id" name="client_id" readonly>
                </div>

                <!--name-->
                <div class="field">
                    <label for="name">Client Name</label>
                    <input type="text" id="name" name="name" readonly>
                </div>

                <!--address-->
                <div class="field">
                    <label for="address">Client Address</label>
                    <input type="text" id="address" name="address" readonly>
                </div>

                <!--eircode-->
                <div class="field">
                    <label for="eircode">Client Eircode</label>
                    <input type="text" id="eircode" name="eircode" readonly>
                </div>

                <!--phone num-->
                <div class="field">
                    <label for="phone_no">Client Phone Number</label>
                    <input type="text" id="phone_no" name="phone_no" readonly>
                </div>

                <!--email address-->
                <div class="field">
                    <label for="email">Client Email</label>
                    <input type="text" id="email" name="email" readonly>
                </div>

                <!--------------------------------->

                <!--buttons-->
                <div class="buttons">
                    <input class="button" type="submit" value="submit"/>
                    <input class="button" type="reset" value="Clear"/>
                </div>
            </form>
        </div>
    </body>
</html>