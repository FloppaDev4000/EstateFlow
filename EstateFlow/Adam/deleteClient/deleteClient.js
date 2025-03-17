function validateForm()
{
    let clientBox = document.getElementById("client_id");

    if(clientBox.value == "default")
    {
        alert("A client must be selected!");
        return false;
    }
	
    return confirm("Are you sure you want to submit?");
}

function populateForm()
{	
    var sel = document.getElementById("clientBox");

    var result = sel.options[sel.selectedIndex].value;

    var clientDetails = result.split('#');

    // place values in fields
    document.getElementById("client_id").value =    clientDetails[0];
    document.getElementById("name").value =         clientDetails[1];
    document.getElementById("address").value =      clientDetails[2];

    document.getElementById("eircode").value =      clientDetails[3];
    document.getElementById("phone_no").value =     clientDetails[4];
    document.getElementById("email").value =        clientDetails[5];
}