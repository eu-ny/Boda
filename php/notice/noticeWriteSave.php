<?php
include '../connect/connect.php';
include '../connect/session.php';
include '../connect/sessionCheck.php';

$NoticeTitle = $_POST['noticeTitle'];
$NoticeSubTitle = $_POST['noticeSubTitle'];
$NoticeContents = $_POST['noticeContents'];

$NoticeTitle = $connect->real_escape_string($NoticeTitle);
$NoticeSubTitle = $connect->real_escape_string($NoticeSubTitle);
$NoticeContents = $connect->real_escape_string($NoticeContents);
$NoticeView = 1;
$NoticeregTime = time();
$myMemberID = $_SESSION['myMemberID'];
$youNickName = $_SESSION['youNickName'];
$NoticeImgFile = $_FILES['noticeFile'];
$NoticeImgSize = $_FILES['noticeFile']['size'];
$NoticeImgType = $_FILES['noticeFile']['type'];
$NoticeImgName = $_FILES['noticeFile']['name'];
$NoticeImgTmp = $_FILES['noticeFile']['tmp_name'];

echo '<pre>';
var_dump($NoticeImgFile);
echo '</pre>';
echo '<pre>';
var_dump($youNickName);
echo '</pre>';

if ($NoticeImgType) {
    $fileTypeExtension = explode('/', $NoticeImgType);
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
            $NoticeImgDir = '../assets/img/Notice/';
            $NoticeImgName =
                'Img_' . time() . rand(1, 99999) . '.' . "{$fileExtension}";
            // echo "이미지 파일이 맞네요!";
            // 이미지 파일
            $sql = "INSERT INTO myNotice(myMemberID, NoticeTitle, NoticeSubTitle, NoticeContents, NoticeImgFile, NoticeImgSize, NoticeregTime)
                VALUES('$myMemberID', '$NoticeTitle', '$NoticeSubTitle', '$NoticeContents', '$NoticeImgName', '$NoticeImgSize', '$NoticeregTime')";
        } else {
            echo "<script>alert('jpg, jpeg, png, gif 파일만 첨부할 수 있습니다.'); history.back(1)</script>";
        }
    }
} else {
    // echo "이미지 파일이 첨부되지 않았습니다.";
    $sql = "INSERT INTO myNotice(myMemberID, NoticeTitle, NoticeSubTitle, NoticeContents, NoticeImgFile, NoticeImgSize, NoticeregTime)
        VALUES('$myMemberID', '$NoticeTitle', '$NoticeSubTitle', '$NoticeContents', 'Img_default.jpg', '$blogImgSize', '$NoticeregTime')";
}
//이미지 사이즈 확인
if ($NoticeImgSize > 1000000) {
    echo "<script>alert('이미지 용량이 1MB를 초과했습니다.'); history.back(1)</script>";
    exit();
}

$result = $connect->query($sql);
$result = move_uploaded_file($NoticeImgTmp, $NoticeImgDir . $NoticeImgName);
?>

<script>
    location.href = "notice.php";
</script>