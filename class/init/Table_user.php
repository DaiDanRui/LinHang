<?php
/**
 *用户信息表tbl_user
 *字段: user_	字段含义	字段类型	主键/外键	是否为空	唯一	注
 *id		BIGINT	主键		是
 *is_seller	是买家还是卖家	Boolean（tinyint）				1 是 0否
 *log_name	用户登录名	VARCHAR(20)			是
 *password	登录密码	VARCHAR(20)
 *legal_name	用户姓名	VARCHAR(12)
 *school	用户学校	VARCHAR(40)
 *school_id	用户学号	VARCHAR(12)
 *phone_number	用户电话号码	CHAR(11)				仅考虑国内（无区号）
 *email	        用户邮箱	VARCHAR(100)		can be null
 *nick_name	用户昵称	VARCHAR(12)		can be null
 *birthday	用户生日	DATETIME(8)		can be null
 *is_active	账号是否可用	Boolean（tinyint）
 *last_log	最近一次登录	DATETIME(8)
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
            user_id             BIGINT        not null    unique AUTO_INCREMENT,
            user_is_seller      tinyint       not null,
            user_log_name       VARCHAR(20)       not null    unique ,
            user_password       VARCHAR(20)       not null,
            user_legal_name     VARCHAR(12)       not null,
            user_school         VARCHAR(40)       not null,
            user_school_id      VARCHAR(12)       not null,
            user_phone_number   VARCHAR(11)        ,
            user_email          VARCHAR(100)       ,
            user_nick_name      VARCHAR(12)        ,
            birthday            DATETIME           ,
            is_active           tinyint       not null,
            last_log            DATETIME       not null,
            PRIMARY KEY (user_id)
            '
        ;
    }
}

?>