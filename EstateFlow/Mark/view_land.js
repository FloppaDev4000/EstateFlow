//Name: Mark Lambert
//Student ID: C00192497
//Purpose: JavaScript file for view/amend a land property
//EstateFlow Y2 Project 2025


// // Function confirmCheck() prompts user to confirm if the want to save the changes
function confirmCheck()
{
    var response = confirm('Confirm Update?');
	console.log("User response:", response); // Log the user's response
    return response; // Return the response directly
	if(response){
		document.getElementById("property_type").disabled = false;
		return true;
	}
	else
	{
		populate();
		toggleLock();
		return false;
	}
}
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

        document.getElementById("property_type").value = landDetails[0];
        document.getElementById("adrs").value = landDetails[1];
        document.getElementById("eircode").value = landDetails[2];
        document.getElementById("location").value = landDetails[3];
        document.getElementById("status").value = landDetails[4];
        document.getElementById("owner").value = landDetails[5];
        document.getElementById("bid").value = landDetails[6];
        document.getElementById("price").value = landDetails[7];
        document.getElementById("viewing_times").value = landDetails[8];
        document.getElementById("property_id").value = landDetails[9];
        document.getElementById("id").value = landDetails[10];
        document.getElementById("acres").value = landDetails[11];
        document.getElementById("ownerName").value = landDetails[12];
        document.getElementById("buildings").value = landDetails[13];
        document.getElementById("details").value = landDetails[14];
        document.getElementById("quotas").value = landDetails[15];
        document.getElementById("notes").value = landDetails[16];

}
// Function toggleLock() is called onload, locking all fields until the user selects a client first
function toggleLock()
{
    // Checkls if the user has first actually selected a property, which will be known if the Property Type field is populated with "Land", otherwise, 
    // if it reads none, null, undefined etc it wont allow the user to insert/amend 
	if(document.getElementById("property_type").value == "Land")
	{	
		document.getElementById("submit").disabled = false;
	}
	if(document.getElementById("amendViewbutton").value == "Amend Details"){

		document.getElementById("adrs").disabled = false;
		document.getElementById("adrs2").disabled = false;
		document.getElementById("adrs3").disabled = false;
		document.getElementById("eircode").disabled = false;
		document.getElementById("location").disabled = false;
		document.getElementById("price").disabled = false;
		document.getElementById("viewing_times").disabled = false;
		document.getElementById("buildings").disabled = false;
		document.getElementById("acres").disabled = false;
		document.getElementById("details").disabled = false;
		document.getElementById("quotas").disabled = false;
		document.getElementById("notes").disabled = false;
		document.getElementById("ownerName").disabled = false;
	
		document.getElementById("amendViewbutton").value = "View Details";
	}
	else
	{
		unlock();	
	}
}
		function unlock(){
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
			document.getElementById("ownerName").disabled = true;
		
			document.getElementById("submit").disabled = true;

			document.getElementById("amendViewbutton").value = "Amend Details";
	}




function filterAll(){
		var options = document.getElementById("listbox");
    // Returns the value of the selected item in the listbox by going to the index in the listbox and calling .value
	for(var i = 0; i < options.length; i++){
			if(options[i].disabled){
				options[i].disabled = false;	
			}
		}
	}


function filterBySold(){
	filterAll();
	var options = document.getElementById("listbox");
	var result;
    // Returns the value of the selected item in the listbox by going to the index in the listbox and calling .value
	for(var i =0; i < options.length; i++){
    result = options.options[i].value;
    // Split the details by using the # as a delimeter
    var landDetails = result.split('#');
		//Disable any property that is tagged with a 0 (meaning any properties NOT SOLD get disabled)
		if(landDetails[4] == 0){
			options[i].disabled = true;
	}
	}
	
	document.getElementById("filterSold").disabled = true;
	document.getElementById("filterNotSold").disabled = false;
}
	
function filterByNotSold(){
	filterAll();
		var options = document.getElementById("listbox");
	var result;
    // Returns the value of the selected item in the listbox by going to the index in the listbox and calling .value
	for(var i =0; i < options.length; i++){
    result = options.options[i].value;
    // Split the details by using the # as a delimeter
    var landDetails = result.split('#');
		//Disable any properties that ARE sold or sale agreed
		if(landDetails[4] != 0)  {
			options[i].disabled = true;
		}
	}
	document.getElementById("filterNotSold").disabled = true;
	document.getElementById("filterSold").disabled = false;
}



