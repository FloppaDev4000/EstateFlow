function validateForm()
{
    let clientBox = document.getElementById("clientBox");
    let sel = clientBox.options[sel.selectedIndex].value;
    if(sel.value = "default")
    {
        alert("A client must be selected!");
        return false;
    }

    let propertyBox = document.getElementById("propertyBox");
    sel = propertyBox.options[sel.selectedIndex].value
    if(propertyBox.value = "default")
    {
        alert("A property must be selected!");
        return false;
    }

    return confirm("Are you sure you want to submit?");
}

// place relevant values in fields based on listbox selection
function populateClient()
{
    // get listbox
    var sel = document.getElementById("clientBox");

    // get values from listbox
    var result = sel.options[sel.selectedIndex].value;

    // convert values to array by delimiter
    var personDetails = result.split('#');
    
    // grab elements by class
    var entries = document.getElementsByClassName("clientFields");
    
    currentClient = personDetails[0];

    // place values in fields with loop
    for(var i = 0; i < entries.length; i++)
    {
        entries[i].value = personDetails[i];
    }

    clearProperty();
    filterProperty();
}

function filterProperty()
{
    // get listbox
    var sel = document.getElementById("propertyBox");


    sel.disabled = false;

    var entries = document.getElementsByClassName("propertyOptions");
    
    // loop over options, checking value
    for(var i = 0; i < entries.length; i++)
    {
        var result = entries[i].value.split(';?')[0];
		
		//alert(result);
        
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

function populateProperty()
{
    // get listbox
    var sel = document.getElementById("propertyBox");

    // get values from listbox
    var result = sel.options[sel.selectedIndex].value;

    var realResult = result.split(';?')[1];

    // convert values to array by delimiter
    var propertyDetails = realResult.split('#');
    
    // grab elements by class
    var entries = document.getElementsByClassName("propertyFields");

    // place values in fields with loop
    for(var i = 0; i < entries.length; i++)
    {
        entries[i].value = propertyDetails[i];
    }
}

function clearProperty()
{
    // get listbox
    var sel = document.getElementById("propertyBox");

    sel.selectedIndex = 0;

    // grab elements by class
    var entries = document.getElementsByClassName("propertyFields");

    // place values in fields with loop
    for(var i = 0; i < entries.length; i++)
    {
        entries[i].value = "";
    }
}