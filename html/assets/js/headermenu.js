// header hover
const header = document.querySelector(".header__menu");
const submenu = document.querySelectorAll(".header__menu ul li .sub");

header.addEventListener("mouseover", () => {
    submenu.forEach((el) => {
        el.classList.remove("blind");
        el.style.transform = "translateY(0px)";
    });
});
header.addEventListener("mouseout", () => {
    submenu.forEach((el) => {
        el.classList.add("blind");
        el.style.transform = "translateY(-30px)";
    });
});

// smallmenu
const menuBtn = document.querySelector(".header__right .ham");
const menuBtnClose = document.querySelector(".header__right .ham__close");
const smallmenu = document.querySelector(".smallmenu");

menuBtn.addEventListener("click", () => {
    smallmenu.classList.remove("blind");
    menuBtnClose.classList.remove("blind");
    menuBtn.classList.add("blind");
    smallmenu.style.transform = "translateY(0px)";
});

menuBtnClose.addEventListener("click", () => {
    smallmenu.classList.add("blind");
    menuBtnClose.classList.add("blind");
    menuBtn.classList.remove("blind");
    smallmenu.style.transform = "translateY(-30px)";
});

// media ham
const MBHam = document.querySelector(".ham__mobile");
const MBHamClose = document.querySelector(".ham__mobile__close");
const MBmenu = document.querySelector(".mobilemenu");
const headerArea = document.querySelector(".header__area");
const bodyScroll = document.querySelector("body")
MBHam.addEventListener("click", () => {
    MBHam.classList.add("blind");
    MBHamClose.classList.remove("blind");
    MBmenu.classList.add("overlay");
    headerArea.classList.add("overlay");
    bodyScroll.classList.add("scroll");
});
MBHamClose.addEventListener("click", () => {
    MBHam.classList.remove("blind");
    MBHamClose.classList.add("blind");
    MBmenu.classList.remove("overlay");
    headerArea.classList.remove("overlay");
    bodyScroll.classList.remove("scroll");
});

//search
// const searchBtn = document.querySelector(".header__right .search");
// let i = 0;


