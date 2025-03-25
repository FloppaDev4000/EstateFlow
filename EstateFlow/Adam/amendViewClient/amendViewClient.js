//NAME:   Adam Noonan
//NUMBER: C00299231
//FILE:   amendViewClient.js

// set page-specific values on page load
document.title = "EstateFlow - Amend/View a Client";
document.getElementById("amendLink").className = "button selected";

// function to validate form inputs
function validateForm()
{
    return confirm("Are you sure you want to submit?");
}

// place relevant values in fields based on listbox selection
function populate()
{
    // get listbox
    var sel = document.getElementById("clientBox");
    // get values from listbox
    var result = sel.options[sel.selectedIndex].value;
	
	// no action for default value
	if(result == "")
	{
		return;
	}

    // convert values to array by delimiter
    var personDetails = result.split(';!');
    
    // grab elements by class
    var entries = document.querySelectorAll(".canPopulate");
    
    // place values in fields with loop
    for(var i = 0; i < entries.length; i++)
    {
        entries[i].value = personDetails[i];
    }
}

function toggleLock()
{
    // grab elements by class
    var items = document.querySelectorAll(".canToggleLock");
    
    // get boolean value
    var newToggleValue = (document.getElementById("amendViewButton").value == "Amend Details")
	
	if(newToggleValue) // if new value is view
    {
		// set values with loop
		for(var i = 0; i < items.length; i++)
		{
			items[i].setAttribute('readonly', true);
		}
        amendViewButton.value = "View Details";
    }
    else // if new value is amend
    {
		// set values with loop
		for(var i = 0; i < items.length; i++)
		{
			items[i].removeAttribute('readonly');
		}
        amendViewButton.value = "Amend Details";
    }
}