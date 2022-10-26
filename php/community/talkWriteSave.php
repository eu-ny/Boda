<?php
include '../connect/connect.php';
include '../connect/session.php';
include '../connect/sessionCheck.php';

$TalkContents = $_POST['TalkContents'];
$TalkContents = $connect->real_escape_string($TalkContents);

$TalkregTime = time();
$myMemberID = $_SESSION['myMemberID'];

$sql = "INSERT INTO myTalk(myMemberID, TalkContents, TalkregTime)
    VALUES('$myMemberID', '$TalkContents', '$TalkregTime')";
$connect->query($sql);
?>

<script>
    location.href = "Talk.php";
</script>