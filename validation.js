function checkForm()
{
    // Fetching values from all input fields and storing them in variables.
    var name = document.getElementById("input-name").value;
    var email = document.getElementById("input-email").value;

    //Check input Fields Should not be blanks.
    if (name == '' || email == '')
    {
        alert("Fill All Fields.");
    }
    else
    {
        //Notifying error fields
        var name1 = document.getElementById("name");
        var email1 = document.getElementById("email");

        //Putting the variables into an array ready to be sent.
        var data =
            {
                email : email,
                name : name
            };

        //Check All Values/Informations Filled by User are Valid Or Not.If All Fields Are invalid Then Generate alert.
        if (email1.innerHTML == 'Invalid email')
        {
            alert("Fill Valid Information.");
        }
        else
        {
            //Send the data to the controller to be added to the database.
            $.ajax({
                data: data,
                type: 'POST',
                url: 'ContactsController/new_contact',
                success: function(response){
                    window.location.reload();
                    alert("Contact has been added.");
                },
                error: function(response){
                    alert("Error has occured adding the contacts details.");
                }
            });
        }
    }
}

// AJAX code to check input field values when onblur event triggerd.
function validate(field, query)
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    { // for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else
    { // for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState != 4 && xmlhttp.status == 200)
        {
            document.getElementById(field).innerHTML = "Validating..";
        }
        else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById(field).innerHTML = xmlhttp.responseText;
        }
        else
        {
            document.getElementById(field).innerHTML = "Error Occurred. Reload Or Try Again.";
        }
    }
    xmlhttp.open("GET", "validation.php?field=" + field + "&query=" + query, false);
    xmlhttp.send();
}
