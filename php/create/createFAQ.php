<?php
include '../connect/connect.php';

$sql = 'CREATE TABLE myFAQ (';
$sql .= 'myFAQID int(10) unsigned NOT NULL auto_increment,';
$sql .= 'myMemberID int(10) unsigned NOT NULL,';
$sql .= 'FAQTitle varchar(50) NOT NULL,';
$sql .= 'FAQSubTitle varchar(50) NOT NULL,';
$sql .= 'FAQContents longtext NOT NULL,';
$sql .= 'FAQImgFile varchar(100) DEFAULT NULL,';
$sql .= 'FAQImgSize varchar(100) DEFAULT Null,';
$sql .= 'FAQDelete int(10) DEFAULT Null,';
$sql .= 'FAQregTime int(20) NOT NULL,';
$sql .= 'PRIMARY KEY (myFAQID)';
$sql .= ')charset=utf8;';

$connect->query($sql);

?>
