<?php
include '../connect/connect.php';
include '../connect/session.php';
if (isset($_SESSION['myMemberID'])) {
    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
} else {
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
<?php
$youName = $_POST['youName'];
$youID = $_POST['youID'];
$youEmail = $_POST['youEmail'];
$youPhone = $_POST['youPhone'];

$sql = "SELECT myMemberID, youID, youName, youEmail, youPhone, youPass FROM myMember WHERE (youName = '$youName' AND youID = '$youID' AND youEmail = '$youEmail') OR (youName = '$youName' AND youID = '$youID' AND youPhone = '$youPhone')";
$result = $connect->query($sql);

if ($result) {
    $count = $result->num_rows;
    if ($count == 0) {
        echo '<p>등록된 회원 정보가 없습니다.</p>';
    } else {

        $info = $result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['youID'] = $youID;
        echo '<p>새로운 비밀번호로 변경해 주세요.</p>';
        ?>

            <form name="findForm" action="findPassModify.php" class="findForm"  method="post" onclick="return joinChecks()">
                <fieldset>
                    <legend class="blind">새로운 비밀번호 작성 란</legend>
                    <div class="find-name">
                        <label for="youPass" class="blind">새로운 비밀번호</label>
                        <input type="password" class="youPass" name="youPass" placeholder="새로운 비밀번호를 입력해 주세요." id="youPass" maxlength="20" required>
                        <p class="msg" id="youPassComment"></p>
                    </div>
                    <div class="find-name">
                        <label for="youPassC" class="blind">비밀번호 확인</label>
                        <input type="password" class="youPassC" name="youPassC" placeholder="비밀번호를 한 번 더 입력해 주세요." id="youPassC" maxlength="20" required>
                        <p class="msg" id="youPassCComment"></p>
                    </div>
                </fieldset>
                <button type="submit" class="find-btn openBtn">확인</button>
            </form>
<?php
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
    <script>
        function joinChecks(){
            // 비밀번호 유효성 검사
            let getYouPass = $("#youPass").val();
            let getYouPassNum = getYouPass.search(/[0-9]/g);
            let getYouPassEng = getYouPass.search(/[a-z]/ig);
            /* i: 대/소문자 구별x */
            let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

            if(getYouPass.length < 8 || getYouPass.length > 20){
                $("#youPassComment").text("* 비밀번호는 8자리에서 20자리 이내로 입력해 주세요.");
                return false;
            } else if (getYouPass.search(/\s/) != -1){
                $("#youPassComment").text("* 비밀번호는 공백 없이 입력해 주세요.");
                return false;
            } else if(getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0){
                $("#youPassComment").text("* 영문, 숫자, 특수문자를 혼합하여 입력해 주세요.");
                return false;
            }

            // 비밀번호 확인 공백 검사
            if($("#youPassC").val() == ""){
                $("#youPassCComment".text("* 비밀번호 확인을 입력해 주세요."));
                return false;
            }
            // 비밀번호 확인 동일 체크
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassCComment").text("* 비밀번호가 일치하지 않습니다.");
                return false;
            }
        }
    </script>
</body>

</html>

<?php
} ?>
