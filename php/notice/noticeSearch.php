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

    <title>NOTICE SEARCH</title>
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
    <h2 class="blind">공지사항 게시판 검색 결과입니다.</h2>
    <div class="notice__header top__container">
        <h2>NOTICE</h2>
        <div class="home">
            <a href="../main/main.php"><span class="home_icon"></span></a>
            <span>NOTICE</span>
        </div>
        <div class="menu">
            <li><a href="notice.php" class="active">NOTICE</a></li>
            <li><a href="FAQ.php">FAQ</a></li>
        </div>
        <div class="notice__search">
            <form action="noticeSearch.php" name="noticeSearch" method="get">
                <fieldset class="noticeSearchBox">
                    <legend class="blind">공지사항 검색 영역입니다.</legend>
                    <select name="searchOption" id="searchOption">
                        <option value="title">제목</option>
                        <option value="content">내용</option>
                    </select>
                    <input
                        type="search"
                        name="searchKeyword"
                        id="searchKeyword"
                        placeholder="검색어를 입력하세요."
                        class="noticeInput"
                        aria-label="search"
                        required
                    />
                    <button type="submit" class="searchBtn">
                        <svg
                            width="18"
                            height="18"
                            viewBox="0 0 29 29"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.7261 18.239H19.4162L18.952 17.7913C20.5769 15.9011 21.5552 13.4471 21.5552 10.7776C21.5552 4.82504 16.7301 0 10.7776 0C4.82504 0 0 4.82504 0 10.7776C0 16.7301 4.82504 21.5552 10.7776 21.5552C13.4471 21.5552 15.9011 20.5769 17.7913 18.952L18.239 19.4162V20.7261L25.391 27.8638C25.7937 28.2658 25.9951 28.4667 26.2279 28.5402C26.424 28.602 26.6345 28.6019 26.8306 28.5399C27.0633 28.4662 27.2644 28.265 27.6667 27.8627L27.8627 27.6667C28.265 27.2644 28.4662 27.0633 28.5399 26.8306C28.6019 26.6345 28.602 26.424 28.5402 26.2279C28.4667 25.9951 28.2658 25.7937 27.8638 25.391L20.7261 18.239ZM10.7776 18.239C6.64894 18.239 3.31618 14.9062 3.31618 10.7776C3.31618 6.64894 6.64894 3.31618 10.7776 3.31618C14.9062 3.31618 18.239 6.64894 18.239 10.7776C18.239 14.9062 14.9062 18.239 10.7776 18.239Z"
                                fill="#323232" />
                        </svg>
                    </button>
                </fieldset>
            </form>
        </div>
    </div>
    <section class="mid__container">
        <div class="board">
            <div class="notice__board">
                <p class="board__total">총 <em>
<?php
if (isset($_GET['page'])) {
    $page = (int) $_GET['page'];
} else {
    $page = 1;
}
function msg($alert)
{
    echo $alert;
}
$searchKeyword = $_GET['searchKeyword'];
$searchOption = $_GET['searchOption'];
$searchKeyword = $connect->real_escape_string(trim($searchKeyword));
$searchOption = $connect->real_escape_string(trim($searchOption));
$sql =
    'SELECT n.myNoticeID, n.NoticeTitle, n.NoticeSubTitle, n.NoticeImgFile, n.NoticeContents, m.myMemberID, n.NoticeregTime FROM myNotice n JOIN myMember m ON(n.myMemberID = m.myMemberID)';
switch ($searchOption) {
    case 'title':
        $sql .= "WHERE n.NoticeTitle LIKE '%{$searchKeyword}%' ORDER BY myNoticeID DESC ";
        break;
    case 'content':
        $sql .= "WHERE n.NoticeContents LIKE '%{$searchKeyword}%' ORDER BY myNoticeID DESC ";
        break;
} // 이 데이터를 보내기
$result = $connect->query($sql); // 전체 게시글 개수(count에 저장)
$totalCount = $result->num_rows;
msg($totalCount);
?>
                </em>건</p>
                <table class="notice__table">
                    <colgroup>
                        <col style="width: 20%" />
                        <col style="width: 50%"/>
                        <col class="mobile__table" style="width: 20%" />
                        <col style="width: 10%" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th class="mobile__table">날짜</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$viewNum = 10;
