<!-- Estate Flow - Complete Sale Page  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Sets title -->
    <title>EstateFlow - Complete a Sale</title>
    <meta charset="UTF-8">
    <!-- external style sheets -->
    <link rel="stylesheet" href="..\menu.css">
	<link rel="stylesheet" href="office.css">
	<link rel="icon" type="image/x-icon" href="../images/icon.png">
</head>
<body>

<!-- Fixed Top Bar displaying the page title -->
<div class="topBar">EstateFlow</div>

<!-- Sidebar Navigation Menu -->
<div class="sidebar" id="mySidebar">
    <!-- Logo Section inside Sidebar -->
    <div class="logo">
        <a href ="..\menu.html"><img src="..\images/logo.png" alt="EstateFlow Logo"></a>
    </div>
    <!-- Navigation Links -->
    <a class ="button" href="..\construction/agree_sale.html">Agree a Sale</a>
    <a class ="button selected" href="complete_sale.html.php">Complete a Sale</a>
    <a class ="button" id="exit" href="../menu.html">Return to Menu</a>
</div>
    
<!-- Main Content Area -->
<div class="content">
    <?php
        // Include database connection file
        include 'db.inc.php';

        // Set the default timezone to Coordinated Universal Time (UTC)
        date_default_timezone_set("UTC");


        $sql = "UPDATE Property SET 
            status = '2',
            buyer_id = '{$_POST['buyer_id']}',
            price_paid = '{$_POST['price_paid']}',
            completion_date = '{$_POST['completion_date']}'
        WHERE property_id = '{$_POST['id']}'";

        // Execute the query and check for errors
        if (!mysqli_query($con, $sql)) {
            die("An Error in the SQL Query: " . mysqli_error($con)); // Output error message if query fails
        }

        // Close the database connection
        mysqli_close($con);
    ?>

    <div class="formContainer">
        <!-- Form to return to the insert page -->
        <form action="complete_sale.html.php" method="POST">
            <br>
            <input type="submit" value="Return to Insert Page"/>
        </form>
    </div>
</div>
</body>
</html>