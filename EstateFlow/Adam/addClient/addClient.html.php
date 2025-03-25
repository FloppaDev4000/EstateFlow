<!--NAME:   Adam Noonan     -->
<!--NUMBER: C00299231       -->
<!--FILE:   addClient.html  -->

<?php include "../clientHead.php";?>
    
<!-- Main Content Area -->
<div class="content">
    <!--linked javascript-->
    <script src="addClient.js"></script>
	<h1>Add a New Client</h1>
    <form name="clientForm" class="mainForm" action="addClient.php" method="Post" onsubmit="return validateForm()">
		
		<fieldset>
			<legend>Client Details</legend>

            <!--name-->
            <div class="field">
                <label for="name">Name</label>
                <input class="clientFields" type="text" name="name" id="name" pattern="[^']*" placeholder="Dave Seville" autocomplete=off required title="Apostrophes (') are disallowed"/>
            </div>

            <!--address-->
            <div class="field">
                <label for="address">Address</label>
                <input class="clientFields" type="text" name="address" id="address" pattern="[^']*" placeholder="11 location St, Carlow" autocomplete=off required title="Apostrophes (') are disallowed"/>
            </div>

            <!--eircode-->
            <div class="field">
                <label for="eircode">Eircode</label>
                <input class="clientFields" type="text" name="eircode" id="eircode" pattern="[a-zA-Z][0-9]{2}[ -]{0,1}[a-zA-Z0-9]{4}" placeholder="A11 B2C3" autocomplete=off required title="7 characters, case insensitive, space optional"/>
            </div>

            <!--phone no-->
            <div class="field">
                <label for="phone_no">Phone Number</label>
                <input class="clientFields" type="text" name="phone_no" id="phone_no" pattern="[0-9]*" placeholder="1112223333" autocomplete=off required title="Full phone no. without spaces"/>
            </div>

            <!--email-->
            <div class="field">
                <label for="email">Email</label>
                <input class="clientFields" type="text" name="email" id="email" pattern="[^']*@[^']*" placeholder="example@mail.com" autocomplete=off required title="Regular email address. At the least, an @ symbol surrounded by other characters"/>
            </div>

            <!--buyer-->
            <div class="field">
                <label for="buyer">Buyer</label>
                <input class="check" type="checkbox" name="buyer" id="buyer" autocomplete=off/>
            </div>

            <!--seller-->
            <div class="field">
                <label for="seller">Seller</label>
                <input class="check" type="checkbox" name="seller" id="seller" autocomplete=off/>
            </div>
		</fieldset>

        <!--buttons-->
        <div class="buttons">
            <input class="myButton" type="submit" value="submit"/>
            <input class="myButton" type="reset" value="Clear"/>
        </div>
    </form>
</div>
</body>
</html>