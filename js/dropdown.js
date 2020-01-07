$(document).ready(() => {
    const selected = document.querySelector(".selected");
    const options = document.querySelectorAll(".option");

    selected.addEventListener("click", () => {
        $(".optionBox").toggleClass("active");
    });

    options.forEach(option => {
        option.addEventListener("click", () => {
            $(".selected").text(option.querySelector("label").innerHTML);
            $(".optionBox").removeClass("active");
        });
    });
});