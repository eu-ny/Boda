<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <title>BODA 사이트 만들기</title>

    <!-- CSS -->
    <?php include "../include/link.php" ?>
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
    
        <!-- main -->
        <main id="main" class="mainContents">
        <section id="mainSliderType" class="mainSlider__wrap">
            <h2 class="blind">슬라이드 영역</h2>
            <div class="slider__inner">
                <div class="swiper mySwiper mySwiper1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide mainSlide1">
                            <figure class="mainSliderImg">
                                <img src="../assets/img/main__slider__bg01.jpg" alt="mainSliderImg">
                            </figure>
                            <div class="mainSlider_desc">
                                <span>2022.09.28.~2022.12.31.</span>
                                <p class="main__sliderHeading">
                                    추상의 현상
                                </p>
                                <div class="mainSlider__btn">
                                    <a href="#">view more</a>
                                </div>
                            </div>
                        </div>
                        <!-- //slider1 -->
                        <div class="swiper-slide mainSlide2">
                            <figure class="mainSliderImg">
                                <img src="../assets/img/main__slider__bg02.jpg" alt="mainSliderImg">
                            </figure>
                            <div class="mainSlider_desc">
                                <span>2022.09.28.~2022.12.31.</span>
                                <p class="main__sliderHeading">
                                    권소영 개인전
                                </p>
                                <div class="mainSlider__btn">
                                    <a href="#">view more</a>
                                </div>
                            </div>
                        </div>
                        <!-- //slider2 -->
                    </div>
                </div>
            </div>
        </section>

        <section class="mainContent__wrap">
            <h2 class="blind">콘텐츠 영역</h2>
            <!-- mainContent1 -->
            <article id="mainContent1" class="mainCS__wrap">
                <h2 class="blind">mainContent1</h2>
                <div class="mainCS__header">
                    <h2>BODA <em>PICK !</em></h2>
                    <p>특별한 오늘 전시 한 번 관람해보시는 건  어떠신가요?</p>
                </div>
                <div class="mySwiper2 swiper-container mySwiper">
                    <ul class="mainCS swiper-wrapper">
                        <li class="mainCS__card swiper-slide">
                            <a href="#" class="mainCS__img">
                                <img src="../assets/img/main__cardSlider__bg01.jpg" alt="mainCS__card">
                            </a>
                            <div class="mainCS__desc">
                                <span>01</span>
                                <p class="mainCS__desc__tit">
                                    ART SPACE 제 12회
                                </p>
                                <p class="mainCS__desc__date">
                                    2022 - 10 - 28
                                </p>
                            </div>
                        </li>
                        <li class="mainCS__card swiper-slide">
                            <a href="#" class="mainCS__img">
                                <img src="../assets/img/main__cardSlider__bg02.jpg" alt="mainCS__card">
                            </a>
                        </li>
                        <li class="mainCS__card swiper-slide">
                            <a href="#" class="mainCS__img">
                                <img src="../assets/img/main__cardSlider__bg03.jpg" alt="mainCS__card">
                            </a>
                        </li>
                        <li class="mainCS__card swiper-slide">
                            <a class="mainCS__img">
                                <img src="../assets/img/main__cardSlider__bg04.jpg" alt="mainCS__card">
                            </a>
                        </li>
                        <li class="mainCS__card swiper-slide">
                            <a href="#" class="mainCS__img">
                                <img src="../assets/img/main__cardSlider__bg05.jpg" alt="mainCS__card">
                            </a>
                        </li>
                    </ul>
                    <div class="cardScrollbar">
                        <div class="swiper-scrollbar"></div>
                    </div>
                  </div>
                
            </article>
            <!-- //mainContent1 -->

            <!-- mainContent2 -->
            <article id="mainContent2" class="mainBanner__wrap">
                <h2 class="mainContent2"></h2>
                <div class="mainB__desc">
                    <p>Exhibition </p>
                    <p>Information</p>
                    <p>BODA</p>
                </div>
                <div class="mainBanner__btm main__container">
                    <div class="mainBanner__iconBox">
                        <div class="mainBanner__icon"></div>
                    </div>
                    <form action="" class="mainSearch__wrap">
                        <label for="mainSearch" class="blind">검색</label>
                        <div class="mainSearchTop">
                            <p class="click">click !</p>
                            <input type="text" class="mainSearch" id="mainSearch" name="mainSearch" placeholder="여러분이 원하는 정보를 찾아보세요!" autocomplete="off" required>
                            <button class="mainSearch__btn">
                                <div class="mainSearch__icon"></div>
                            </button>
                        </div>
                    </form>
                </div>
            </article>
            <!-- //mainContent2 -->

            <!-- mainContent3 -->
            <div id="mainContent3" class="mainCard__Wrap">
                <div class="mainCard__inner main__container">
                    <div class="mainCard1">
                        <figure class="mainCardImg__box">
                            <img src="../assets/img/main__card__bg01.jpg" alt="">                        
                        </figure>
                        <div class="mainCard__desc">
                            <h3>EXHIBITOIN</h3>
                            <p>현재 운영중이거나 예정인 전시를 다양하게 구성하여 빠른 전시 정보를 얻을 수 있습니다.</p>
                            <div class="mainCard__btn">
                                <a href="#">view more</a>
                            </div>
                        </div>
                    </div>
                    <div class="mainCard2">
                        <div class="mainCard__desc2">
                            <h3>SEARCH</h3>
                            <p>원하는 키워드에 맞게 선택하여 원하는 전시 정보를 쉽고 빠르게 얻을 수 있습니다.</p>
                            <div class="mainCard__btn">
                                <a href="#">view more</a>
                            </div>
                        </div>
                        <figure class="mainCardImg__box">
                            <img src="../assets/img/main__card__bg02.jpg" alt="">                        
                        </figure>
                    </div>
                </div>
            </div>
            <!-- //mainContent3 -->
            
            <div class="bodaText">
                <img src="../assets/img/mainBoda.svg" alt="">
            </div>

            <!-- mainContent4 -->
            <article id="mainContent4" class="best__wrap">
                <h3 class="blind">maincontent4</h3>
                <div class="mainBest__inner main__container">
                    <div class="mainCS__header">
                        <h2>BEST <em>RIVIEW</em></h2>
                        <p>BODA의 다양한 전시 리뷰를 확인해보세요!</p>
                    </div>
                    <div class="MainBest">
                        <div class="Best B-one">
                            <figure class="BestImg">
                                <a href="#">
                                    <img src="../assets/img/main__reviewCard__bg01.jpg" alt="">                        
                                </a>
                            </figure>
                        </div>
                        <div class="Best B-two">
                            <figure class="BestImg">
                                <a href="#">
                                    <img src="../assets/img/main__reviewCard__bg02.jpg" alt="">                        
                                </a>                   
                            </figure>
                        </div>
                        <div class="Best B-thr">
                               <figure class="BestImg">
                                <a href="#">
                                    <img src="../assets/img/main__reviewCard__bg03.jpg" alt="">                        
                                </a>                  
                            </figure>
                        </div>
                        <div class="Best B-fou">
                               <figure class="BestImg">
                                <a href="#">
                                    <img src="../assets/img/main__reviewCard__bg04.jpg" alt="">                        
                                </a>      
                            </figure>
                        </div>
                    </div>
                </div>
            </article>
            <!-- //maincontent4 -->

        </section>
        <a href="../login/agree.html"><div class="smalieAgree ir">btn</div></a>
        <div class="topBtn ir">top</div>
    </main>
    <!-- //main -->


<?php include "../include/footer.php" ?>
<!-- //footer -->
<?php include "../include/script.php" ?>
<!-- //login -->
</body>
</html>