<?php
include('Table.php');
class Table_commodity extends Table
{
    public function __construct($conn){
    
        parent::__construct($conn, 'tbl_commodity');
    }
    protected function get_field_name(){
        return'
            id	             BIGINT	not null	AUTO_INCREMENT,
            type	         tinyint	not null	,
            publisher	     BIGINT	not null,	
            price	         FLOAT(7,3)	not null,	
            place	         VARCHAR(100)   CHARACTER SET utf8 COLLATE utf8_general_ci    	not null,	
            release_date	 DATETIME	not null,
           
            title	         VARCHAR(20)	   CHARACTER SET utf8 COLLATE utf8_general_ci    	not null,
            description	     VARCHAR(100)   CHARACTER SET utf8 COLLATE utf8_general_ci    		not null,	
            pic_path	     VARCHAR(40)		   CHARACTER SET utf8 COLLATE utf8_general_ci    	,
            is_valued	     tinyint	not null,	
            praise	         int	    not null	DEFAULT 0,
            communication_way	    tinyint	not null,
            surf_time	            int	not null	DEFAULT 0,
            leave_message_time	    int	not null	DEFAULT 0,
    
            PRIMARY KEY (id),
            INDEX index_publisher(publisher),
            INDEX index_type(type)
        ';
    }
}

?>