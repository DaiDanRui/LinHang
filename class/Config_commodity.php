<?php
/**
 *****************************************************************************************************************************
 * created by zend
 * @author darxan 
 * @version 2016年2月13日
 */
class Config_commodity
{
    
     public  $commodity_array = array(
        'id'      ,
         
        'course_or_reward',
        'type'    ,
        'publisher'     ,
        
        'price'  ,
        'place'  ,
        'release_date' ,
         
        'title',
        'description'  	,
 //       'pic_path'  	,
        'commodity_state' ,
        'praise'  ,
         
         'communication_way',
         'communication_number',
         'surf_time',
         'leave_message_time'
    );
    
    const table_name = 'tbl_commodity';
     
    const id = 'id'      ;
    const course_or_reward  = 'course_or_reward';
    const type = 'type'  ;
    const publisher = 'publisher'     ;
    
    const price =  'price'  ;
    const place = 'place'  ;
    const release_date = 'release_date' ;
    
    const title = 'title';
    const description = 'description'  	;
   // const pic_path = 'pic_path'  	;
    const commodity_state =  'commodity_state' ;
    const praise = 'praise';

    const communication_way = 'communication_way';
    const communication_number= 'communication_number';
    const surf_time = 'surf_time';
    const leave_message_time = 'leave_message_time';
    
  
    
}

?>