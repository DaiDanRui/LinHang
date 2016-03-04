<?php

class Transaction_commodity
{
    private $conn;
    private $commodity_id;
    private $where;
    
    function __construct($conn,$commodity_id)
    {
        $this->commodity_id = $commodity_id;
        $this->conn = $conn;
        $this->where = ' where '.Config_commodity::id.' = '."'$this->commodity_id'";
    }
    /**
     * @return array
     */
    public function get_commodity()
    {
        require_once 'class/DBtraverser.php';
        $DBtraveser = new DBtraverser(Config_commodity::table_name,$this->where);
        $retval =  $DBtraveser->excute($conn);
        $result_array = mysqli_fetch_array($retval, MYSQLI_ASSOC);
        mysqli_free_result($retval);
        return $result_array;
    }
    
    /**
     * 
     * @param int $state :state in Transaction_state_config
     * @return 
     */
    public function update($state)
    {
        require_once 'class/Config_commodity.php';
        require_once 'class/DBupdater.php';
        $ary = array(
            Config_commodity::commodity_state => $state
        );
        $where = ' where '.Config_commodity::id.' = '."'$this->commodity_id'";
        $DBupdater = new DBupdater(
            Config_commodity::table_name,
            $ary,
            $this->where
        );
        return $DBupdater->excute($conn);
    }
}

?>