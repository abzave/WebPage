$(document).ready(() => {
    var projects = $(".projects .projectsShowcase .project");
    projects.hover(function(){
        $(this).css("opacity", "0.5");
    }, function(){
        $(this).css("opacity", "1");
    });
    projects.click(function() {
        window.location.href = $(this).find(".link").attr("href");
    });
});