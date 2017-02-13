    <?php
        $user_language = $this->session->userdata('language');
        $this->lang->load('contact_form_' . $user_language, $user_language);

        $form_attributes = array('id' => 'contact_form');

        //The name of create post function needs questioned \/ 
        echo form_open('LanguagesController/Mypages/create_post', $form_attributes);
        echo form_error('sender_name');
        echo form_error('sender_message');

        if(isset($message_not_sent)){
            echo '<h3>'.$message_not_sent.'</h3>';
        }

        $data_name = array(
            'name' => 'sender_name',
            'value' => $this->lang->line('name_value'),
            'id' => 'sender_name'
        );

        $data_message = array(
            'name' => 'sender_message',
            'value' => $this->lang->line('message_value'),
            'id' => 'sender_message'
        );

    ?>

    <div id = "contact_form">
        <select name="language">
            <?php if ($user_language === 'english') {?>
                <option value = "English">English</option>
                <option value = "French">French</option>
            <?php }else{ ?>
                <option value = "French">English </option>
                <option value = "English">English</option>
            <?php } ?>
        </select>
        <h1> Contact Us </h1>
        <table>
            <tr>
                <td id = "name"><?php echo $this->lang->line('name'); ?></td>
                <td><?php echo form_input($data_name);?></td>
            </tr>
            <tr>
                <td id = "message"><?php echo $this->lang->line('message'); ?></td>
                <td><?php echo form_textarea($data_messsage);?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo form_submit('submit', 'Send');?></td>
            </tr>
        </table>

        <div id = "validation_errors"></div>

        <?php echo form_close();?>
    </div>
