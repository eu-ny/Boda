<?php
include '../connect/connect.php';

$sql = 'CREATE TABLE myReviewComment (';
$sql .= 'myReviewCommentID int(10) unsigned NOT NULL auto_increment,';
$sql .= 'myReviewID int(10) unsigned NOT NULL,';
$sql .= 'myMemberID int(10) unsigned NOT NULL,';
$sql .= 'youNickName varchar(10) NOT NULL,';
$sql .= 'ReviewComment longtext NOT NULL,';
$sql .= 'ReviewCommentregTime int(20) NOT NULL,';
$sql .= 'PRIMARY KEY (myReviewCommentID)';
$sql .= ')charset=utf8;';

$connect->query($sql);
?>
