/**
         * Function to confirm the user's intent to save changes.
         * This function is triggered when the form is submitted.
         * Returns true if the user confirms, otherwise prevents form submission.
         */
function confirmSubmission() {
    return confirm("Do you want to insert this record?");
}

function populateOwnerId() 
{
    // Get the dropdown element
    var sel = document.getElementById("owner");
    var selectedValue = sel.options[sel.selectedIndex].value;

    // Check if an owner is selected
    if (selectedValue === "" || selectedValue === " ") {
        document.getElementById("id").value = ""; // Clear the Owner ID if no owner is selected
        return;
    }

    // Populate the Owner ID field
    document.getElementById("id").value = selectedValue;
}

/**
 * Function to toggle the form fields between editable and read-only.
 * Triggered when the "Amend Details" button is clicked.
 */function toggleLock() {
    var selectedValue = document.getElementById("owner").value.trim();  // Trim to remove spaces

    if (selectedValue === null || selectedValue === "") {
        // Disable all form fields (read-only mode)
        document.getElementById("id").disabled = true;
        document.getElementById("type").disabled = true;
        document.getElementById("address").disabled = true;
        document.getElementById("eircode").disabled = true;
        document.getElementById("location").disabled = true;
        document.getElementById("asking_price").disabled = true;
        document.getElementById("viewing_times").disabled = true;
        document.getElementById("status").disabled = true;
        document.getElementById("highest_bid").disabled = true;

        document.getElementById("floor").disabled = true;
        document.getElementById("area").disabled = true;
        document.getElementById("layout").disabled = true;
        document.getElementById("internet").disabled = true;
        document.getElementById("access").disabled = true;
        document.getElementById("telephone_system").disabled = true;
        document.getElementById("reception").disabled = true;
        document.getElementById("security").disabled = true;
        document.getElementById("canteen").disabled = true;
        document.getElementById("ownership").disabled = true;
    } 
    else {
        populateOwnerId();

        // Enable the form fields for editing
        document.getElementById("id").disabled = false;
        document.getElementById("type").disabled = false;
        document.getElementById("address").disabled = false;
        document.getElementById("eircode").disabled = false;
        document.getElementById("location").disabled = false;
        document.getElementById("asking_price").disabled = false;
        document.getElementById("viewing_times").disabled = false;
        document.getElementById("status").disabled = false;
        document.getElementById("highest_bid").disabled = false;

        document.getElementById("floor").disabled = false;
        document.getElementById("area").disabled = false;
        document.getElementById("layout").disabled = false;
        document.getElementById("internet").disabled = false;
        document.getElementById("access").disabled = false;
        document.getElementById("telephone_system").disabled = false;
        document.getElementById("reception").disabled = false;
        document.getElementById("security").disabled = false;
        document.getElementById("canteen").disabled = false;
        document.getElementById("ownership").disabled = false;
    }
}
