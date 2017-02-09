<?php
    //load the contact form in the user's language
    $this->lang->load('contact_form_'.$this->session->userdata('language'), $this->session->userdata('language'))
?>

<div id = 'success'>
    <h3>
        <?php echo $this->lang->line('message_sent')?>
    </h3>
    <a href="<?php base_url(); ?>">Message</a>    
</div>
