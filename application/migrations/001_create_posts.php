<?php 
defined('BASEPATH') OR exit('No direct access script allowed');

class Migration_Create_Posts extends CI_Migration{
    
    function up(){
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,

            ),
            'body' => array(
                'type' => 'TEXT',
                'null' => TRUE
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('posts');
    }

    function down(){
        $this->dbforge->drop_table('posts');
    }
}

