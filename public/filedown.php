<?php
$name = 'NotFound.jpg';
    if(isset($_GET['f'])){
        $name = $_GET['f'];        
    }


    $fileDir =  $_SERVER['DOCUMENT_ROOT'] . "/../upload/{$name}";
    if(!File_exists($fileDir) || !isset($_SESSION['user'])){
        //파일이 존재하지 않을경우
        $name = 'NotFound.jpg';
    }
    $fileDir =  $_SERVER['DOCUMENT_ROOT'] . "/../upload/{$name}";

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$name");


    ob_clean();
    flush();
    readfile($fileDir);



