<?php
        include_once 'smarty_init.php';
        require_once 'Include_commodity.php';
        require_once 'class/Config.php';
        $commodity_id = $_REQUEST['id'];
        $conn = Config::connect();
        $commodity_array_for_display = show_buy_html($commodity_id, $conn);
        $smarty->assign('detail',$commodity_array_for_display);
        $smarty->display('My/my-to-review.html');
