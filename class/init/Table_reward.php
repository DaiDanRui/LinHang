<?php
include('Table.php');
class Table_reward extends Table
{
    public function __construct($conn){
    
        parent::__construct($conn, 'tbl_reward');
    }
    protected function get_field_name(){
        return'
            tbl_reward_id     BIGINT     not null    unique   AUTO_INCREMENT,
            tbl_reward_payer BIGINT     not null，
            tbl_reward_payerer_account_type VARCHAR(40),
            tbl_reward_payer_account      VARCHAR(40),
            tbl_reward_price               FLOAT(7,3) not null ,
            tbl_reward_place	        	VARCHAR(100) not null ,
            tbl_reward_release_date	 	DATETIME not null ,
            tbl_reward_type	        	VARCHAR(10)	 not null ,
            tbl_reward_description	    	VARCHAR(100)	 not null ,
            tbl_reward_pic_path	    	VARCHAR(40)	,
            tbl_reward_is_valued	    	tinyint	 not null ,
           
            PRIMARY KEY (tbl_reward_id)
        ';
    }
}

?>