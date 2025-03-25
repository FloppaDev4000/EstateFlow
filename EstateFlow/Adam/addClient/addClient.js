//NAME:   Adam Noonan
//NUMBER: C00299231
//FILE:   addClient.js

// init values
document.title = "EstateFlow - Add a New Client";
document.getElementById("addLink").className = "button selected";

// confirm form entry
function validateForm()
{
    // validation success: confirm
    return confirm("Are you sure you wish to add this client?");
} 