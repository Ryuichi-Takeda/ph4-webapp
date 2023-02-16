"use strict";
const calendar_container_content = document.getElementById(
    "calendar_container_content"
);
const modal_contents = document.getElementById("modal_contents");
const modal_wrapper = document.getElementById("modal_wrapper");
const report_and_posting2_container = document.getElementById(
    "report_and_posting2_container"
);
const spinner_box = document.getElementById("spinner_box");
const circle12 = document.getElementById("circle12");
const done = document.getElementById("done");
spinner_box.classList.add("none");
done.classList.add("none");

function tweet() {
    if (circle12.classList.contains("blue") == true) {
        var textarea = document.getElementById("textarea");
        console.log(textarea.value);
        window.open("https://twitter.com/intent/tweet?text=" + textarea.value);
    } else {
    }
    spinner_box.classList.add("none");
    done.classList.remove("none");
}

function click() {
    modal_wrapper.classList.add("center");
    setTimeout(tweet, 3000);
}
report_and_posting2_container.addEventListener("click", function () {
    click();
});
report_and_posting2_container.addEventListener("click", () => {
    modal_contents.classList.add("none");
    spinner_box.classList.remove("none");
    report_and_posting2_container.classList.add("none");
});
//カレンダー
var study_day_record = document.getElementById("study_day_record");
var fp = flatpickr(study_day_record, {
    enableTime: true,
    dateFormat: "Y-m-d", // フォーマットの変更
});
for (let i = 1; i < 13; i++) {
    document.getElementById(`circle${i}`).addEventListener("click", () => {
        document.getElementById(`circle${i}`).classList.toggle("blue");
    });
}