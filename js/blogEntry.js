var entries = {
                0: {
                    "image": "D:/Pictures/Pic_20171107_203753_4096x2160.png", 
                    "date": "03 Mar. 2021",
                    "author": "Abraham Meza",
                    "title": "Post #1",
                    "description": "Description of post 1",
                    "link": "blog.html"
                },
                1: {
                    "image": "D:/Pictures/Pic_20170706_203225_4096x2160.png", 
                    "date": "22 Oct. 2022",
                    "author": "Abraham Meza",
                    "title": "Post #2",
                    "description": "Description of post 2",
                    "link": "blog.html"
                },
                2: {
                    "image": "D:/Pictures/148221.jpg", 
                    "date": "07 Apr. 2020",
                    "author": "Abraham Meza",
                    "title": "Post #3",
                    "description": "Description of post 3",
                    "link": "blog.html"
                },
                3: {
                    "image": "D:/Pictures/Pic_20171107_203753_4096x2160.png", 
                    "date": "19 Feb. 2021",
                    "author": "Abraham Meza",
                    "title": "Post #4",
                    "description": "Description of post 4",
                    "link": "blog.html"
                },
              };

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