$viewLimit = $viewNum * $page - $viewNum;
$sql = $sql . "LIMIT {$viewLimit}, {$viewNum}";
$result = $connect->query($sql);
if ($result) {
    $count = $result->num_rows;
    if ($count > 0) {
        for ($i = 1; $i <= $count; $i++) {
            $info = $result->fetch_array(MYSQLI_ASSOC); // 제목
            echo '<tr>';
            echo '<td>' . $info['myNoticeID'] . '</td>';
            echo '<td>' . $info['NoticeTitle'] . '</td>';
            echo "<td class='mobile__table'>" .
                date('Y-m-d', $info['NoticeregTime']) .
                '</td>';
            echo "<td><svg class='open' width='16' height='9' viewBox='0 0 16 9' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M1 1L8 8L15 1' stroke='#888888' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg><svg class='close blind' width='16' height='9' viewBox='0 0 16 9' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M15 8L8 0.999999L1 8' stroke='#888888' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg></td>";
            echo '</tr>'; // 내용
            echo '<tr>';
            echo "<td colspan='4' class='content blind'><img src=../assets/img/Notice/" .
                $info['NoticeImgFile'] .
                '>' .
                $info['NoticeSubTitle'];
            echo "<p class='box'>" . $info['NoticeContents'] . '</p></td></tr>';
        }
    } else {
        echo "<tr><td colspan='4'>검색된 결과가 없습니다.</td></tr>";
    }
}
?>
                        <!-- <tr>
                            <td>9</td>
                            <td>BODA 이용약관 개정 안내 (10/21) BODA 이용약관 개정 안내 (10/21)</td>
                            <td>2022-10-21</td>
                            <td><svg class="open" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L8 8L15 1" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="close blind" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 8L8 0.999999L1 8" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="content blind">
                                BODA 홈페이지 내 이용약관 내용을 개정하여 다음과 같이 안내드립니다.
                                <p class="box">
                                    [기존 약관]<br>
                                    제 1조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>

                                    [기존 약관]<br>
                                    제 2조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...
                                </p>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="board__btn">
<?php if ($_SESSION['myMemberID'] == 24) {
    echo "<a href='noticeWrite.php'>글쓰기</a>";
} ?>
            </div>
            
                <!-- 반응형용 표 -->
            <!-- <div class="board__table2">
                <table>
                    <colgroup>
                        <col style="width: 20%;">
                        <col style="width: 60%;">
                        <col style="width: 20%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10</td>
                            <td>BODA 이용약관 개정 안내 (10/21)</td>
                            <td>
                                <svg class="open" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L8 8L15 1" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="close blind" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 8L8 0.999999L1 8" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="content blind">
                                BODA 홈페이지 내 이용약관 내용을 개정하여 다음과 같이 안내드립니다.
                                <p class="box">
                                    [기존 약관]<br>
                                    제 1조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>

                                    [기존 약관]<br>
                                    제 2조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>09</td>
                            <td>BODA 이용약관 개정 안내 (10/21) BODA 이용약관 개정 안내 (10/21)</td>
                            <td>
                                <svg class="open" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L8 8L15 1" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="close blind" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 8L8 0.999999L1 8" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="content blind">
                                BODA 홈페이지 내 이용약관 내용을 개정하여 다음과 같이 안내드립니다.
                                <p class="box">
                                    [기존 약관]<br>
                                    제 1조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>

                                    [기존 약관]<br>
                                    제 2조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>08</td>
                            <td>BODA 이용약관 개정 안내 (10/21)</td>
                            <td>
                                <svg class="open" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L8 8L15 1" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="close blind" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 8L8 0.999999L1 8" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="content blind">
                                BODA 홈페이지 내 이용약관 내용을 개정하여 다음과 같이 안내드립니다.
                                <p class="box">
                                    [기존 약관]<br>
                                    제 1조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>

                                    [기존 약관]<br>
                                    제 2조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>07</td>
                            <td>BODA 이용약관 개정 안내 (10/21)</td>
                            <td>
                                <svg class="open" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L8 8L15 1" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="close blind" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 8L8 0.999999L1 8" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="content blind">
                                BODA 홈페이지 내 이용약관 내용을 개정하여 다음과 같이 안내드립니다.
                                <p class="box">
                                    [기존 약관]<br>
                                    제 1조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>

                                    [기존 약관]<br>
                                    제 2조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>06</td>
                            <td>BODA 이용약관 개정 안내 (10/21)</td>
                            <td>
                                <svg class="open" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L8 8L15 1" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="close blind" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 8L8 0.999999L1 8" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="content blind">
                                BODA 홈페이지 내 이용약관 내용을 개정하여 다음과 같이 안내드립니다.
                                <p class="box">
                                    [기존 약관]<br>
                                    제 1조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>

                                    [기존 약관]<br>
                                    제 2조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>05</td>
                            <td>BODA 이용약관 개정 안내 (10/21)</td>
                            <td>
                                <svg class="open" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L8 8L15 1" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="close blind" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 8L8 0.999999L1 8" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="content blind">
                                BODA 홈페이지 내 이용약관 내용을 개정하여 다음과 같이 안내드립니다.
                                <p class="box">
                                    [기존 약관]<br>
                                    제 1조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>

                                    [기존 약관]<br>
                                    제 2조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>04</td>
                            <td>BODA 이용약관 개정 안내 (10/21)</td>
                            <td>
                                <svg class="open" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L8 8L15 1" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="close blind" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 8L8 0.999999L1 8" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="content blind">
                                BODA 홈페이지 내 이용약관 내용을 개정하여 다음과 같이 안내드립니다.
                                <p class="box">
                                    [기존 약관]<br>
                                    제 1조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>

                                    [기존 약관]<br>
                                    제 2조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>BODA 이용약관 개정 안내 (10/21)</td>
                            <td>
                                <svg class="open" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L8 8L15 1" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="close blind" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 8L8 0.999999L1 8" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="content blind">
                                BODA 홈페이지 내 이용약관 내용을 개정하여 다음과 같이 안내드립니다.
                                <p class="box">
                                    [기존 약관]<br>
                                    제 1조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>

                                    [기존 약관]<br>
                                    제 2조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>BODA 이용약관 개정 안내 (10/21)</td>
                            <td>
                                <svg class="open" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L8 8L15 1" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="close blind" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 8L8 0.999999L1 8" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="content blind">
                                BODA 홈페이지 내 이용약관 내용을 개정하여 다음과 같이 안내드립니다.
                                <p class="box">
                                    [기존 약관]<br>
                                    제 1조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>

                                    [기존 약관]<br>
                                    제 2조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>BODA 이용약관 개정 안내 (10/21)</td>
                            <td>
                                <svg class="open" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L8 8L15 1" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg class="close blind" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 8L8 0.999999L1 8" stroke="#888888" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="content blind">
                                BODA 홈페이지 내 이용약관 내용을 개정하여 다음과 같이 안내드립니다.
                                <p class="box">
                                    [기존 약관]<br>
                                    제 1조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 1 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>

                                    [기존 약관]<br>
                                    제 2조 목적 어쩌고 저쩌고...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...<br><br>
                                    [수정된 약관]<br>
                                    제 2 조 목적 어쩌고 저쩌고... 순댓국 먹고 싶네요...
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> -->
        </div>
        <div class="board__pages">
            <ul>
