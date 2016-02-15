<?php
include('Table.php');
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @date    2016年2月15日
 * @see Table
 */
class Table_picture extends Table
{
    public function __construct($conn)
    {
        parent::__construct($conn, 'tbl_picture');
    }
    
    public function get_field_name(){
        return'
            id	            bigint	not null	AUTO_INCREMENT
            commodity_id	bigint	not null	
            path	        tinyint	not null	default 0
            name	        CHAR(13)	not null	
            
            PRIMARY KEY (id),
            INDEX index_commodity(commodity_id)			
            ';
    }
}


?>