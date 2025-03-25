
 <!-- PHP script to connect to database -->
 <?php
// Variables containing login information for DB
    $hostname = "localhost";
    $username = "bidmaster";
    $password = "Egg_1122!";
    $dbname = "EstateFlow";

    // Variable con, calls the connect method
    $con = mysqli_connect($hostname, $username, $password, $dbname);

    // If connection fails, print an error message
    if(!$con)
    {
        // Exit
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
?>