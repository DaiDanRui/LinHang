<?php
include('Table.php');
class Table_reward extends Table
{
    public function __construct($conn){
    
        parent::__construct($conn, 'tbl_reward');
    }
    protected function get_field_name(){
        return'
            id     BIGINT     not null    unique   AUTO_INCREMENT,
            payerer_id BIGINT     not null，
            payerer_account_type VARCHAR(40),
            payerer_account      VARCHAR(40),
            price               FLOAT(7,3) not null ,
            place	        VARCHAR(100) not null ,			
            release_date	 	DATETIME not null ,			
            type	        	VARCHAR(10)	 not null ,		
            description	    VARCHAR(140)	 not null ,		
            pic_path	    	VARCHAR(40)	,	
            is_valued	    tinyint	 not null ,		
           
            PRIMARY KEY (tbl_reward_id),
            INDEX index_seller_id(seller_id),
            INDEX index_type(type)
        ';
    }
}

?>