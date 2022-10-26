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

    <!-- main -->
    <main id="main" class="login__container">
        <div class="find__header">
            <h2>계정 찾기</h2>
        </div>
        <div class="find__ID">
            <ul class="find__menu">
                <li><a href="findID.php">아이디 찾기</a></li>
                <li><a href="findPass.php" class="active">비밀번호 찾기</a></li>
            </ul>
            <div class="find__contents">
                <form name="findForm" action="findPassSave.php" class="findForm"  method="post">
                    <fieldset>
                        <legend class="blind">비밀번호 찾기 작성 란</legend>
                        <div class="find-name">
                            <label for="youName">이름</label>
                            <input type="text" class="youName" name="youName" placeholder="이름을 입력해주세요." id="youName" maxlength="20">
                        </div>
                        <div class="find-ID">
                            <label for="youID">아이디</label>
                            <input type="text" class="youID" name="youID" placeholder="아이디를 입력해주세요." id="youID" maxlength="20">
                        </div>
                        <div class="find__tebMenu">
                            <label for="find-Email"><input type="radio" name="find" id="find-Email" class="Email" checked>이메일로 찾기</label>
                            <label for="find-Phone"><input type="radio" name="find" id="find-Phone" class="Phone">휴대폰 번호로 찾기</label>
                        </div>
                        <div class="find__tabContent">
                            <div class="find-tab E">
                                <label for="youEmail">이메일</label>
                                <input type="email" class="youEmail" name="youEmail" placeholder="이메일을 입력해주세요." id="youEmail">
                            </div>
                            <div class="find-tab P hide">
                                <label for="youPhone">휴대폰 번호</label>
                                <input type="text" class="youPhone" name="youPhone" placeholder="휴대폰 번호를 입력해주세요." id="youPhone">
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" class="find-btn openBtn">비밀번호 찾기</button>
                </form>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include '../include/footer.php'; ?>
    <!-- //footer -->
    <?php include '../include/script.php'; ?>
    <script>
        const findE = document.querySelector(".find__tebMenu .Email");
        const findP = document.querySelector(".find__tebMenu .Phone");
        const findC1 = document.querySelector(".find__tabContent .E");
        const findC2 = document.querySelector(".find__tabContent .P");

        findP.addEventListener("click", () => {
            findC1.classList.add("hide");
            findC2.classList.remove("hide");
            $('#youEmail').val('');
            $('#youPhone').val('');
        });

        findE.addEventListener("click", () => {
            findC1.classList.remove("hide");
            findC2.classList.add("hide");
            $('#youEmail').val('');
            $('#youPhone').val('');
        });
    </script>
    <!-- //script -->
</body>

</html>