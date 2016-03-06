<?php

include ('Table.php');
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月13日
 * @date    2016年1月18日
 * @see Table
 */
class Table_user extends Table
{

    public function __construct($conn)
    {
        parent::__construct($conn, 'tbl_user');
    }

    protected function get_field_name()
    {
        
        
        return '
            id	BIGINT		AUTO_INCREMENT                                           ,
            is_seller	tinyint	default 1                                            	     ,
            log_name	VARCHAR(20)	   CHARACTER SET utf8 COLLATE utf8_general_ci    not null unique,	
            password	VARCHAR(20)	   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,	
            legal_name	VARCHAR(12)	   CHARACTER SET utf8 COLLATE utf8_general_ci    ,	
            school	    VARCHAR(40)	   CHARACTER SET utf8 COLLATE utf8_general_ci    ,	
            school_id	VARCHAR(12)	   CHARACTER SET utf8 COLLATE utf8_general_ci    ,	
            phone_number	CHAR(11)   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,	
            email	VARCHAR(100)	   CHARACTER SET utf8 COLLATE utf8_general_ci    	     ,
            nick_name	VARCHAR(12)	   CHARACTER SET utf8 COLLATE utf8_general_ci    	     ,
            birthday	DATETIME		 ,
            
            is_active	tinyint	 DEFAULT 1 ,	
            create_time	DATETIME		,
            last_log	DATETIME	   ,	
            sex	tinyint		,
            seller_credit	FLOAT(7,3)	 DEFAULT 5,	
            payer_credit	FLOAT(7,3)	 DEFAULT 5,	
            pic_path	VARCHAR(40)	   CHARACTER SET utf8 COLLATE utf8_general_ci     ,	
            income	FLOAT(7,3)	  	DEFAULT 0,
            pay	FLOAT(7,3)	 	DEFAULT 0,
            strongpoint	VARCHAR(40)	   CHARACTER SET utf8 COLLATE utf8_general_ci     ,	
            interest	VARCHAR(40)	   CHARACTER SET utf8 COLLATE utf8_general_ci     ,	
            
            autograph VARCHAR(40)	   CHARACTER SET utf8 COLLATE utf8_general_ci ,
            
            PRIMARY KEY (id),
            INDEX index_user_log_name (log_name(20))
        ';
    }
}

?>