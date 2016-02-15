<?php
include('Table.php');
class Table_picture extends Table
{
    public function get_field_name(){
        return'
            id	            bigint	not null	AUTO_INCREMENT
            commodity_id	bigint	not null	
            path	        tinyint	not null	default 0
            name	        CHAR(13)	not null	
            			
            INDEX index_commodity(commodity_id)			
            ';
    }
}


?>