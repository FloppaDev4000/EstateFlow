<!--NAME:   Adam Noonan                 -->
<!--NUMBER: C00299231                   -->
<!--FILE:   amendViewClient.html.php    -->

<?php include "../clientHead.php";?>
        
<!-- Main Content Area -->
<div class="content">
	<script src="amendViewClient.js"></script>
    <h1>Amend/View a Client</h1>

    <form class="mainForm" name="amendViewForm" action="amendViewClient.php" method="Post" onsubmit="return validateForm()">
        
		<div class="field listBox">
        	<?php include 'amendViewClient-listBox.php';?>
		</div>
        <br>
		<div class="buttons">
        <input type="button" value="View Details" id="amendViewButton" class="myButton" onclick="toggleLock()">
		</div>
			
		<fieldset>
			<legend>Client Details</legend>
        <!--client_id-->
        <div class="field">
            <label for="client_id">Client id</label>
            <input type="text" name="client_id" id="client_id" readonly required class="canPopulate"> <!--cannot toggleLock-->
        </div>

        <!--name-->
        <div class="field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" readonly class="canPopulate canToggleLock" required pattern="[^']*" title="Apostrophes (') are disallowed">
        </div>

        <!--address-->
        <div class="field">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" readonly class="canPopulate canToggleLock" required pattern="[^']*" title="Apostrophes (') are disallowed">
        </div>
        
        <!--eircode-->
        <div class="field">
            <label for="eircode">Eircode</label>
            <input type="text" name="eircode" id="eircode" readonly class="canPopulate canToggleLock" required pattern="[a-zA-Z][0-9]{2}[ -]{0,1}[a-zA-Z0-9]{4}" title="7 characters, case insensitive, space optional">
        </div>

        <!--phone_no-->
        <div class="field">
            <label for="phone_no">Phone No</label>
            <input type="text" name="phone_no" id="phone_no" readonly class="canPopulate canToggleLock" required pattern="[0-9]*" title="Full phone no. without spaces">
        </div>

        <!--email-->
        <div class="field">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" readonly class="canPopulate canToggleLock" required pattern="[^']*@[^']*" title="Regular email address. At the least, an @ symbol surrounded by other characters">
        </div>
		</fieldset>

        <div class="buttons">
            <input class="myButton" type="submit" value="submit"/>
            <input class="myButton" type="reset" value="Clear"/>
        </div>
    </form>
</div>
</body>
</html>