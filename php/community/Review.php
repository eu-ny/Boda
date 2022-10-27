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
        <!-- CSS -->
        <?php include '../include/link.php'; ?>
        <title>REVIEW</title>
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
            <h2 class="blind">모든 리뷰 게시판입니다.</h2>
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
            <!-- cardType -->
            <section class="cardType">
                <div class="card__container">
<?php
$ReviewBestSql =
    'SELECT r.myReviewID, r.ReviewTitle, m.youNickName, r.ReviewImgFile, r.ReviewregTime, r.ReviewView FROM myReview r JOIN myMember m ON(r.myMemberID = m.myMemberID) ORDER BY ReviewView DESC LIMIT 3';
$ReviewBestResult = $connect->query($ReviewBestSql);

foreach ($ReviewBestResult as $ReviewBestSql) { ?>
        <div class="card">
            <figure class="cardImgBox">
                <img src="../assets/img/Review/<?= $ReviewBestSql[
                    'ReviewImgFile'
                ] ?>">
            </figure>
            <div class="card__desc">
                <h3><a href="ReviewView.php?myReviewID=<?= $ReviewBestSql[
                    'myReviewID'
                ] ?>"><?= $ReviewBestSql['ReviewTitle'] ?></a></h3>
                <div class="icon">
                    <p><?= $ReviewBestSql['youNickName'] ?></p>
                    <div class="views">
                        <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 0C6 0 1.73 3.11 0 7.5C1.73 11.89 6 15 11 15C16 15 20.27 11.89 22 7.5C20.27 3.11 16 0 11 0ZM11 12.5C8.24 12.5 6 10.26 6 7.5C6 4.74 8.24 2.5 11 2.5C13.76 2.5 16 4.74 16 7.5C16 10.26 13.76 12.5 11 12.5ZM11 4.5C9.34 4.5 8 5.84 8 7.5C8 9.16 9.34 10.5 11 10.5C12.66 10.5 14 9.16 14 7.5C14 5.84 12.66 4.5 11 4.5Z" fill="#323232" />
                        </svg>
                        <span><?= $ReviewBestSql['ReviewView'] ?></span>
                        <span class="ir">조회수</span>
                    </div>
                </div>
            </div>
        </div>
