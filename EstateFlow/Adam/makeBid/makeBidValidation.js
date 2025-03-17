function validateForm()
{
    let clientBox = document.getElementById("clientBox");
    if(clientBox.value == "default")
    {
        alert("A client must be selected!");
        return false;
    }

    let propertyBox = document.getElementById("propertyBox");
    if(propertyBox.value == "default")
    {
        alert("A property must be selected!");
        return false;
    }

    return confirm("Are you sure you want to submit?");
}