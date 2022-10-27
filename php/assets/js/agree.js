const checkAll = document.querySelector(".checkbox2 input"); // 모두 동의
const checkBoxes = document.querySelectorAll(".Agree input"); // 모두 동의 제외
const Button = document.querySelector(".btn_box button"); // 확인 버튼

// 3개 버튼
const agreements = {
    check1: false,
    check2: false,
    check3: false,
    check4: false,
};

checkBoxes.forEach((item) => item.addEventListener("input", toggleCheckbox));

// 체크박스
function toggleCheckbox(e) {
    const { checked, id } = e.target;
    agreements[id] = checked;
    this.parentNode.classList.toggle("active");
    checkAllStatus();
    toggleSubmitButton();
}

function checkAllStatus() {
    const { check1, check2, check3 } = agreements;
    if (check1 && check2 && check3) {
        checkAll.checked = true;
    } else {
        checkAll.checked = false;
}
}

// 체크박스 3개 클릭되면 버튼
function toggleSubmitButton() {
    const { check1, check2, check3 } = agreements;
    if (check1 && check2 && check3) {
        Button.disabled = false;
    } else {
        Button.disabled = true;
    }
}

checkAll.addEventListener("click", (e) => {
    const { checked } = e.target;
    if (checked) {
        checkBoxes.forEach((item) => {
            item.checked = true;
            agreements[item.id] = true;
            item.parentNode.classList.add("active");
        });
    } else {
        checkBoxes.forEach((item) => {
            item.checked = false;
            agreements[item.id] = false;
            item.parentNode.classList.remove("active");
        });
    }
    toggleSubmitButton();
});

// 링크 이동
function newPage() {
    window.location.href = "../login/agreeInfo.html";
}