//Name: Mark Lambert
//Student ID: C00192497
//Purpose: delete_land javascript file
//Date: February 2025
//EstateFlow Y2 2025

// Function populate which populates the textboxes when the desired user is selected from the listbox            
function populate()
{
    // Selected person is got by the element with id listbox
    var sel = document.getElementById("listbox");
	
	var result;
	// Returns the value of the selected item in the listbox by going to the index in the listbox and calling .value
	result = sel.options[sel.selectedIndex].value;
	// Split the details by using the , as a delimeter
	var landDetails = result.split('#');

	//Checks if the user has selected something from the listbox by inspecting the first element in the array of results
	//which is for property type, if no value is in the field, it defaults to none, so if false, populate 
	if(!(landDetails[0] == "none"))
	{
		// Populate each element corresponding to their index in the landDetails array (which in turn is based off of how you inserted the values into the allText var in listbox.php)
		document.getElementById("property_type").value = landDetails[0];
		document.getElementById("adrs").value = landDetails[1];
		document.getElementById("eircode").value = landDetails[2];
		document.getElementById("location").value = landDetails[3];
		document.getElementById("status").value = landDetails[4];
		document.getElementById("bid").value = landDetails[5];
		document.getElementById("price").value = landDetails[6];
		document.getElementById("viewing_times").value = landDetails[7];
		document.getElementById("acres").value = landDetails[9];
		document.getElementById("buildings").value = landDetails[10];
		document.getElementById("details").value = landDetails[11];
		document.getElementById("quotas").value = landDetails[12];
		document.getElementById("notes").value = landDetails[13];
		document.getElementById("property_id").value = landDetails[14];
		document.getElementById("land_id").value = landDetails[8];
		document.getElementById("bid_id").value = landDetails[15];

		//Unlock everything to populate the form
		unlock();
		
	}
	//Then re-lock the fields so the user can't enter any info
	toggleLock();
}
// Function toggleLock() is called onload, locking all fields until the user selects a client first
function toggleLock()
{
	document.title = "EstateFlow - Delete Land";
	//Set a href class to button selected for specified page
	document.getElementById("deleteLand").className = "button selected";
	
    document.getElementById("property_type").disabled = true;
    document.getElementById("adrs").disabled = true;
    document.getElementById("adrs2").disabled = true;
    document.getElementById("adrs3").disabled = true;
    document.getElementById("eircode").disabled = true;
    document.getElementById("location").disabled = true;
    document.getElementById("status").disabled = true;
    document.getElementById("bid").disabled = true;
    document.getElementById("price").disabled = true;
    document.getElementById("viewing_times").disabled = true;
    document.getElementById("buildings").disabled = true;
    document.getElementById("acres").disabled = true;
    document.getElementById("details").disabled = true;
    document.getElementById("quotas").disabled = true;
    document.getElementById("notes").disabled = true;
}
//When we unlock, we only unlock fields that should be editable, leave the owner inputbox locked,
// as we got that info from the listbox, and we also don't need to edit the property_type tag
function unlock()
{
    document.getElementById("adrs").disabled = false;
    document.getElementById("adrs2").disabled = false;
    document.getElementById("adrs3").disabled = false;
    document.getElementById("eircode").disabled = false;
    document.getElementById("location").disabled = false;
    document.getElementById("status").disabled = false;
    document.getElementById("bid").disabled = false;
    document.getElementById("price").disabled = false;
    document.getElementById("viewing_times").disabled = false;
    document.getElementById("buildings").disabled = false;
    document.getElementById("acres").disabled = false;
    document.getElementById("details").disabled = false;
    document.getElementById("quotas").disabled = false;
    document.getElementById("notes").disabled = false;
}
// // Function confirmCheck() prompts user to confirm if the want to save the changes
function confirmCheck()
{
	//Unlock the fields before submitting the form, so that we can correctly set the session variables 
	unlock();
	var checkBids;
	if(document.getElementById("bid_id").value != -1)
	{
		checkBids = confirm('There are currently active bids on this property, proceeding will delete all associated Bids');
		//If user confirms they want to, ask once more if they want to delete
		if(checkBids)
		{
			var areYouSure;
			areYouSure = confirm("Are you Sure?");
			if(areYouSure)
			{
				return true;	
			}
		}
		else
		{
			toggleLock();
			return false;	
		}
		
	}
	
    var response;
    response = confirm('Are you sure you want to delete?');
    // If user responds TRUE (yes), unlock the final locked fields and return true to insert the details
    if(response)
    {
        document.getElementById("property_type").disabled = false;
        document.getElementById("owner").disabled = false;
        return true;
    }
    // Otherwise, populate the inputboxes and lock the inputs, then return false
    else
    {
        populate();
        toggleLock();
        return false;
    }
}
