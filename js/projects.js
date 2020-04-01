$(document).ready(() => {
    var projects = $(".projects .projectsShowcase .project");
    projects.hover(function(){
        $(this).css("opacity", "0.5");
    }, function(){
        $(this).css("opacity", "1");
    });
    projects.click(function() {
        var link = $(this).find(".link").attr("href");
        if(!link){
            link = $(this).find("project-card").attr("href");
        }
        window.location.href = link;
    });
});