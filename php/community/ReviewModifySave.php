<?php
include '../connect/connect.php';
include '../connect/session.php';
include '../connect/sessionCheck.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
<?php
$myReviewID = $_POST['myReviewID'];
$ReviewTitle = $_POST['ReviewTitle'];
$ReviewContents = $_POST['ReviewContents'];
$youPass = $_POST['youPass'];
$myMemberID = $_SESSION['myMemberID'];

$ReviewTitle = $connect->real_escape_string($ReviewTitle);
$ReviewContents = $connect->real_escape_string($ReviewContents);

$sql = "SELECT youPass, myMemberID FROM myMember WHERE myMemberID = {$myMemberID}";
$result = $connect->query($sql);

$memberInfo = $result->fetch_array(MYSQLI_ASSOC);

$sql = "UPDATE myReview SET ReviewTitle = '{$ReviewTitle}', ReviewContents = '{$ReviewContents}' WHERE myReviewID = '{$myReviewID}'";
$connect->query($sql);
?>
<script>
    location.href = "Review.php";
</script>

</body>
</html>