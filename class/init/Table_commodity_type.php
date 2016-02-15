<?php
include('Table.php');
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @date    2016年2月15日
 */
class Table_commodity_type extends Table
{
    public function __construct($conn)
    {
        parent::__construct($conn, 'tbl_commodity_type');
    }
    
    public function get_field_name(){
        return'
            type_id	bigint	not null	AUTO_INCREMENT,
            type_name	VARCHAR(12)	not null	unique,
            
            PRIMARY KEY (type_id),
            INDEX index_name(type_name)
            ';
    }
}

?>