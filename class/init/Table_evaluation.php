<?php
include('Table.php');
class Table_evaluation extends Table
{
    public function get_field_name(){
        return '
            evaluation_id	BIGINT	not null	AUTO_INCREMENT,
            transaction_id	BIGINT	not null	,
            is_payer	TINYINT	not null	,
            evaluate_time	datetime	not null	,
            evaluation	VARCHAR(200)	not null 	 ,
            score1	FLOAT(4,3)	not null	,
            score2	FLOAT(4,3)	not null	,
            score3	FLOAT(4,3)	not null	,
            score	FLOAT(4,3)	not null	,
            
            PRIMARY KEY (evaluation_id),
            INDEX index_transaction_id(transaction_id)
            
            ';
    }
}

?>