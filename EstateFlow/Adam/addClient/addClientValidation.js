function validateForm()
{
    // get email value from form
	let x = document.getElementById("email").value;
	
	alert(x);

    // check if contains @ symbol
  	if (x.indexOf('@') == -1)
    {
        // validation failed; cancel submit, alert user
    	alert("Email field must contain an @ symbol");
    	return false;
  	}

    // validation success: confirm
    return confirm("submit?");
}