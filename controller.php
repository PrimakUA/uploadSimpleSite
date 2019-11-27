<?php
require_once('classes/Connection.php');
require_once ('classes/Upload.php');
require_once ('classes/Pagination.php');
require_once ('classes/SaveFile.php');
$number = 1;

$connection = Connection::getInstance();
$pagination = new Pagination();
$saveFile = new SaveFIle();

$allInDatabase = $connection->query('SELECT `filename`, `bookName`, `authorName` FROM `books`');

$quantity = $pagination->getQty($allInDatabase);

if (isset($_POST['send'])) {
    $saveFile->save($_POST, $_FILES, $connection);
    header("Location: index.php");
}

$page = (isset($_GET['page'])) ? $_GET['page'] : 1;

$result = $connection->query('SELECT * FROM `books`');

$result = $connection->query("SELECT * FROM `books` LIMIT $startEl, $kol");
//Где:
//
//"$art" - показывает с какой записи выводить;
//"$kol" - количество записей для вывода.

$page = 1; // текущая страница
$kol = 5;  //количество записей для вывода
$startEl = ($page * $kol) - $kol; // определяем, с какой записи нам выводить

$result = $connection->query("SELECT * FROM `books` LIMIT $startEl,$kol");


//$res = mysql_query("SELECT COUNT(*) FROM `lessons`");
//$row = mysql_fetch_row($res);
//$total = $row[0]; // всего записей

$itemOnPage = ceil($quantity / $kol);


//for ($i = 1; $i <= $str_pag; $i++){
//    echo "<a href=lessons.php?page=".$i."> Страница ".$i." </a>";
//}


