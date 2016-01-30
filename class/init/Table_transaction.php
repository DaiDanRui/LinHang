<?php
include('Table.php');
class Table_transaction extends Table
{
    public function __construct($conn){
    
        parent::__construct($conn, 'tbl_transaction_reward');
    }
    protected function get_field_name(){
        return '
            id                  BIGINT         not null   AUTO_INCREMENT,
            choosed_id          BIGINT         not null,
            state               tinyint         not null,
            payer_id            BIGINT         not null,
            seller_id           BIGINT         not null,
            price               FLOAT(7,3)         not null,
            date_choose         DATETIME         not null,
            date_pay            DATETIME                 ,
            payer_account_type  VARCHAR(20)   CHARACTER SET utf8 COLLATE utf8_general_ci,
            payer_account       VARCHAR(30)   CHARACTER SET utf8 COLLATE utf8_general_ci,
            seller_account_type VARCHAR(20)   CHARACTER SET utf8 COLLATE utf8_general_ci,
            seller_account       VARCHAR(30)   CHARACTER SET utf8 COLLATE utf8_general_ci,
            is_payer_evaluated  tinyint         not null,
            payer_evaluation    VARCHAR(140),
            is_seller_evaluated tinyint         not null,
            seller_evaluation   VARCHAR(140)  CHARACTER SET utf8 COLLATE utf8_general_ci,
            pay_id              VARCHAR(20)   CHARACTER SET utf8 COLLATE utf8_general_ci      not null,
    
            PRIMARY KEY (id),
            INDEX index_payer_id(payer_id),
            INDEX index_seller_id(seller_id),
            INDEX index_date_choose(date_choose),
            INDEX index_pay_id(pay_id)      not null
        ';
    }
}

?>