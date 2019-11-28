<?php
require_once('controller.php');

class SaveFIle
{
    public function save($arr, $arrFile)
    {
        $connection = Connection::getInstance();
        $upload = new Upload();
        $filename = $arrFile['filename']['name'];
        $bookName = $arr['bookName'];
        $authorName = $arr['authorName'];
        $connection->save($filename, $bookName, $authorName);
        $upload->uploadFile();
    }
}
