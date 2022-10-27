<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $myReviewID = $_GET['myReviewID'];
    $ReviewSql = "SELECT * FROM myReview WHERE myReviewID = {$myReviewID}";
    $ReviewResult = $connect -> query($ReviewSql);
    $ReviewInfo = $ReviewResult -> fetch_array(MYSQLI_ASSOC);
    $ReviewCommentSql = "SELECT * FROM myReviewComment WHERE myReviewID = {$myReviewID} ORDER BY myReviewCommentID DESC";
    $ReviewCommentResult = $connect -> query($ReviewCommentSql);
    $ReviewCommentInfo = $ReviewResult -> fetch_array(MYSQLI_ASSOC);
    echo $ReviewCommentInfo;
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <?php include "../include/link.php" ?>
        <title>REVIEW VIEW</title>
    </head>
    <body>
        <div id="skip">
            <a href="#header">헤더 영역 바로가기</a>
            <a href="#main">콘텐츠 영역 바로가기</a>
            <a href="#footer">푸터 영역 바로가기</a>
        </div>
        <?php include "../include/header.php" ?>
        <?php include "../login/login.php" ?>
        <!-- //header -->
    
        <main id="main">
            <h2 class="blind">리뷰 게시판 보기 페이지입니다.</h2>
            <div class="main__header top__container">
                <h2>TODAY's</h2>
                <h2>Review</h2>
                <div class="home">
                    <a class="home_iconBox" href="../main/main.php">
                        <span class="home_icon"></span>
                    </a>
                    <span>Review</span>
                </div>
                <div class="menu">
                    <li><a href="Review.php" class="active">REVIEW</a></li>
                    <li><a href="Talk.php">Talk</a></li>
                </div>
            </div>
            <section class="mid__container">
                <div class="viewBoard">
                    <div class="view__table">
                        <table class="view">
                            <colgroup>
                                <col style="width: 20%" />
                                <col style="width: 60%" />
                                <col style="width: 20%" />
                            </colgroup>
<?php
    $myReviewID = $_GET['myReviewID'];

    // 조회수 + 1(UPDATE)
    $sql = "UPDATE myReview set ReviewView = ReviewView + 1 WHERE myReviewID = {$myReviewID}";
    $connect -> query($sql);
    
    $sql = "SELECT r.ReviewTitle, m.myMemberID, m.youNickName, r.ReviewregTime, r.ReviewView, r.ReviewImgFile, r.ReviewContents, r.ReviewLike FROM myReview r JOIN myMember m ON(r.myMemberID = m.myMemberID) WHERE r.myReviewID = {$myReviewID}";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<thead><tr><div class='view__thBox'><th class='view__thBox'>".$info['youNickName']."</th>";
        echo "<th class='view__thBox'>".$info['ReviewTitle']."</th>";
        echo "<th class='view__thBox'>".date('Y-m-d', $info['ReviewregTime'])."</th></div>";
        echo "<th class='view__thMobileBox'><p>".$info['ReviewTitle']."</p>";
        echo "<div class='thMobile__BT'><p>".$info['youNickName']."</p>";
        echo "<p>".date('Y-m-d', $info['ReviewregTime'])."</p></div></th></tr></thead>";
        echo "<tbody><tr><td colspan='3'><div class='height'><figure class='viewImg'><img src='../assets/img/Review/".$info['ReviewImgFile']."'></figure>";
        echo "<div class='view__desc'><p>".$info['ReviewContents']."</p></div></td></tr></tr></tbody>";
    }
?>
                        </table>
                        <div class="view__bottom">
                            <div class="icon">
                                <div class="eye">
                                    <div class="eye_img"></div>
                                    <span> 
                                        <? echo $info['ReviewView']; ?>
                                    </span>
                                    <span class="ir">조회수</span>
                                </div>
                            </div>
                            <div class="view__btn">
                        <?php if($_SESSION['myMemberID'] == $info['myMemberID']){ ?>
                                <a href='ReviewModify.php?myReviewID=<?=$myReviewID?>'>수정</a>
                                <a href='ReviewRemove.php?myReviewID=<?=$myReviewID?>' onclick="alert('정말로 삭제할까요?')">삭제</a>
                                <a href='Review.php'>목록</a>
                            <? } else { ?>
                                <a href='Review.php'>목록</a>
                        <?    }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment__wrap">
                    <div class="comment__inner">
                        <legend>댓글 작성 영역</legend>
                        <div class="commentBox">
                            <label for="ReviewComment">내용</label>
                            <input
                                type="text"
                                name="ReviewComment"
                                id="ReviewComment"
                                class="viewClass"
                                placeholder="댓글을 입력해 보세요."
                                required>
                            <button type="submit" class="btn" id="ReviewCommentWrite">등록</button>
                        </div>
                    </div>
                    <div class="commentsList">
<?php foreach($ReviewCommentResult as $comment){ ?>
    <div class="comment" id="<?=$comment['myReviewCommentID']?>">
        <div class="profile">
        </div>
        <div class="contents">
            <div class="contents__top">
                <p class="name"><span class="ir">작성자</span><span><?=$comment['youNickName']?></span></p>
                <div class="dateBox">
                    <p class="date"><span class="ir">작성일</span><span>| <?=date('Y-m-d H:i', $comment['ReviewCommentregTime'])?></span></p>
                    <button class="modify">| 수정</button>
                    <button class="remove">| 삭제</button>
                </div>
            </div>
            <div class="contents__bottom">
                <span><?=$comment['ReviewComment']?></span>
            </div>
        </div>
    </div>
<?php } ?>
                        <!-- <div class="comment comment_2">
                            <div class="profile">
                            </div>
                            <div class="contents">
                                <div class="contents__top">
                                    <p class="name"><span class="ir">작성자</span><span>머릿고기</span></p>
                                    <div class="dateBox">
                                        <p class="date"><span class="ir">작성일</span><span>| 2022-09-18</span></p>
                                        <a href="#" class="modify">| 수정</a>
                                        <a href="#" class="remove">| 삭제</a>
                                    </div>
                                </div>
                                <div class="contents__bottom">
                                    <span>배고픈데 건드리지 마세요.</span>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
            <div class="topBtn ir">top</div>
        </main>

        <?php include "../include/footer.php" ?>
        <!-- //footer -->
        <?php include "../include/script.php" ?>
        <script>
            let ViewImg = document.querySelector(".viewBoard .view__table table tbody .height img");
            let ViewImgsrc = ViewImg.getAttribute("src");
            if(ViewImgsrc == "../assets/img/Review/Img_default.jpg"){
                ViewImg.style.display = "none";
            }

            const ReviewComment = $("#ReviewComment"); // 댓글 내용
            const ReviewCommentWrite = $("#ReviewCommentWrite"); // 댓글 작성 버튼

            // 댓글 쓰기 버튼
            ReviewCommentWrite.click(function(){
                if(ReviewComment.val() == ""){
                    alert("댓글을 입력해 주세요.");
                    ReviewComment.focus();
                } else {
                    $.ajax({
                        url: "ReviewCommentWrite.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            "ReviewID": <?=$myReviewID?>,
                            "ReviewComment": ReviewComment.val(),
                        },
                        success: function(data){
                            console.log(data);
                            location.reload();
                        },
                        error: function(request, status, error){
                            console.log("request" + request);
                            console.log("status" + request);
                            console.log("error" + request);
                        }
                    });
                }
            });
        </script>
    </body>
</html>