<?php

 /**
  ****************************************************************************************************
  * created by zend
  * @author darxan 
  * 对User中类的方法的返回值枚举
  ****************************************************************************************************
  */
final class ResultReturn
{
    const log_name_not_exist = 0;
    const password_wrong = 1;
    const log_verify_pass = 2;
    
    const log_name_already_exist = 3;
    const register_failed = 4;
    const register_pass = 5;
    
}

?>