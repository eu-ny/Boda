<?php
include '../connect/connect.php';
include '../connect/session.php';
include '../connect/sessionCheck.php';

$FAQTitle = $_POST['FAQTitle'];
$FAQSubTitle = $_POST['FAQSubTitle'];
$FAQContents = $_POST['FAQContents'];

$FAQTitle = $connect->real_escape_string($FAQTitle);
$FAQSubTitle = $connect->real_escape_string($FAQSubTitle);
$FAQContents = $connect->real_escape_string($FAQContents);
$FAQregTime = time();
$myMemberID = $_SESSION['myMemberID'];
$youNickName = $_SESSION['youNickName'];
$FAQImgFile = $_FILES['FAQFile'];
$FAQImgSize = $_FILES['FAQFile']['size'];
$FAQImgType = $_FILES['FAQFile']['type'];
$FAQImgName = $_FILES['FAQFile']['name'];
$FAQImgTmp = $_FILES['FAQFile']['tmp_name'];

echo '<pre>';
var_dump($FAQImgFile);
echo '</pre>';
echo '<pre>';
var_dump($youNickName);
echo '</pre>';

if ($FAQImgType) {
    $fileTypeExtension = explode('/', $FAQImgType);
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
            $FAQImgDir = '../assets/img/FAQ/';
            $FAQImgName =
                'Img_' . time() . rand(1, 99999) . '.' . "{$fileExtension}";
            // echo "이미지 파일이 맞네요!";
            // 이미지 파일
            $sql = "INSERT INTO myFAQ(myMemberID, FAQTitle, FAQSubTitle, FAQContents, FAQImgFile, FAQImgSize, FAQregTime)
                VALUES('$myMemberID', '$FAQTitle', '$FAQSubTitle', '$FAQContents', '$FAQImgName', '$FAQImgSize', '$FAQregTime')";
        } else {
            echo "<script>alert('jpg, jpeg, png, gif 파일만 첨부할 수 있습니다.'); history.back(1)</script>";
        }
    }
} else {
    // echo "이미지 파일이 첨부되지 않았습니다.";
    $sql = "INSERT INTO myFAQ(myMemberID, FAQTitle, FAQSubTitle, FAQContents, FAQImgFile, FAQImgSize, FAQregTime)
        VALUES('$myMemberID', '$FAQTitle', '$FAQSubTitle', '$FAQContents', 'Img_default.jpg', '$blogImgSize', '$FAQregTime')";
}
//이미지 사이즈 확인
if ($FAQImgSize > 1000000) {
    echo "<script>alert('이미지 용량이 1MB를 초과했습니다.'); history.back(1)</script>";
    exit();
}

$result = $connect->query($sql);
$result = move_uploaded_file($FAQImgTmp, $FAQImgDir . $FAQImgName);
?>

<script>
    // location.href = "FAQ.php";
</script>