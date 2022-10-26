<?php
include '../connect/connect.php';
include '../connect/session.php';
include '../connect/sessionCheck.php';

$commentID = $_POST['commentID'];
$TalkModifyMsg = $_POST['TalkModifyMsg'];

$sql = "UPDATE myTalk SET TalkContents = '$TalkModifyMsg' WHERE myTalkID = $commentID";
$connect->query($sql);
?>
<script>
    location.href="Talk.php";
</script>