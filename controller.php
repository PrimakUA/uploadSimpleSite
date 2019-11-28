<?php
require_once('classes/Connection.php');
require_once('classes/Upload.php');
require_once('classes/Pagination.php');
require_once('classes/SaveFile.php');

const ITEM_ON_PAGE = 5;

$connection = Connection::getInstance();
$pagination = new Pagination();
$saveFile = new SaveFIle();

$allInDatabase = $connection->getAll();
$quantity = $pagination->getQty($allInDatabase);

if (isset($_POST['send']) || isset($_FILES['filename'])) {
    $saveFile->save($_POST, $_FILES);
    header("Location: index.php");
}

$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$startEl = ($page * ITEM_ON_PAGE) - ITEM_ON_PAGE;
$startNumber = $startEl + 1;
$result = $connection->getPaginat($startEl, ITEM_ON_PAGE);
$quantityOnPage = $pagination->getQty($result);
$itemOnPage = $pagination->getItemOnPage($quantity, ITEM_ON_PAGE);
