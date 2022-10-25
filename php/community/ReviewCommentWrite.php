<?php
include '../connect/connect.php';
include '../connect/session.php';
include '../connect/sessionCheck.php';

$ReviewComment = $_POST['ReviewComments'];
$ReviewComment = $connect->real_escape_string($ReviewComment);

$ReviewCommentregTime = time();
$myMemberID = $_SESSION['myMemberID'];
$youNickName = $_SESSION['youNickName'];

echo $youNickName;
echo $myMemberID;
echo $ReviewCommentregTime;
echo $ReviewComment;

$sql = "INSERT INTO myReviewComment(myMemberID, youNickName, ReviewComment, ReviewCommentregTime)
    VALUES('$myMemberID', '$youNickName', '$ReviewComment', '$ReviewCommentregTime')";
$connect->query($sql);

echo $sql;
?>
