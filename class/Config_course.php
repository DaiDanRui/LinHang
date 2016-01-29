<?php
/**
 *
 * @author yan
 *字段	字段含义	字段类型	主键/外键	是否为空
 *id	课程ID	BIGINT	主键		AI
 *seller	卖家	BIGINT
 *seller_account_type	卖家账户类型			can be null
 *seller_account	卖家账户	VARCHAR(40)		can be null
 *price	金额	FLOAT(7,3)
 *place	教学地址	VARCHAR(100)
 *release_date	发布日期	DATETIME
 *type	类别	VARCHAR(10)
 *description	课程描述	VARCHAR(100)
 *pic_path	样图文件路径	VARCHAR(40)		can be null
 *is_valued	是否有效	tinyint
 *evaluation	好评度	FLOAT(7,4)
 */
class Config_course
{
    const  course_array = array(
        'id'      ,
        'seller_id'     ,
        'seller_account_type' ,
        'seller_account'  ,
        'price'  ,
        'place'  ,
        'release_date' ,
        'type'  	,
        'description'  	,
        'pic_path'  	,
        'is_valued' ,
        'praise'
    );
    
    const id = 'id'      ;
    const seller_id = 'seller_id'     ;
    const seller_account_type = 'seller_account_type' ;
    const seller_account = 'seller_account'  ;
    const price =  'price'  ;
    const place = 'place'  ;
    const release_date = 'release_date' ;
    const type = 'type'  	;
    const description = 'description'  	;
    const pic_path = 'pic_path'  	;
    const is_valued =  'is_valued' ;
    const praise = 'praise';
}

?>