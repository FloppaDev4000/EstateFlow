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

    // convert values to array by delimiter
    var personDetails = result.split('#');
    
    // grab elements by class
    var entries = document.getElementsByClassName("canPopulate");
    
    // place values in fields with loop
    for(var i = 0; i < entries.length; i++)
    {
        entries[i].value = personDetails[i];
    }
}

function toggleLock()
{
    // grab elements by class
    var items = document.getElementsByClassName("canToggleLock");
    
    // get boolean value
    var newToggleValue = (document.getElementById("amendViewButton").value == "Amend Details")
	
	if(newToggleValue)
    {
		// set values with loop
		for(var i = 0; i < items.length; i++)
		{
			items[i].readOnly = true
		}
        amendViewButton.value = "View Details";
    }
    else
    {
		// set values with loop
		for(var i = 0; i < items.length; i++)
		{
			items[i].readOnly = false
		}
        amendViewButton.value = "Amend Details";
    }
}