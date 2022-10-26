<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myNotice (";
    $sql .= "myNoticeID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "NoticeTitle varchar(50) NOT NULL,";
    $sql .= "NoticeSubTitle varchar(50) NOT NULL,";
    $sql .= "NoticeContents longtext NOT NULL,";
    $sql .= "NoticeImgFile varchar(100) DEFAULT NULL,";
    $sql .= "NoticeImgSize varchar(100) DEFAULT Null,";
    $sql .= "NoticeDelete int(10) DEFAULT Null,";
    $sql .= "NoticeregTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (myNoticeID)";
    $sql .= ")charset=utf8;";

    $connect -> query($sql);

?>