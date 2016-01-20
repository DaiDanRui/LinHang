<?php
include('Table.php');

class Table_course extends Table
{
    public function __construct($conn){
    
        parent::__construct($conn, 'tbl_course');
    }
    protected function get_field_name(){
        return'
            id     BIGINT     not null    unique   AUTO_INCREMENT,
            seller_id BIGINT     not null，
            seller_account_type VARCHAR(40),
            seller_account      VARCHAR(40),
            price               FLOAT(7,3) not null ,
            place	        VARCHAR(100) not null ,			
            release_date	 	DATETIME not null ,			
            type	        	VARCHAR(10)	 not null ,		
            description	    VARCHAR(140)	 not null ,		
            pic_path	    	VARCHAR(40)	,	
            is_valued	    tinyint	 not null ,		
            
            PRIMARY KEY (user_id),
            INDEX index_seller_id(seller_id),
            INDEX index_type(type)
            
        ';
    }
}

?>