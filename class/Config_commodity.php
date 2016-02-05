<?php

class Config_commodity
{
    /**
     * 
id
type
publisher
price
place
release_date

title
description
pic_path
is_valued
praise

communication_way
communication_number
surf_time
leave_message_time
     * @var unknown
     */
     public  $course_array = array(
        'id'      ,
        'type'    ,
        'publisher'     ,
        
        'price'  ,
        'place'  ,
        'release_date' ,
         
        'title',
        'description'  	,
        'pic_path'  	,
        'is_valued' ,
        'praise'  ,
         
         'communication_way',
         'communication_number',
         'surf_time',
         'leave_message_time'
    );
    
    const table_name = '';
     
    const id = 'id'      ;
    const type = 'type'  ;
    const publisher = 'publisher'     ;
    
    const price =  'price'  ;
    const place = 'place'  ;
    const release_date = 'release_date' ;
    
    const title = 'title';
    const description = 'description'  	;
    const pic_path = 'pic_path'  	;
    const is_valued =  'is_valued' ;
    const praise = 'praise';

    const communication_way = 'communication_way';
    const communication_number= 'communication_number';
    const surf_time = 'surf_time';
    const leave_message_time = 'leave_message_time';
    
    
    const reward_config_number = 0 ;
    const course_config_numbrt = 1 ;
    
}

?>