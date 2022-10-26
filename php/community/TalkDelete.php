<?php
include '../connect/connect.php';
include '../connect/session.php';
include '../connect/sessionCheck.php';

$commentID = $_POST['commentID'];

$sql = "DELETE FROM myTalk WHERE myTalkID = {$commentID}";
$connect->query($sql);
?>
<script>
    location.href="Talk.php";
</script>