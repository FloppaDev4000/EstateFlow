<!-- Estate Flow - Land Maintenance  -->
<!--Name: Mark Lambert,
Student ID: C00192497
Purpose: Land Maintenance Main Hub Menu Page
Date: February 2025
EstateFlow Project Y2 2025 -->
<html lang="en">
    <head>
        <!-- Sets title -->
        <title>EstateFlow - Land Property Maintenance</title>
        <meta charset="UTF-8">
        <!-- Style sheets -->
        <link rel="stylesheet" href="../menu.css">
        <link rel="stylesheet" href="land.css">
        <!-- Set browser icon -->
        <link rel="icon" type="image/x-icon" href="../images/icon.png">

    </head>

<!-- Onload, the form locks, unlocks once user selects a client-->
<body onload="toggleLock()">

    <!-- Fixed Top Bar displaying the page title -->
    <div class="topBar">EstateFlow</div>
   
    <!-- Sidebar Navigation Menu -->
    <div class="sidebar" id="mySidebar">
        <!-- Logo Section inside Sidebar -->
        <div class="logo">
            <a href ="../menu.html"><img src="../images/logo.png" alt="EstateFlow Logo"></a>
        </div>
        <!-- Navigation Links -->
        <a id="addLand"class ="button" href="add_land.html.php">Add a New Land Property</a>
        <a id="deleteLand"class ="button" href="delete_land.html.php">Delete a Land Property</a>
        <a id="amendLand"class ="button" href="view_land.html.php">Amend/View a Land Property</a>
        <br>
		<a class ="button" id="exit" href="../menu.html">Exit</a>
    </div>
