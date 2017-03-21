<!DOCTYPE html>
<html>

<head>
<link href="style.css" rel="stylesheet" type="text/css">
<script src="script.js"></script>
</head>

<body>
    <div id="mainform">
    <div class="innerdiv">
    <!-- Required Div Starts Here -->
    <h2>Form Validation Using AJAX</h2>
    <form action='#' id="myForm" method='post' name="myForm">
    <h3>Fill Your Information!</h3>
    <table>
        <tr>
            <td>name</td>
            <td><input id='input-name' name='name' onblur="validate('name', this.value)" type='text'></td>
            <td>
                <div id='name'></div>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input id='input-email' name='email' onblur="validate('email', this.value)" type='text'></td>
            <td>
                <div id='email'></div>
            </td>
        </tr>
    </table>
    <input onclick="checkForm()" type='button' value='Submit'>
    </form>
    </div>
</body>
</html>