<?php // 총 페이지 개수
// 총 페이지 개수
?>
$NoticeCount = ceil($totalCount / $viewNum);
// 현재 페이지를 기준으로 보여주고 싶은 개수
$pageCurrent = 5;
$startPage = $page - $pageCurrent;
$endPage = $page + $pageCurrent; // 처음 페이지 초기화
if ($startPage < 1) {
    $startPage = 1;
} // 마지막 페이지 초기화
if ($endPage >= $NoticeCount) {
    $endPage = $NoticeCount;
} // 이전 페이지, 처음 페이지 이동
if ($page != 1) {
    $prevPage = $page - 1;
    echo "<li><a href='noticeSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M17.2498 18L11.2498 12L17.2498 6' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/><path d='M11.25 18L5.25 12L11.25 6' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg></a></li>";
    echo "<li><a href='noticeSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M14.25 6L8.25 12L14.25 18' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg></a></li>";
} // 페이지 넘버 표시
for ($i = $startPage; $i <= $endPage; $i++) {
    $active = '';
    if ($i == $page) {
        $active = 'active';
    }
    echo "<li ><a class='{$active}' href='noticeSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
}
// 다음 페이지, 마지막 페이지 이동
if ($page != $endPage) {
    $nextPage = $page + 1;
    echo "<li><a href='noticeSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M9 18L15 12L9 6' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg></a></li>";
    echo "<li><a href='noticeSearch.php?page={$NoticeCount}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'><svg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M6.75024 6L12.7502 12L6.75024 18' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/><path d='M12.75 6L18.75 12L12.75 18' stroke='#323232' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg></a></li>";
}
?>
            </ul>
        </div>
    </section>
</main>

<?php include '../include/footer.php'; ?>
<!-- //footer -->
<?php include '../include/script.php'; ?>
<!-- //login -->

<script>
    noticeMobile = document.querySelectorAll(".notice__table tbody tr:nth-child(even) td");
    if(matchMedia("screen and (max-width: 600px)").matches){
        noticeMobile.forEach(el => {
            el.setAttribute("colspan", "3");
        })
    }

    // width값 0

    // let MobileTableTr = document.querySelectorAll("tr.mobile__table");
    // let MobileTableTd = document.querySelectorAll("td.mobile__table");
    // if(matchMedia("screen and (max-width: 600px)").matches){
    //     MobileTableTr.forEach((e) => {e.innerHTML = "";});
    //     MobileTableTd.forEach((e) => {e.innerHTML = "";});
    // }

    let NoticeImg = document.querySelectorAll(".board__table .notice__table tbody .content img");
    NoticeImg.forEach(e => {
        if(e.getAttribute("src") == "../assets/img/Notice/Img_default.jpg"){
            e.style.display = "none";
        }
    });
</script>
</body>
</html>