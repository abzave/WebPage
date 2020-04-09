var post = {
    "title": "Post #1",
    "author": "Abraham Meza",
    "date": "03 Mar. 2021",
    "content": "<p>Description of post 1</p>\n<p>Content of post number 1</p>",
    "categories": ["Test"],
    "tags": ["Tag1", "Tag2"]
};

$(document).ready(function(){
    insertContent();
});

function insertContent(){
    $("h1").text(post["title"]);
    $("#author").text(post["author"]);
    $("#date").text(post["date"]);
    $(".content").html(post["content"]);
    insertList("categories");
    insertList("tags");
}

function insertList(name){
    const categories = $("#" + name);
    $.each(post[name], function(index, value){
        categories.append("<a href='blog.html'>" + value + "</a> ")
    });
}