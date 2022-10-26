<?php
include '../connect/connect.php';
include '../connect/session.php';
include '../connect/sessionCheck.php';

$myMemberID = $_SESSION['myMemberID'];
$youNickName = $_SESSION['youNickName'];

// 받아올 값(POST 방식)
$myReviewID = $_POST['ReviewID'];
$ReviewComment = $_POST['ReviewComment'];
$regTime = time();
$sql = "INSERT INTO myReviewComment (myMemberID, myReviewID, youNickName, ReviewComment, ReviewCommentregTime)
        VALUES ('$myMemberID', '$myReviewID', '$youNickName', '$ReviewComment', '$regTime')";

// 데이터 가져옴
$result = $connect->query($sql);
// echo json_encode(array("info" => $myReviewID));
?>
