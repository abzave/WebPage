$(document).ready(() => {
    $(".projects .projectsShowcase .project").hover(function(){
        $(this).css("opacity", "0.5");
    }, function(){
        $(this).css("opacity", "1");
    });
});