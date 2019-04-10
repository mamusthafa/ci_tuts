<?php 
defined('BASEPATH') OR exit('No direct access script allowed');

class Migration_Alter_Posts extends CI_Migration{
    
    function up(){
            $field = array(
                'created_at' => array(
                    'type' => 'timestamp'
                )
            );
     
        $this->dbforge->add_column('posts', $field);
       
    }

    function down(){
        $this->dbforge->drop_table('posts');
    }
}

 