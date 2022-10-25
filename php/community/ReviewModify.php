<?php
include '../connect/connect.php';
include '../connect/session.php';
include '../connect/sessionCheck.php';
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>REVIEW WRITE</title>

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

        <main id="main">
        <h2 class="blind">리뷰 게시글 수정 페이지입니다.</h2>
            <div class="main__header top__container">
                <h2>TODAY's</h2>
                <h2>Review</h2>
                <div class="home">
                <span><a href="#">
                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 17V11H12V17H17V9H20L10 0L0 9H3V17H8Z" fill="#323232"/>
                    </svg>
                    </a></span><span>REVIEW</span></div>
                <div class="menu">
                    <li><a href="Review.php" class="active">REVIEW</a></li>
                    <li><a href="Talk.php">Talk</a></li>
                </div>
            </div>
            <section class="mid__container">
                <form action="ReviewModifySave.php" name="ReviewModify" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="blind">리뷰 게시글 수정 영역</legend>
                        <div class="mid__icon">
                            <div class="link">
                                <input type="file" class="pt" name="ReviewFile" id="ReviewFile" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg(jpeg), png, gif 파일만 첨부 가능합니다.">
                                <label for="ReviewFile" class="photo"></label>
                            </div>
                            <div class="center__icon">
                                <div class="center"></div>
                                <div class="left"></div>
                                <div class="right"></div>
                            </div>
                            <div class="right__icon">
                                <div class="icon_U"></div>
                                <div class="icon_B"></div>
                            </div>
                        </div>
                        <div class="review__write__board">
                            <div class="review__write">
                                <div class="writeBox">
                                    <div>
<?php
$myReviewID = $_GET['myReviewID'];

$sql = "SELECT myReviewID, ReviewTitle, ReviewContents FROM myReview WHERE myReviewID = {$myReviewID}";
$result = $connect->query($sql);

if ($result) {
    $info = $result->fetch_array(MYSQLI_ASSOC);

    echo "<div style='display:none'><label for='myReviewID'>번호</label><input type='text' name='myReviewID' id='myReviewID' value='" .
        $info['myReviewID'] .
        "'/></div>";
    echo "<label class='blind' for='ReviewTitle'>제목</label><input type='text' name='ReviewTitle' id='ReviewTitle' class='Title' value='" .
        $info['ReviewTitle'] .
        "'></div><div>";
    echo "<label class='blind' for='ReviewContents'>내용</label><textarea name='ReviewContents' id='ReviewContents' class='Contents' rows='20'>" .
        $info['ReviewContents'] .
        '</textarea></div><div>';
    // echo "<label for='youPass'>비밀번호</label><input type='password' name='youPass' id='youPass'placeholder='로그인 비밀번호를 입력해 주세요.' autocomplete='off' required></input></div></div>";
}
?>
                                </div>
                            </div>
                            <div class="review__writeBtn">
                                <a id="rListBtn" href="Review.php">목록</a>
                                <button id="rSaveBtn" type="submit" value="저장">저장</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </section>
        </main>
        
        <?php include '../include/footer.php'; ?>
        <!-- //footer -->

        <?php include '../include/script.php'; ?>
    </body>
</html>