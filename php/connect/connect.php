<?php
    // 기본 설정
    $host = "localhost";
    $user = "praise1109";
    $pass = "leehaeun3727!";
    $db = "BODA";
    
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");
?>