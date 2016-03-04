<?php
require_once 'Table.php';
class Table_praise extends Table
{

    public function __construct($conn){
    
        parent::__construct($conn, 'tbl_praise');
    }
    protected function get_field_name()
    {
        return '   
            id BIGINT not null AUTO_INCREMENT,
            commodity_id   BIGINT	not null ,
            praiser_id     BIGINT  not null ,
             PRIMARY KEY (id)
            ';
    }
}

?>