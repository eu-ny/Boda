// riview Card swiper
var swiper = new Swiper(".cardSwiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        type: "bullets",
        clickable: true,
    },
});

// main Slider
var swiper = new Swiper(".mySwiper1", {
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
});

// main cardSlider
var swiper2 = new Swiper(".mySwiper2", {
    slidesPerView: "auto",
    freeMode: true,
    mousewheel: true,
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
});

