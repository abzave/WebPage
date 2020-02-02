$(document).ready(() => {
    $(".optionBox").hide().css("opacity", "1");

    $(".selected").click(() => {
        $(".optionBox").toggleClass("active").slideToggle(400);
    });

    $(".option").click(function(){
        $(".selected").text($(this).find("label").html());
        $(".optionBox").removeClass("active").slideUp(400);
    });
});