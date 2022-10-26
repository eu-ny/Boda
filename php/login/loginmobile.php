<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <?php include '../include/link.php'; ?>
    <title>로그인 페이지</title>
</head>

<body>
    <?php include '../include/header.php'; ?>
    <!-- //header -->
    <div id="loginPage" class="loginPage">
        <main id="loginMain" class="popupMobile">
            <div class="login__header">
                <h2 class="popup__title">LOGIN</h2>
                <button type="button" class="popup__close"><span class="blind">닫기</span></button>
            </div>
            <div class="login__inner">
                <form action="loginmobileSave.php" name="login" class="loginForm" method="post">
                    <fieldset>
                        <legend class="blind">로그인 작성 란</legend>
                        <div class="ID">
                            <label for="youID" class="blind">아이디</label>
                            <input type="text" class="userID" name="userID" placeholder="아이디" id="youID" maxlength="20" required>
                        </div>
                        <div class="pass">
                            <label for="youPass" class="blind">패스워드</label>
                            <input type="password" class="userPass" name="userPass" placeholder="비밀번호" id="userPass" required>
                        </div>
                        <button type="submit" class="login-btn">로그인</button>
                    </fieldset>
                </form>
                <div class="login__footer">
                    <div class="join__btn">
                        <a href="../login/agree.php">회원가입</a>
                        <a href="../login/findID.php">아이디 찾기</a>
                        <a href="../login/findPass.php">비밀번호 찾기</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php include '../include/footer.php'; ?>
    <?php include '../include/script.php'; ?>
</body>
</html>