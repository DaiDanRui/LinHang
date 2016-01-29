<?php
/**
 * @author yan
 * @version 2016/1/18
 */
include ('Table.php');

class Table_user extends Table
{

    public function __construct($conn)
    {
        parent::__construct($conn, 'tbl_user');
    }

    protected function get_field_name()
    {
        /*
         * return '
         * user_id BIGINT not null unique AUTO_INCREMENT,
         * user_is_seller tinyint not null,
         * user_log_name VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci not null unique ,
         * user_password VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci not null,
         * user_legal_name VARCHAR(12) CHARACTER SET utf8 COLLATE utf8_general_ci not null,
         * user_school VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_general_ci not null,
         * user_school_id VARCHAR(12) CHARACTER SET utf8 COLLATE utf8_general_ci not null,
         * user_sex tinyint ,
         * user_phone_number VARCHAR(11) CHARACTER SET utf8 COLLATE utf8_general_ci ,
         * user_email VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci ,
         * user_nick_name VARCHAR(12) CHARACTER SET utf8 COLLATE utf8_general_ci ,
         * birthday DATETIME ,
         * is_active tinyint not null,
         * last_log DATETIME not null,
         * PRIMARY KEY (user_id)，
         * INDEX index_user_log_name (user_log_name(20))
         * '
         * ;
         */
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