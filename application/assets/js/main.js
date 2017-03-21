// New order function
$(document).ready(function() {
    $('#sortable').sortable({
        axis: 'y',
        update: function (event, ui) {
            //Gets all the ID's of the contacts in the new order
            var id = $('.delete').map(function()
                {
                    return $(this).attr('data-itemid');
                }).get();
            var data = {id : id};
            console.log(data);
            // POST to server using $.post or $.ajax
            $.ajax({
                data: data,
                type: 'POST',
                url: 'ContactsController/save_order',
                success: function(response){

                },
                error: function(response){
                    alert("An error occured when updating the Contacts list order, please try again.")
                }
            });//Ajax
        }//Function
    });//Function
    $( "#sortable" ).disableSelection();
});//Function

//Delete user function.
$(document).ready(function() {
    $('.delete').click(function(){
        //Get data from data attribute to tell which contact is getting deleted.
        var id = $(this).attr('data-itemid');
        var data = { id : id };

        if (confirm('Are you sure you want to delete this contact?') == true)
        {
            $.ajax({
                data: data,
                type: 'POST',
                url: 'ContactsController/delete_user',
                success: function(response){
                    window.location.reload();
                    alert("The user has been deleted!");
                },
                error: function(response){
                    alert("An error occured when deleting the user, please try again.")
                }
            });//Ajax
        }//IF
    });//Function
});//Function

//Email function
$(document).ready(function() {
    $('.list_text').click(function(){

        //Gets data from data attributed to be used to email the contact
        var email = $(this).attr('data-itememail');
        var name = $(this).attr('data-itemname');
        var data =
            {
                email : email,
                name : name
            };
        if (confirm('Are you sure you want to email ' + name + '?') == true)
        {
            $.ajax({
                data: data,
                type: 'POST',
                url: 'Mail.php',
                success: function(response){
                    alert(name + " has been emailed!")
                },
                error: function(response){
                    alert("An error occured when emailing the user, please try again.")
                }
            });//Ajax
        };//IF
    });//Function
});//Function

//Function to refresh the page.
// $(document).ajaxStop(function(){
//     window.location.reload();
// });
