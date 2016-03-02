<?php

class Table_praise extends \Table
{

    protected function get_field_name()
    {
        return 
        '   cmoodity_id	   BIGINT	not null,
            praiser_id     BIGINT  not null,
            UNIQUE index_cmoodity_praiser(cmmodity_id,praiser_id)
            ';
    }
}

?>