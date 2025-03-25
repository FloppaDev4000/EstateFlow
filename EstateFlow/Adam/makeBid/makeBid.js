// NAME:    Adam Noonan
// NUMBER:  C00299231
// FILE:    makeBid.js

var highestBid;

// set page-specific values on page load
document.title = "EstateFlow - Make a Bid";
document.getElementById("makeLink").className = "button selected";

// function to validate form input
function validateForm()
{
    // client selection validation
    let clientBox = document.getElementById("clientBox");
    let sel = clientBox.options[clientBox.selectedIndex];

    // no client selected
    if(sel.value == "")
    {
        alert("A client must be selected!");
        return false;
    }

    // property selection validation
    let propertyBox = document.getElementById("propertyBox");
    sel = propertyBox.options[propertyBox.selectedIndex];

    // no property selected
    if(sel.value == "")
    {
        alert("A property must be selected!");
        return false;
    }

    // highest bid validation
    let highBid = document.getElementById("highest_bid").value;
    let currentBid = document.getElementById("amount").value;

    // new bid too low
    if(highBid >= currentBid)
    {
        alert("New bid must be higher than current highest bid!");
		return false;
    }

    // validation: confirm check
    return confirm("Are you sure you want to submit?");
}

// place relevant values in fields based on listbox selection
function populateClient()
{
    // get listbox
    var sel = document.getElementById("clientBox");

    // get values from listbox
    var result = sel.options[sel.selectedIndex].value;
	
	if(result=="")
	{
		return;
	}

    // convert values to array by delimiter
    var personDetails = result.split(';!');
    
    // grab elements by class
    var entries = document.querySelectorAll(".clientFields");
    
    currentClient = personDetails[0];

    // place values in fields with loop
    for(var i = 0; i < entries.length; i++)
    {
        entries[i].value = personDetails[i];
    }

    // call subsequent property functions after client has been chosen
    clearProperty();
    filterProperty();
}

// filter properties based on client ID
function filterProperty()
{
    // get listbox
    var sel = document.getElementById("propertyBox");

    // enable section
    sel.disabled = false;

    // get all relevant elements
    var entries = document.querySelectorAll(".propertyOptions");
    
    // loop over options, checking value
    for(var i = 0; i < entries.length; i++)
    {
        var result = entries[i].value.split(';?')[0];
        
        if(result != currentClient)
        {
            entries[i].hidden = false;
        }
        else
        {
            entries[i].hidden = true;
        }
    }
}

// function to auto-populate property values on selection
function populateProperty()
{
    // get listbox
    var sel = document.getElementById("propertyBox");

    // get values from listbox
    var result = sel.options[sel.selectedIndex].value;
	
	if(result=="")
	{
		return;
	}

    // delimited string to array
    var realResult = result.split(';?');
	
	if(realResult.length == 1)
	{
		// default value
		return;
	}
	
    // convert values to array by delimiter
    var propertyDetails = realResult[1].split(';!');
    
    // grab elements by class
    var entries = document.querySelectorAll(".propertyFields");
	
    // place values in fields with loop
    for(var i = 0; i < entries.length; i++)
    {
        entries[i].value = propertyDetails[i];
    }

    //-----------SPECIFIC PROPERTY STUFF
    var propertyType = document.getElementById("type").value;

    // get each fieldset
    var landField = document.getElementById("landFieldset");
    var offcField = document.getElementById("officeFieldset");
    var resiField = document.getElementById("residentialFieldset");

    // hide all fieldsets
    landField.hidden = true;
    offcField.hidden = true;
    resiField.hidden = true;

    // unhide relevant fieldset
    switch(propertyType)
    {
        case "Land":
            landField.hidden = false;
            break;
        case "Office":
            offcField.hidden = false;
            break;
        case "Residential":
            resiField.hidden = false;
            break;
    }

    populateSpecificProperty(propertyType, result)
}

// function to populate property values based on property type
function populateSpecificProperty(type, data)
{
    if(type == "Land")
    {
        var propertyData = data.split(';?')[2].split(';!');

        // grab elements by class
        var entries = document.querySelectorAll(".landFields");

        // place values in fields with loop
        for(var i = 0; i < entries.length; i++)
        {
            entries[i].value = propertyData[i];
        }
    }
    else if(type == "Office")
    {
        var propertyData = data.split(';?')[3].split(';!');

        // grab elements by class
        var entries = document.querySelectorAll(".officeFields");

        // place values in fields with loop
        for(var i = 0; i < entries.length; i++)
        {
            entries[i].value = propertyData[i];
        }
    }
    else
    {
        var propertyData = data.split(';?')[4].split(';!');

        // grab elements by class
        var entries = document.querySelectorAll(".residentialFields");

        // place values in fields with loop
        for(var i = 0; i < entries.length; i++)
        {
            entries[i].value = propertyData[i];
        }
    }
}

function clearProperty()
{
    // reset listbox
    document.getElementById("propertyBox").selectedIndex = 0;

    // grab elements by class
    var entries = document.querySelectorAll(".propertyFields");

    // place values in fields with loop
    for(var i = 0; i < entries.length; i++)
    {
        entries[i].value = "";
    }

    // hide specific property fields
    var landField = document.getElementById("landFieldset");
    var offcField = document.getElementById("officeFieldset");
    var resiField = document.getElementById("residentialFieldset");

    landField.hidden = true;
    offcField.hidden = true;
    resiField.hidden = true;
}