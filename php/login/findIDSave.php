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
    <title>아이디 찾기 페이지</title>
    
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
<?php
$youName = $_POST['youName'];
$youEmail = $_POST['youEmail'];
$youPhone = $_POST['youPhone'];

$sql = "SELECT myMemberID, youID, youName, youEmail, youPhone, youPass FROM myMember WHERE (youName = '$youName' AND youEmail = '$youEmail') OR (youName = '$youName' AND youPhone = '$youPhone')";
$result = $connect->query($sql);

if ($result) {
    $count = $result->num_rows;
    if ($count == 0) {
        echo '<p>등록된 회원 정보가 없습니다.</p>';
    } else {
        $info = $result->fetch_array(MYSQLI_ASSOC);
        echo '<p>회원님의 아이디는 ' . $info['youID'] . '입니다.</p>';
    }
} else {
    echo '<p>에러발생02 - 관리자에게 문의하세요.</p>';
}
?>
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