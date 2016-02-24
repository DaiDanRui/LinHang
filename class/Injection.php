<?php

class Injection
{
    public static function excute($post_name) {
        if (!get_magic_quotes_gpc()) {
            return addslashes($_POST[$post_name]);
        } else {
            return $_POST[$post_name];
        }
    }
}

?>