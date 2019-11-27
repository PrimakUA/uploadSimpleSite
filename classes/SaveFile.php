<?php


class SaveFIle
{
    public function save($arr, $arrFile, $connection)
    {
        $filename = $arrFile['filename']['name'];
        $bookName = $arr['bookName'];
        $authorName = $arr['authorName'];
        $querySave = "INSERT INTO books (filename, bookName, authorName) VALUES ('$filename', '$bookName', '$authorName')";
        $connection->query($querySave);
        $upload = new Upload();
        $upload->uploadFile();
    }
}
