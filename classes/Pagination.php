<?php
require_once ('Connection.php');
require_once ('controller.php');

class Pagination
{
    public $page = 1;

    public $kol = 5;

    public function getQty($array)
    {
        return count($array);
    }

    public function getKol()
    {

    }
}
//
//$result = $connection->query('SELECT * FROM `books`');
//
//$result = $connection->query("SELECT * FROM `books` LIMIT $startEl, $kol");
////Где:
////
////"$art" - показывает с какой записи выводить;
////"$kol" - количество записей для вывода.
//
//$page = 1; // текущая страница
//$kol = 5;  //количество записей для вывода
//$startEl = ($page * $kol) - $kol; // определяем, с какой записи нам выводить
//
//$result = $connection->query("SELECT * FROM `lessons` LIMIT $startEl,$kol");
//
//$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
//
////$res = mysql_query("SELECT COUNT(*) FROM `lessons`");
////$row = mysql_fetch_row($res);
////$total = $row[0]; // всего записей
//
//$itemOnPage = ceil($quantity / $kol);
//
//
////for ($i = 1; $i <= $str_pag; $i++){
////    echo "<a href=lessons.php?page=".$i."> Страница ".$i." </a>";
////}

