const OpenBtn = document.querySelectorAll(".notice__board .notice__table tbody tr td .open");
const CloseBtn = document.querySelectorAll(".notice__board .notice__table tbody tr td .close");
const content = document.querySelectorAll(".notice__board .notice__table tbody tr td.content");

for(let i=0; i<content.length; i++){
    OpenBtn[i].addEventListener("click", () => {
        content[i].classList.remove("blind");
        OpenBtn[i].classList.add("blind");
        CloseBtn[i].classList.remove("blind");
        // content[i].style.transform = "scale(100%)";
    })
    CloseBtn[i].addEventListener("click", () => {
        content[i].classList.add("blind");
        OpenBtn[i].classList.remove("blind");
        CloseBtn[i].classList.add("blind");
    })
}
