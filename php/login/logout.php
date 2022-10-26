<?php
include '../connect/session.php';

unset($_SESSION['myMemberID']);
unset($_SESSION['youID']);
unset($_SESSION['youNickName']);
?>

<script>
    history.back();
</script>