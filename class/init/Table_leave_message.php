<?php
include('Table.php');
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月18日
 * @date    2016年2月18日
 */
class Table_leave_message extends Table
{
    
    public function __construct($conn){
    
        parent::__construct($conn, 'tbl_leave_message');
    }
    
    public function get_field_name(){
        return '
            message_id	BIGINT	not null 	AUTO_INCREMENT,
            commodity_id	BIGINT	not null 	,
            talker	VARCHAR(20)	not null 	,
            time	DATETIME	not null 	,
            content	TEXT	CHARACTER SET utf8 COLLATE utf8_general_ci not null ,
            PRIMARY KEY(message_id),
            INDEX index_commodity_id(commodity_id)
        ';
    }
}

?>