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

        <!--linked javascript-->
        <script src="makeBid.js"></script>

        <!-- Fixed Top Bar displaying the page title -->
        <div class="topBar">EstateFlow</div>
       
        <!-- Sidebar Navigation Menu -->
        <div class="sidebar">
            <!-- Logo Section inside Sidebar -->
            <div class="logo">
                <a href ="../../menu.html"><img src="../../images/logo.png" alt="EstateFlow Logo"></a>
            </div>
            <!-- Navigation Links -->
            <a class ="button selected" href="make_bid.html">Make a Bid</a>
            <a class ="button" href="../../construction/withdraw_bid.html">Withdraw a Bid</a>
            <a class ="button" >Exit</a>
        </div>
        
        <!-- Main Content Area -->
        <div class="content">
            <form name="makeBidForm" class="mainForm" action="makeBid.php" method="Post" onsubmit="return validateForm()">

                <?php include "makeBid-listBox.php";?>

                <!--client box fields-->
                <div class="field">
                    <label for="client_id">Client Id</label>
                    <input type="text" name="client_id" id="client_id" class="clientFields" autocomplete=off disabled/>
                </div>
                <div class="field">
                    <label for="name">Client Name</label>
                    <input type="text" name="name" id="name" class="clientFields" autocomplete=off disabled/>
                </div>
                <div class="field">
                    <label for="address">Client Address</label>
                    <input type="text" name="address" id="address" class="clientFields" autocomplete=off disabled/>
                </div>
                <div class="field">
                    <label for="eircode">Client Eircode</label>
                    <input type="text" name="eircode" id="eircode" class="clientFields" autocomplete=off disabled/>
                </div>
                <div class="field">
                    <label for="phone_no">Client Phone</label>
                    <input type="text" name="phone_no" id="phone_no" class="clientFields" autocomplete=off disabled/>
                </div>
                <div class="field">
                    <label for="email">Client Email</label>
                    <input type="text" name="email" id="email" class="clientFields" autocomplete=off disabled/>
                </div>

                <!--property box fields-->
                <div class="field">
                    <label for="property_id">Property Id</label>
                    <input type="text" name="property_id" id="property_id" class="propertyFields" autocomplete=off disabled/>
                </div>
                <div class="field">
                    <label for="address">Property Address</label>
                    <input type="text" name="address" id="address"class="propertyFields"  autocomplete=off disabled/>
                </div>
                <div class="field">
                    <label for="eircode">Property Eircode</label>
                    <input type="text" name="eircode" id="eircode"class="propertyFields"  autocomplete=off disabled/>
                </div>
                <div class="field">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location"class="propertyFields"  autocomplete=off disabled/>
                </div>
                <div class="field">
                    <label for="highest_bid">Highest Bid</label>
                    <input type="text" name="highest_bid" id="highest_bid"class="propertyFields"  autocomplete=off disabled/>
                </div>
                <div class="field">
                    <label for="asking_price">Asking Price</label>
                    <input type="text" name="asking_price" id="asking_price"class="propertyFields"  autocomplete=off disabled/>
                </div>                
                <div class="field">
                    <label for="viewing_times">Viewing Times</label>
                    <input type="text" name="viewing_times" id="viewing_times"class="propertyFields"  autocomplete=off disabled/>
                </div>

                <!--normal fields-->

                <!--amount-->
                <div class="field">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" id="amount" placeholder="100.00" autocomplete=off required/>
                </div>

                <!--date-->
                <div class="field">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" placeholder="01-01-1970" autocomplete=off required/>
                </div>
                

                <!--buttons-->
                <div class="buttons">
                    <input class="button" type="submit" value="submit"/>
                    <input class="button" type="reset" value="Clear"/>
                </div>
            </form>
        </div> 
    </body>
</html>