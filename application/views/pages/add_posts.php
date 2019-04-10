<?php 
// form attributes in an array
$attr = array(
    'id' => 'add_posts',
    'class' => 'm-top-20'
);

// form input type text field using array
    $title = array(
        'name' => 'title',
        'type' => 'text',
        'id' =>  'title',
        'value' => set_value('title'),
        'class' => 'form-control',
        'placeholder' => 'Enter a title for the post'

    );

    // form input textarea using array

    $body = array(
        'name' => 'body',
        'type' => 'text',
        'id' =>  'body',
        'value' => set_value('body'),
        'class' => 'form-control m-top-20',
        'placeholder' => 'Enter a body for the post'

    );


    // form submit button using array
    $submit = array(
        'name' => 'submitpost',
        'type' => 'submit',
        'value' => 'Submit Post',
        'class' => 'btn btn-primary m-top-20'
       

    );
?>


    <div class="col-md-8">
    <h2>Add a Posts</h2>
    <?php
    //echo validation_errors() all errors in one place;
    // form displaying code
    echo form_open('pages/form_posted',$attr);
    echo form_input($title);

    //echo validation_errors() individual errors in one place;
    echo '<div style="color:red;">'.form_error('title').'</div>';
   
    echo form_textarea($body);
    
    //echo validation_errors() individual errors in one place;
    echo '<div style="color:red;">'.form_error('body').'</div>';
    echo form_submit($submit);
    echo form_close();
    ?>
    </div>
