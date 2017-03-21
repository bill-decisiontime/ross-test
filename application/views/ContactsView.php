<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contacts</title>
<link rel="icon" type="image/png" href="http://www.delagua.org/assets/images/aboutus/contactus/contact-form-icon-blue.png">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="<?php echo base_url(); ?>application/assets/css/main.css" media="screen" rel="stylesheet" type="text/css" >

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>validation.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>application/assets/js/main.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <div class="wrap">
        <tr>
            <h2>Add a new contact</h2>
            <div id="mainform">
            <form id="form-contact" class="styled" action="ContactsController/new_contact" method="post">
                <fieldset>
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input id='input-name' name='name' onblur="validate('name', this.value)" type='text' >
                            </td>
                            <td>
                                <div id='name'></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input id='input-email' name='email' onblur="validate('email', this.value)" type='text' title='Email'>
                            </td>
                            <td>
                                <div id='email'></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td  valign="bottom" align="right">
                                <input onclick="checkForm()" type='button' value='Add'>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
            </div>
        </tr>
        <tr>
            <h2>Current Contacts</h2>
            <ul id="sortable">
                <?php $id = 0;
                if ($contact != NULL)
                {
                    foreach ($contact as $contact_item)
                    {?>
                        <li class="ui-state-default">
                            <button class="delete" data-itemid = <?php echo $contact_item['id'] ?>>X</button>
                            <div class="list_text" data-itemname = <?php echo $contact_item['name']?> data-itememail = <?php echo $contact_item['email']?>>
                                <?php echo $contact_item['name']; ?>
                            </div>
                        </li>
                        <?php $id++;
                    }
                } ?>
            </ul>
        </tr>
    </div>
</body>
</html>
