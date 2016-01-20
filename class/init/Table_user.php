<?php
/**
 * @author yan
 * @version 2016/1/18
 */
include('Table.php');
class Table_user extends Table
{
    public function __construct($conn){
        parent::__construct($conn, 'tbl_user');
    }
    protected function get_field_name(){
        return '
            user_id             BIGINT        not null    unique   AUTO_INCREMENT,
            user_is_seller      tinyint       not null,
            user_log_name       VARCHAR(20)   CHARACTER SET utf8 COLLATE utf8_general_ci      not null    unique ,
            user_password       VARCHAR(20)   CHARACTER SET utf8 COLLATE utf8_general_ci     not null,
            user_legal_name     VARCHAR(12)   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,
            user_school         VARCHAR(40)   CHARACTER SET utf8 COLLATE utf8_general_ci     not null,
            user_school_id      VARCHAR(12)   CHARACTER SET utf8 COLLATE utf8_general_ci    not null,
            user_sex            tinyint                                                             ,
            user_phone_number   VARCHAR(11)   CHARACTER SET utf8 COLLATE utf8_general_ci     ,
            user_email          VARCHAR(100)  CHARACTER SET utf8 COLLATE utf8_general_ci    ,
            user_nick_name      VARCHAR(12)   CHARACTER SET utf8 COLLATE utf8_general_ci   ,
            birthday            DATETIME           ,
            is_active           tinyint       not null,
            last_log            DATETIME       not null,
            PRIMARY KEY (user_id)，
            INDEX index_user_log_name (user_log_name(20)),
            '
        ;
    }
}

?>