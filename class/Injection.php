<?php

class Injection
{
    /**
     * <strong>防注入操作：包括对$_POST与$_GET数组
     * @param string $post_or_get_name
     */
    public static function excute($post_or_get_name) {
        if (!get_magic_quotes_gpc()) {
            return addslashes($_REQUEST[$post_or_get_name]);
        } else {
            return $_REQUEST[$post_or_get_name];
        }
    }
}

?>