<?php }
?>
                    <!-- <div class="card">
                        <figure>
                            <img src="../../html/assets/img/review_card_bg03.jpg" alt="review03" />
                        </figure>
                        <div class="card__desc">
                            <h3><a href="ReviewView.php">요즘 유행하는 전시회들 추천!</a></h3>
                            <div class="icon">
                                <p>전시 맛집</p>
                                <div class="views">
                                    <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 0C6 0 1.73 3.11 0 7.5C1.73 11.89 6 15 11 15C16 15 20.27 11.89 22 7.5C20.27 3.11 16 0 11 0ZM11 12.5C8.24 12.5 6 10.26 6 7.5C6 4.74 8.24 2.5 11 2.5C13.76 2.5 16 4.74 16 7.5C16 10.26 13.76 12.5 11 12.5ZM11 4.5C9.34 4.5 8 5.84 8 7.5C8 9.16 9.34 10.5 11 10.5C12.66 10.5 14 9.16 14 7.5C14 5.84 12.66 4.5 11 4.5Z" fill="#323232" />
                                    </svg>
                                    <span>1.4K</span>
                                    <span class="ir">조회수</span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </section>
            <!-- cardTypeMobile -->
            <section class="cardType mobile">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($ReviewBestResult as $ReviewBestSql) { ?>
                            <div class="swiper-slide">
                                <div class="card">
                                    <figure>
                                        <img src="../assets/img/Review/<?= $ReviewBestSql[
                                            'ReviewImgFile'
                                        ] ?>" alt="review01" />
                                    </figure>
                                    <div class="card__desc">
                                        <h3><a href="ReviewView.php?myReviewID=<?= $ReviewBestSql[
                                            'myReviewID'
                                        ] ?>"><?= $ReviewBestSql[
    'ReviewTitle'
] ?></a></h3>
                                        <div class="icon">
                                            <p><?= $ReviewBestSql[
                                                'youNickName'
                                            ] ?></p>
                                            <div class="views">
                                                <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 0C6 0 1.73 3.11 0 7.5C1.73 11.89 6 15 11 15C16 15 20.27 11.89 22 7.5C20.27 3.11 16 0 11 0ZM11 12.5C8.24 12.5 6 10.26 6 7.5C6 4.74 8.24 2.5 11 2.5C13.76 2.5 16 4.74 16 7.5C16 10.26 13.76 12.5 11 12.5ZM11 4.5C9.34 4.5 8 5.84 8 7.5C8 9.16 9.34 10.5 11 10.5C12.66 10.5 14 9.16 14 7.5C14 5.84 12.66 4.5 11 4.5Z" fill="#323232" />
                                                </svg>
                                                <span><?= $ReviewBestSql[
                                                    'ReviewView'
                                                ] ?></span>
                                                <span class="ir">조회수</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?> 
                        <!-- <div class="swiper-slide">
                            <div class="card">
                                <figure>
                                    <img src="../../html/assets/img/review_card_bg01.jpg" alt="review01" />
                                </figure>
                                <div class="card__desc">
                                    <h3><a href="ReviewView.php">포토존 죽여주는 전시회 다녀왔습니다.</a></h3>
                                    <div class="icon">
                                        <p>토매토</p>
                                        <div class="views">
                                            <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 0C6 0 1.73 3.11 0 7.5C1.73 11.89 6 15 11 15C16 15 20.27 11.89 22 7.5C20.27 3.11 16 0 11 0ZM11 12.5C8.24 12.5 6 10.26 6 7.5C6 4.74 8.24 2.5 11 2.5C13.76 2.5 16 4.74 16 7.5C16 10.26 13.76 12.5 11 12.5ZM11 4.5C9.34 4.5 8 5.84 8 7.5C8 9.16 9.34 10.5 11 10.5C12.66 10.5 14 9.16 14 7.5C14 5.84 12.66 4.5 11 4.5Z" fill="#323232" />
                                            </svg>
                                            <span>10.4K</span>
                                            <span class="ir">조회수</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button">
                        <div class="swiper-button-play"><span class="ir">play</span></div>
                        <div class="swiper-button-stop"><span class="ir">stop</span></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </section>
            <!-- //cardType -->
            <section class="mid__container">
                <div class="review">
                    <div class="review__search">
                        <form action="ReviewSearch.php" name="ReviewSearch" method="get">
                            <fieldset class="reviewSearchBox">
                                <legend class="blind">게시글 검색 영역</legend>
                                <select name="searchOption" id="searchOption">
                                    <option value="title">제목</option>
                                    <option value="content">내용</option>
                                    <option value="name">등록자</option>
                                </select>
                                <input
                                    type="search"
                                    name="searchKeyword"
                                    id="searchKeyword"
                                    placeholder="검색어를 입력하세요."
                                    aria-label="search"
                                    class="reviewInput"
                                    required
                                />
                                <button type="submit" class="searchBtn">
                                    <svg
                                        width="18"
                                        height="18"
                                        viewBox="0 0 29 29"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M20.7261 18.239H19.4162L18.952 17.7913C20.5769 15.9011 21.5552 13.4471 21.5552 10.7776C21.5552 4.82504 16.7301 0 10.7776 0C4.82504 0 0 4.82504 0 10.7776C0 16.7301 4.82504 21.5552 10.7776 21.5552C13.4471 21.5552 15.9011 20.5769 17.7913 18.952L18.239 19.4162V20.7261L25.391 27.8638C25.7937 28.2658 25.9951 28.4667 26.2279 28.5402C26.424 28.602 26.6345 28.6019 26.8306 28.5399C27.0633 28.4662 27.2644 28.265 27.6667 27.8627L27.8627 27.6667C28.265 27.2644 28.4662 27.0633 28.5399 26.8306C28.6019 26.6345 28.602 26.424 28.5402 26.2279C28.4667 25.9951 28.2658 25.7937 27.8638 25.391L20.7261 18.239ZM10.7776 18.239C6.64894 18.239 3.31618 14.9062 3.31618 10.7776C3.31618 6.64894 6.64894 3.31618 10.7776 3.31618C14.9062 3.31618 18.239 6.64894 18.239 10.7776C18.239 14.9062 14.9062 18.239 10.7776 18.239Z"
                                            fill="#323232"
                                        />
                                    </svg>
                                </button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="review__board">
                        <p class="board__total">
                            총 <em>
<?php
$sql = 'SELECT myReviewID FROM myReview';
$result = $connect->query($sql);
$count = $result->num_rows;
echo $count;
?>
                            </em>건
                        </p>
                        <table class="review__table">
                            <colgroup>
                                <col style="width: 12%" />
                                <col style="width: 32%" />
                                <col style="width: 12%" />
                                <col class="mobile__table" style="width: 12%" />
                                <!-- <col style="width: 12%" /> -->
                                <col style="width: 12%" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>작성자</th>
                                    <th class="mobile__table">날짜</th>
                                    <!-- <th>추천수</th> -->
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
if (isset($_GET['page'])) {
    $page = (int) $_GET['page'];
} else {
    $page = 1;
}

