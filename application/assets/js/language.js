//READY FUNCTION
$(document).ready(function()
{

    //global variable for when data needs accessed globally
    window.com_domain = window.com_domain || {};

    //key script variable
    var default_name_val = $('#sender_name').val();
    var default_message_val = $('#sender_message').val();
    // var user_input_name = '';
    // var user_input_message = '';
    var $validation_errors = $('#validation_errors');

    //behaviour to improve user experience
    $('$sender_name').focusin(function()
    {
        if($(this).val() === default_name_val)
        {
            $(this).val('');
        }
    }).focusout(function()
    {
        if ($this.val() == (''))
        {
            ($(this).val(default_name_val));
        }
    });

    $('$sender_message').focusin(function()
    {
        if($(this).val() === default_message_val)
        {
            $(this).val('');
        }
    }).focusout(function(){
        if ($this.val() == (''))
        {
            ($(this).val(default_message_val));
        }
    });
});

//CHANGE FUNCTION
$('select[name="language"]').change(function()
{
    window.com_domain.language = $(this).val();

    //pathname checks if 'Mypages' is in the url, if it is, it will add the function name
    //on the end of the url, if not, Mypages will be added to the url as well as the
    //function name.
    var target_url = window.location.pathname.indexOf('Mypages') > -1 ?
        window.location.pathname + 'get_language_data' : 
        window.location.pathname + 'Mypages/get_language_data';

    $.ajax({
        type: 'post',
        dataType: 'json',
        url: target_url,
        data:
        {
            language : $(this).val()
        },
        success: function(json){
            $('h1').text(json['title']);
            $('td#name').text(json['name']);
            $('td#message').text(json['message']);
            $('input[type="submit"]').attr('value', json['submit']);
            $('input[name="sender_name"]').val(json['name_value']);
            $('textarea[name="sender_message"]').val(json['message_value']);

        default_name_val = $('#sender_name').val();
        default_message_val = $('#sender_message').val();
        }
    });
});

//SUBMIT FUNCTION
$('#contact_form').submit(function(event)
{

    var user_language = window.com_domain.language;

    //validation for the name
    if ($('#sender_name').val() === '' || $('#sender_name').val() === 'default_name_val')
    {
        if (window.com_domain.language === 'english'){
            $validation_errors.html('Sorry, you must enter your name')
        } else {
            $validation_errors.html('Désolé, vous devez saisir votre nom')
        }
    event.preventDefault();
    }

    //validation for the message
    if ($('#sender_message').val().length < 10)
    {
        if (window.com_domain.language === 'english'){
            $validation_errors.html('Sorry, your message must be longer than 10 characters')
        } else {
            $validation_errors.html('Désolé, votre message doit comporter plus de 10 caractères')
        }
    event.preventDefault();
    } 
    else if ($('#sender_message').val() === 'default_name_val')
    {
        if (window.com_domain.language === 'english')
        {
            $validation_errors.html('Sorry, you must enter a message')
        } else {
            $validation_errors.html('Désolé, vous devez entrer un message')
        }
    }
});
