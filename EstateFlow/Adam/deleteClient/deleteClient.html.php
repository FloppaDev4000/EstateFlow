<!--NAME:   Adam Noonan                 -->
<!--NUMBER: C00299231                   -->
<!--FILE:   deleteClient.html.php    -->

<?php include "../clientHead.php";?>
   
<!-- Main Content Area -->
<div class="content">

    <!--Header-->
    <h1>Delete a Client</h1>

    <!--linked javascript-->
    <script src="deleteClient.js"></script>
    <form name="deletClientForm" class="mainForm" action="deleteClient.php" method="Post" onsubmit="return validateForm()">

        <!--name-->
        <div class="field listBox">
            <?php include "deleteClient-listBox.php";?>
        </div>
		<fieldset>
            <legend>Client Details</legend>
            <!--------------------------------->

            <!--num-->
            <div class="field">
                <label for="client_id">Client ID</label>
                <input class="canPopulate" type="text" id="client_id" name="client_id" readonly>
            </div>

            <!--name-->
            <div class="field">
                <label for="name">Client Name</label>
                <input class="canPopulate" type="text" id="name" name="name" readonly>
            </div>

            <!--address-->
            <div class="field">
                <label for="address">Client Address</label>
                <input class="canPopulate" type="text" id="address" name="address" readonly>
            </div>

            <!--eircode-->
            <div class="field">
                <label for="eircode">Client Eircode</label>
                <input class="canPopulate" type="text" id="eircode" name="eircode" readonly>
            </div>

            <!--phone num-->
            <div class="field">
                <label for="phone_no">Client Phone Number</label>
                <input class="canPopulate" type="text" id="phone_no" name="phone_no" readonly>
            </div>

            <!--email address-->
            <div class="field">
                <label for="email">Client Email</label>
                <input class="canPopulate" type="text" id="email" name="email" readonly>
            </div>

            <p id="warning">
                
            </p>

		</fieldset>
        <!--------------------------------->

        <!--buttons-->
        <div class="buttons">
            <input class="myButton" type="submit" value="submit"/>
            <input class="myButton" type="reset" value="Clear" onclick="clearForm()"/>
        </div>
    </form>
</div>
</body>
</html>