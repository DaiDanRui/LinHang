<?php

function get_all_types($conn)
{
    $query = "select * from tbl_commodity_type";
    $retval = mysqli_query($conn, $query);
    
    $array = array();
    while(($temp =  mysqli_fetch_array($retval, MYSQLI_ASSOC))!=null)
    {
        $array[] = $temp;
    }
    return $array;
}

function get_type($type_id,$conn)
{
   $query = "select type_name from tbl_commodity_type when type_id = '$type_id'";
   $retval = mysqli_query($conn, $query);
   $array =  mysqli_fetch_array($retval, MYSQLI_NUM);
   mysqli_free_result($retval);
   return $array[0];
}