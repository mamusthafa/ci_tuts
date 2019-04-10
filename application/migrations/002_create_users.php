<?php 
defined('BASEPATH') OR exit('No direct access script allowed');

class Migration_Create_Users extends CI_Migration{
    
    function up(){
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 100

            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }

    function down(){
        $this->dbforge->drop_table('users');
    }
}

 