<?php
include('Table.php');

class Table_course extends Table
{
    public function __construct($conn){
    
        parent::__construct($conn, 'tbl_course');
    }
    protected function get_field_name(){
        return'
            tbl_course_id     BIGINT     not null    unique   AUTO_INCREMENT,
            tbl_course_seller BIGINT     not null，
            tbl_course_seller_account_type VARCHAR(40),
            tbl_course_seller_account      VARCHAR(40),
            tbl_course_price               FLOAT(7,3) not null ,
            tbl_course_place	        	VARCHAR(100) not null ,			
            tbl_course_release_date	 	DATETIME not null ,			
            tbl_course_type	        	VARCHAR(10)	 not null ,		
            tbl_course_description	    	VARCHAR(100)	 not null ,		
            tbl_course_pic_path	    	VARCHAR(40)	,	
            tbl_course_is_valued	    	tinyint	 not null ,		
            
            PRIMARY KEY (user_id)
        ';
    }
}

?>