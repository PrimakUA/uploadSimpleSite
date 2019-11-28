<?php


class Upload
{
    public function uploadFile()
    {
        $fileTmpPath = $_FILES['filename']['tmp_name'];
        $fileName = $_FILES['filename']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = $fileName;
        $allowedfileExtensions = array('pdf');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            mkdir("./Library/$fileNameCmps[0]", 0777, true);
            chmod("$fileNameCmps[0]", 0777);
            $uploadFileDir = "./Library/" . $fileNameCmps[0] . "/";
            $dest_path = $uploadFileDir . $newFileName;
            move_uploaded_file($fileTmpPath, $dest_path);
        } else {
            return 'Error';
        }
        return "Done!";
    }
}