$viewNum = 10;
$viewLimit = $viewNum * $page - $viewNum;

// 두 개의 테이블 join
$sql = "SELECT r.myReviewID, r.ReviewTitle, m.youNickName, r.ReviewregTime, r.ReviewLike, r.ReviewView FROM myReview r JOIN myMember m ON(r.myMemberID = m.myMemberID) ORDER BY myReviewID DESC LIMIT ${viewLimit}, ${viewNum}";
$result = $connect->query($sql);

if ($result) {
    $count = $result->num_rows;

    if ($count > 0) {
        for ($i = 1; $i <= $count; $i++) {
            $info = $result->fetch_array(MYSQLI_ASSOC);
            echo '<tr>';
            echo '<td>' . $info['myReviewID'] . '</td>';
            echo "<td><a href='ReviewView.php?myReviewID={$info['myReviewID']}'>" .
                $info['ReviewTitle'] .
                '</a></td>';
            echo '<td>' . $info['youNickName'] . '</td>';
            echo "<td class='mobile__table'>" .
                date('Y-m-d', $info['ReviewregTime']) .
                '</td>';
            // echo "<td>".$info['ReviewLike']."</td>";
            echo '<td>' . $info['ReviewView'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo "<tr><td colspan='5'>게시글이 없습니다.</td></tr>";
    }
}
?>

                                <!-- <tr>
                                    <td>10</td>
                                    <td><a href="ReviewView.html">진짜 멋진 포토존 어쩌고</a></td>
                                    <td>둘리</td>
                                    <td>2022-10-05</td>
                                    <td>123</td>
                                    <td>1.1K</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="review__btn">
                        <a href="ReviewWrite.php">글쓰기</a>
                    </div>
                </div>
                <div class="board__pages">
                    <ul>
<?php
$sql = 'SELECT count(myReviewID) FROM myReview';
$result = $connect->query($sql);

$ReviewCount = $result->fetch_array(MYSQLI_ASSOC);
$ReviewCount = $ReviewCount['count(myReviewID)'];

$ReviewCount = ceil($ReviewCount / $viewNum);

$pageCurrent = 5;
$startPage = $page - $pageCurrent;
$endPage = $page + $pageCurrent;

// 처음 페이지 초기화
if ($startPage < 1) {
    $startPage = 1;
}

// 마지막 페이지 초기화
if ($endPage >= $ReviewCount) {
    $endPage = $ReviewCount;
}

// 이전 페이지, 처음 페이지 이동
if ($page != 1) {
    $prevPage = $page - 1;
    echo "<li><a href='Review.php?page=1'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
        <path d='M17.2498 18L11.2498 12L17.2498 6' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
        <path d='M11.25 18L5.25 12L11.25 6' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
        </svg></a></li>";
    echo "<li><a href='Review.php?page={$prevPage}'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
        <path d='M14.25 6L8.25 12L14.25 18' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
        </svg></a></li>";
}

// 페이지 넘버 표시
for ($i = $startPage; $i <= $endPage; $i++) {
    $active = '';
    if ($i == $page) {
        $active = 'active';
    }
    echo "<li ><a class='{$active}' href='Review.php?page={$i}'>{$i}</a></li>";
}

// 다음 페이지, 마지막 페이지 이동
if ($page != $endPage) {
    $nextPage = $page + 1;
    echo "<li><a href='Review.php?page={$nextPage}'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
        <path d='M9 18L15 12L9 6' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
        </svg></a></li>";
    echo "<li><a href='Review.php?page={$ReviewCount}'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
        <path d='M6.75024 6L12.7502 12L6.75024 18' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
        <path d='M12.75 6L18.75 12L12.75 18' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
        </svg></a></li>";
}
?>
                        <!-- <li><a href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.2498 18L11.2498 12L17.2498 6" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.25 18L5.25 12L11.25 6" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg></a></li>
                        <li><a href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.25 6L8.25 12L14.25 18" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                </a></li>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 18L15 12L9 6" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg></a></li>
                        <li><a href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.75024 6L12.7502 12L6.75024 18" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.75 6L18.75 12L12.75 18" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg></a></li> -->
                    </ul>
                </div>
            </section>
            <div class="topBtn ir">top</div>
        </main>

        <?php include '../include/footer.php'; ?>
        <!-- //footer -->

        <?php include '../include/script.php'; ?>
    </body>
</html>