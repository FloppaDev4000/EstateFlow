<!--NAME:   Adam Noonan-->
<!--NUMBER: C00299231-->
<!--FILE:   Make Bid main file-->

<?php include "../bidHead.php";?>
        
<!-- Main Content Area -->
<div class="content">
    <!--linked javascript-->
    <script src="makeBid.js"></script>

    <form name="makeBidForm" class="mainForm" action="makeBid.php" method="Post" onsubmit="return validateForm()">

        <h1>Make a Bid</h1>

        <?php include "makeBid-listBox.php";?>
		
		<div class="formContainer">

        <!--client box fields-->
        <fieldset id="clientFieldset">
            <legend>Client Details</legend>
            <div class="field">
                <label for="client_id">Client Id</label>
                <input type="text" name="client_id" id="client_id" class="clientFields" autocomplete=off readonly/>
            </div>
            <div class="field">
                <label for="name">Client Name</label>
                <input type="text" name="name" id="name" class="clientFields" autocomplete=off readonly/>
            </div>
            <div class="field">
                <label for="cAddress">Client Address</label>
                <input type="text" name="cAddress" id="cAddress" class="clientFields" autocomplete=off readonly/>
            </div>
            <div class="field">
                <label for="cEircode">Client Eircode</label>
                <input type="text" name="cEircode" id="cEircode" class="clientFields" autocomplete=off readonly/>
            </div>
            <div class="field">
                <label for="phone_no">Client Phone</label>
                <input type="text" name="phone_no" id="phone_no" class="clientFields" autocomplete=off readonly/>
            </div>
            <div class="field">
                <label for="email">Client Email</label>
                <input type="text" name="email" id="email" class="clientFields" autocomplete=off readonly/>
            </div>
        </fieldset>

        <!--property box fields-->
        <fieldset id="propertyFieldset">
            <legend>Property Details</legend>
            <div class="field">
                <label for="property_id">Property Id</label>
                <input type="text" name="property_id" id="property_id" class="propertyFields" autocomplete=off readonly/>
            </div>
            <div class="field">
                <label for="pAddress">Property Address</label>
                <input type="text" name="pAddress" id="pAddress"class="propertyFields"  autocomplete=off readonly/>
            </div>
            <div class="field">
                <label for="pEircode">Property Eircode</label>
                <input type="text" name="pEircode" id="pEircode"class="propertyFields"  autocomplete=off readonly/>
            </div>
            <div class="field">
                <label for="location">Location</label>
                <input type="text" name="location" id="location"class="propertyFields"  autocomplete=off readonly/>
            </div>
            <div class="field">
                <label for="highest_bid">Highest Bid</label>
                <input type="text" name="highest_bid" id="highest_bid"class="propertyFields"  autocomplete=off readonly/>
            </div>
            <div class="field">
                <label for="asking_price">Asking Price</label>
                <input type="text" name="asking_price" id="asking_price"class="propertyFields"  autocomplete=off readonly/>
            </div>                
            <div class="field">
                <label for="viewing_times">Viewing Times</label>
                <input type="text" name="viewing_times" id="viewing_times"class="propertyFields"  autocomplete=off readonly/>
            </div>
            <div class="field">
                <label for="type">Type</label>
                <input type="text" name="type" id="type"class="propertyFields"  autocomplete=off readonly/>
            </div>
        </fieldset>

        <!-----------------------SPECIFIC PROPERTY FIELDS!!!---------------------->
        <!--LAND-->
        <fieldset id="landFieldset" hidden>
            <legend>Land Details</legend>
            <div class="field landDiv" >
                <label for="acres">Acres</label>
                <input type="text" name="acres" id="acres"class="landFields"  autocomplete=off readonly/>
            </div>
            <div class="field landDiv" >
                <label for="buildings">Buildings</label>
                <input type="text" name="buildings" id="buildings"class="landFields"  autocomplete=off readonly/>
            </div>
            <div class="field landDiv" >
                <label for="residence_details">Residence Details</label>
                <input type="text" name="residence_details" id="residence_details"class="landFields"  autocomplete=off readonly/>
            </div>
            <div class="field landDiv" >
                <label for="quotas">Quotas</label>
                <input type="text" name="quotas" id="quotas"class="landFields"  autocomplete=off readonly/>
            </div>
            <div class="field landDiv" >
                <label for="lNotes">Notes</label>
                <input type="text" name="lNotes" id="lNotes"class="landFields"  autocomplete=off readonly/>
            </div>
        </fieldset>

        <!--OFFICE-->
        <fieldset id="officeFieldset" hidden>
            <legend>Office Details</legend>

            <div class="field officeDiv" >
                <label for="floor">Floor</label>
                <input type="text" name="floor" id="floor"class="officeFields"  autocomplete=off readonly/>
            </div>
            <div class="field officeDiv" >
                <label for="oArea">Area</label>
                <input type="text" name="oArea" id="oArea"class="officeFields"  autocomplete=off readonly/>
            </div>
            <div class="field officeDiv" >
                <label for="layout">Layout</label>
                <input type="text" name="layout" id="layout"class="officeFields"  autocomplete=off readonly/>
            </div>
            <div class="field officeDiv" >
                <label for="internet">Security</label>
                <input type="text" name="internet" id="internet"class="officeFields"  autocomplete=off readonly/>
            </div>
            <div class="field officeDiv" >
                <label for="access">Access</label>
                <input type="text" name="access" id="access"class="officeFields"  autocomplete=off readonly/>
            </div>
            <div class="field officeDiv" >
                <label for="telephone_system">Telephone System</label>
                <input type="text" name="telephone_system" id="telephone_system"class="officeFields"  autocomplete=off readonly/>
            </div>
            <div class="field officeDiv" >
                <label for="oReception">Reception</label>
                <input type="text" name="oReception" id="oReception"class="officeFields"  autocomplete=off readonly/>
            </div>
            <div class="field officeDiv" >
                <label for="security">Security</label>
                <input type="text" name="security" id="security"class="officeFields"  autocomplete=off readonly/>
            </div>
            <div class="field officeDiv" >
                <label for="canteen">Canteen</label>
                <input type="text" name="canteen" id="canteen"class="officeFields"  autocomplete=off readonly/>
            </div>
            <div class="field officeDiv" >
                <label for="ownership">Ownership</label>
                <input type="text" name="ownership" id="ownership"class="officeFields"  autocomplete=off readonly/>
            </div>
        </fieldset>

        <!--RESIDENTIAL-->
        <fieldset id="residentialFieldset" hidden>
            <legend>Residential Details</legend>

            <div class="field residentialDiv" >
                <label for="levels">Levels</label>
                <input type="number" name="levels" id="levels"class="residentialFields"  autocomplete=off readonly/>
            </div>
            <div class="field residentialDiv" >
                <label for="rReception">Reception</label>
                <input type="text" name="rReception" id="rReception"class="residentialFields"  autocomplete=off readonly/>
            </div>
            <div class="field residentialDiv" >
                <label for="bedrooms">Bedrooms</label>
                <input type="text" name="bedrooms" id="bedrooms"class="residentialFields"  autocomplete=off readonly/>
            </div>
            <div class="field residentialDiv" >
                <label for="bathrooms">Bathrooms</label>
                <input type="text" name="bathrooms" id="bathrooms"class="residentialFields"  autocomplete=off readonly/>
            </div>
            <div class="field residentialDiv" >
                <label for="rArea">Area</label>
                <input type="text" name="rArea" id="rArea"class="residentialFields"  autocomplete=off readonly/>
            </div>
            <div class="field residentialDiv" >
                <label for="heating">Heating</label>
                <input type="text" name="heating" id="heating"class="residentialFields"  autocomplete=off readonly/>
            </div>
            <div class="field residentialDiv" >
                <label for="rNotes">Notes</label>
                <input type="text" name="rNotes" id="rNotes"class="residentialFields"  autocomplete=off readonly/>
            </div>
            <div class="field residentialDiv" >
                <label for="amenities">Amenities</label>
                <input type="text" name="amenities" id="amenities"class="residentialFields"  autocomplete=off readonly/>
            </div>
        </fieldset>
		</div>

        <!--normal fields-->
        <br><br>

        <!--amount-->
        <div class="field myInput">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" placeholder="100.00" autocomplete=off required/>
        </div>
		<br>

        <!--date-->
        <div class="field myInput">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" placeholder="01-01-1970" autocomplete=off required/>
        </div>
        
		<br><br>
        <!--buttons-->
        <div class="buttons">
            <input class="myButton" type="submit" value="submit"/>
            <input class="myButton" type="reset" value="Clear"/>
        </div>
    </form>
</div> 
</body>
</html>