<?php
require_once('Connection.php');
require_once('controller.php');

class Pagination
{
    public function getQty($array)
    {
        return count($array);
    }

    public function getItemOnPage($all, $onPage)
    {
        return ceil($all / $onPage);
    }
}
