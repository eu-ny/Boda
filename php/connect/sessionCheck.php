<?php
if (!isset($_SESSION['myMemberID'])) {
    // 로그인 페이지 이동
    echo '먼저 로그인을 해 주세요.';
    Header('Location: ../main/alert.php');
}
?>
