<?php
// Gets the last AUTO ID value inserted, meaning we don't have to prompt the user for an input on what the property id of this land property is
    $property_id = mysqli_insert_id($con);
    echo "$property_id";
?>