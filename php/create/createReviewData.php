<?php
include '../connect/connect.php';
include '../connect/session.php';

for ($i = 1; $i <= 100; $i++) {
    $regTime = time();
    $sql = "INSERT INTO myReview(myMemberID, ReviewTitle, ReviewContents, ReviewView, ReviewregTime)
        VALUES('29', '나는 웹쓰다', '나는 웹쓰다', '1', 'regTime')";
    $connect->query($sql);
}
?>
