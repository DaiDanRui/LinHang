<?php
include('Table.php');
class Table_budget extends Table
{
    public function __construct($conn)
    {
        parent::__construct($conn, 'tbl_budget');
    }
    public function get_field_name(){
        return '
            budget_id       bigint not null	AUTO_INCREMENT,
            transaction_id	bigint not null,
            pay_date        datetime not null,
            commodity_id    bigint not null,
            payer_id        bigint not null,
            holder_id       bigint not null,
            
            PRIMARY KEY (budget_id),
            INDEX index_transaction_id(transaction_id)
            ';
    }
}

?>