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
    // Put the client_ID (located at index 0 in the result set) into the inputbox with id owner
    document.getElementById("owner").value = 



    document.getElementById("property_type").value = landDetails[0];
    document.getElementById("adrs").value = landDetails[1];
    document.getElementById("eircode").value = landDetails[2];
    document.getElementById("location").value = landDetails[3];
    document.getElementById("status").value = landDetails[4];
    document.getElementById("bid").value = landDetails[5];
    document.getElementById("price").value = landDetails[6];
    document.getElementById("viewing_times").value = landDetails[7];
    document.getElementById("date_listed").value = landDetails[8];
    document.getElementById("owner").value = landDetails[9];
    document.getElementById("acres").value = landDetails[10];
    document.getElementById("buildings").value = landDetails[11];

    document.getElementById("details").value = landDetails[12];
    document.getElementById("quotas").value = landDetails[13];
    document.getElementById("notes").value = landDetails[14];

    // Once the client has been selected, we can call the unlock function so that the user may now edit the required fields
    unlock();
}
// Function toggleLock() is called onload, locking all fields until the user selects a client first
function toggleLock()
{
    document.getElementById("property_type").disabled = true;
    document.getElementById("adrs").disabled = true;
    document.getElementById("adrs2").disabled = true;
    document.getElementById("adrs3").disabled = true;
    document.getElementById("eircode").disabled = true;
    document.getElementById("location").disabled = true;
    document.getElementById("status").disabled = true;
    document.getElementById("owner").disabled = true;
    document.getElementById("bid").disabled = true;
    document.getElementById("price").disabled = true;
    document.getElementById("viewing_times").disabled = true;
    document.getElementById("date_listed").disabled = true;
    // document.getElementById("property_id").disabled = true;
    document.getElementById("buildings").disabled = true;
    document.getElementById("acres").disabled = true;
    document.getElementById("details").disabled = true;
    document.getElementById("quotas").disabled = true;
    document.getElementById("notes").disabled = true;
}
//When we unlock, we only unlock fields that should be editable, leave the owner inputbox locked,
// as we got that info from the listbox, and we also don't need to edit the property_type tag
function unlock(){
    document.getElementById("adrs").disabled = false;
    document.getElementById("adrs2").disabled = false;
    document.getElementById("adrs3").disabled = false;
    document.getElementById("eircode").disabled = false;
    document.getElementById("location").disabled = false;
    document.getElementById("status").disabled = false;
    document.getElementById("bid").disabled = false;
    document.getElementById("price").disabled = false;
    document.getElementById("viewing_times").disabled = false;
    document.getElementById("date_listed").disabled = false;
    // document.getElementById("property_id").disabled = false;
    document.getElementById("buildings").disabled = false;
    document.getElementById("acres").disabled = false;
    document.getElementById("details").disabled = false;
    document.getElementById("quotas").disabled = false;
    document.getElementById("notes").disabled = false;
}
// // Function confirmCheck() prompts user to confirm if the want to save the changes
function confirmCheck()
{
    var response;
    response = confirm('Confirm new Land Property');
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

//Function to check if the date input is todays date or any date in the future
function checkDate(date){
    var today = new Date();
    var inputDate = new Date(date.value);

    //Normalise the date
    today.setHours(0,0,0,0);
    
    if(inputDate > today){
        document.getElementById("date_listed").setCustomValidity("Date cannot be in the future!");
    }
    else{
        document.getElementById("date_listed").setCustomValidity("");
    }
    document.getElementById("date_listed").reportValidity();
}
