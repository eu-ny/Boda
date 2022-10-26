<?php
include '../connect/connect.php';
include '../connect/session.php';
include '../connect/sessionCheck.php';

$ReviewTitle = $_POST['ReviewTitle'];
$ReviewContents = $_POST['ReviewContents'];

$ReviewTitle = $connect->real_escape_string($ReviewTitle);
$ReviewContents = $connect->real_escape_string($ReviewContents);
$ReviewView = 1;
$ReviewregTime = time();
$myMemberID = $_SESSION['myMemberID'];
$youNickName = $_SESSION['youNickName'];
$ReviewImgFile = $_FILES['ReviewFile'];
$ReviewImgSize = $_FILES['ReviewFile']['size'];
$ReviewImgType = $_FILES['ReviewFile']['type'];
$ReviewImgName = $_FILES['ReviewFile']['name'];
$ReviewImgTmp = $_FILES['ReviewFile']['tmp_name'];

// echo "<pre>";
// var_dump($ReviewImgFile);
// echo "</pre>";
// echo "<pre>";
// var_dump($youNickName);
// echo "</pre>";

if ($ReviewImgType) {
    $fileTypeExtension = explode('/', $ReviewImgType);
    $fileType = $fileTypeExtension[0]; //image
    $fileExtension = $fileTypeExtension[1]; //png
    //이미지 타입 확인
    if ($fileType == 'image') {
        if (
            $fileExtension == 'jpg' ||
            $fileExtension == 'jpeg' ||
            $fileExtension == 'png' ||
            $fileExtension == 'gif'
        ) {
            $ReviewImgDir = '../assets/img/Review/';
            $ReviewImgName =
                'Img_' . time() . rand(1, 99999) . '.' . "{$fileExtension}";
            // echo "이미지 파일이 맞네요!";
            // 이미지 파일
            $sql = "INSERT INTO myReview(myMemberID, ReviewTitle, ReviewContents, ReviewLike, ReviewImgFile, ReviewImgSize, ReviewView, ReviewregTime)
                VALUES('$myMemberID', '$ReviewTitle', '$ReviewContents', '0', '$ReviewImgName', '$ReviewImgSize', '$ReviewView', '$ReviewregTime')";
        } else {
            echo "<script>alert('jpg, jpeg, png, gif 파일만 첨부할 수 있습니다.'); history.back(1)</script>";
        }
    }
} else {
    // echo "이미지 파일이 첨부되지 않았습니다.";
    $sql = "INSERT INTO myReview(myMemberID, ReviewTitle, ReviewContents, ReviewLike, ReviewImgFile, ReviewImgSize, ReviewView, ReviewregTime)
        VALUES('$myMemberID', '$ReviewTitle', '$ReviewContents', '0', 'Img_default.jpg', '$blogImgSize', '$ReviewView', '$ReviewregTime')";
}
//이미지 사이즈 확인
if ($ReviewImgSize > 1000000) {
    echo "<script>alert('이미지 용량이 1MB를 초과했습니다.'); history.back(1)</script>";
    exit();
}

$result = $connect->query($sql);
$result = move_uploaded_file($ReviewImgTmp, $ReviewImgDir . $ReviewImgName);
?>

<script>
    location.href = "Review.php";
</script>