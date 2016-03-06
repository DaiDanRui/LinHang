<?php
include('Table.php');
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月15日
 * @see Table
 */
class Table_commodity extends Table
{
    public function __construct($conn){
    
        parent::__construct($conn, 'tbl_commodity');
    }
    protected function get_field_name(){
        return'
            id	             BIGINT	not null	AUTO_INCREMENT,
            course_or_reward tinyint DEFAULT 0	,
            type	         VARCHAR(20)	,
            publisher	     BIGINT	not null,	
            price	         FLOAT(7,3)	DEFAULT 0,	

            release_date	 DATETIME	not null,
            deleted_date     DATETIME	not null,
           
            title	         VARCHAR(20)	CHARACTER SET utf8 COLLATE utf8_general_ci    	,
            description	     VARCHAR(100)   CHARACTER SET utf8 COLLATE utf8_general_ci    		,	
            
            commodity_state	     tinyint	 DEFAULT 0,	
            praise	         int	    	DEFAULT 0,
            
            communication_number VARCHAR(20)	   CHARACTER SET utf8 COLLATE utf8_general_ci    	,
            surf_time	int		DEFAULT 0,
            leave_message_time	int		DEFAULT 0,
    
            
            PRIMARY KEY (id),
            INDEX index_publisher(publisher),
            INDEX index_type(type),
            INDEX index_surf(surf_time),
            INDEX index_praise(praise),
            INDEX index_date(release_date),
            INDEX index_course_or_reward(course_or_reward)
        ';
    }
}

?>