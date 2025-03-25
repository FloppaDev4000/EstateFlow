// NAME:    Adam Noonan
// NUMBER:  C00299231
// FILE:    deleteClient.js

// set page-specific values on page load
document.title = "EstateFlow - Delete a Client";
document.getElementById("deleteLink").className = "button selected";

// function to validate form inputs
function validateForm()
{

    // get element
    let clientBox = document.getElementById("clientBox");

    // no client selected
    if(clientBox.value == "default")
    {
        alert("A client must be selected!");
        return false;
    }
    
    // one last check for user
    return confirm("Are you sure you want to submit?");
}

// populate form with values
function populateForm()
{
    // get entire result as delimited string
    var sel = document.getElementById("clientBox");
    var result = sel.options[sel.selectedIndex].value;
	
	// no action for default value
	if(result=="")
	{
		return;
	}

    // delimited string to array
    var clientDetails = result.split(';!');

    // fields array
    var clientFields = document.querySelectorAll(".canPopulate");

    // place values in fields
    for(let i = 0; i < clientDetails.length; i++)
    {
        clientFields[i].value = clientDetails[i];
    }
	
	// get relevant bids/properties and notify user if they exist
    // get uid
    let id = document.getElementById("client_id").value;
    let hiddenValue = document.querySelector("#hasBidsProperties").innerHTML;

    let relevantIDs = hiddenValue.split(" ");

    if(relevantIDs.includes(id))
    {
        document.getElementById("warning").textContent = "WARNING: This client has pending bids and/or properties. by deleting them, you will also delete these bids/properties."
    }
    else
    {
        document.getElementById("warning").textContent = ""
    }
}

function clearForm()
{
	document.getElementById("warning").textContent = "";
}