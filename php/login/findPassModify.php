<?php
include '../connect/connect.php';
include '../connect/session.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 찾기 페이지</title>
    
    <!-- CSS -->
    <?php include '../include/link.php'; ?>
</head>

<body>
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">콘텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>

    <?php include '../include/header.php'; ?>
    <?php include '../login/login.php'; ?>
    <!-- //header -->
    
    <main id="infoType" class="info__wrap agree">
        <div class="alert">
            <div class="modal">
                <div class="bg"></div>
                <div class="modalBox">
                    <h2>계정 찾기</h2>
                    <p>비밀번호가 성공적으로 변경되었습니다.<br>
                        새로운 비밀번호로 로그인해 주세요.</p>
<?php
$youPass = $_POST['youPass'];
$youID = $_SESSION['youID'];

$sql = "UPDATE myMember SET youPass = '$youPass' WHERE youID = '$youID'";
$result = $connect->query($sql);
?>
                    <a href="../main/main.php" class="btn1">메인으로</a>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include '../include/footer.php'; ?>
    <!-- //footer -->
    <?php include '../include/script.php'; ?>
</body>

</html>