
function getPostHtml(value){
    return "<div class='post'>\n" + 
            "\t<img src='" + value["image"] + "'>\n" + 
            "\t<div class='information'>\n" + 
                "\t\t<div class='publication leftSpacing'>\n" + 
                    "\t\t\t<p>" + value["date"] + "</p>\n" + 
                    "\t\t\t<p>" + value["author"] + "</p>\n" + 
                "\t\t</div>\n" + 
                "\t\t<h2 class='contentTitle leftSpacing'>" + value["title"] + "</h2>\n" + 
                "\t\t<p class='leftSpacing'>" + value["description"] + "</p>\n" + 
                "\t\t<a href='" + value["link"] + "' class='link leftSpacing'>Más</a>\n" + 
            "\t</div>\n" + 
        "</div>\n";
}

function createPosts(){
    var postsHtml = "";
    $.each(entries, function(index, value){
        console.log(value);
        postsHtml += getPostHtml(value);
    });
    $(".searchBox").after(postsHtml);
}

$(document).ready(function(){
    createPosts();
    $(".post").click(function(){
        window.location.href = $(this).find(".link").attr("href");
    });
});