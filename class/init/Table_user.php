<?php

include ('Table.php');
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月13日
 * @date    2016年1月18日
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
            id	BIGINT	not null	AUTO_INCREMENT                                           ,
            is_seller	tinyint	not null                                            	     ,
            log_name	VARCHAR(20)	   CHARACTER SET utf8 COLLATE utf8_general_ci    not null unique,	
            password	VARCHAR(20)	   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,	
            legal_name	VARCHAR(12)	   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,	
            school	    VARCHAR(40)	   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,	
            school_id	VARCHAR(12)	   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,	
            phone_number	CHAR(11)   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,	
            email	VARCHAR(100)	   CHARACTER SET utf8 COLLATE utf8_general_ci    	     ,
            nick_name	VARCHAR(12)	   CHARACTER SET utf8 COLLATE utf8_general_ci    	     ,
            birthday	DATETIME		 ,
            
            is_active	tinyint	not null DEFAULT 1 ,	
            create_time	DATETIME		,
            last_log	DATETIME	not null,	
            sex	tinyint	not null	,
            seller_credit	FLOAT(7,3)	not null DEFAULT 5,	
            payer_credit	FLOAT(7,3)	not null DEFAULT 5,	
            pic_path	VARCHAR(40)	   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,	
            income	FLOAT(7,3)	not null	DEFAULT 0,
            pay	FLOAT(7,3)	not null	DEFAULT 0,
            strongpoint	VARCHAR(40)	   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,	
            interest	VARCHAR(40)	   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,	
            count_publish_course	INT	not null	DEFAULT 0,
            count_publish_reward	INT	not null	DEFAULT 0,
            count_choose_course	INT	not null	DEFAULT 0,
            count_choose_reward	INT	not null	DEFAULT 0 ,           
            
            PRIMARY KEY (id),
            INDEX index_user_log_name (log_name(20))
        ';
    }
}

?>