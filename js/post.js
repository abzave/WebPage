$(document).ready(function(){
    insertContent();
});

function insertContent(){
    post = post[0];
    $("h1").text(post["title"]);
    $("#author").text(post["author"]);
    $("#date").text(post["date"]);
    $(".content").html(post["content"]);
    $(".bannerImage").css(getBannerStyle(post["image"]));
    insertList(categories);
    insertList(tags);
}

function getBannerStyle(image){
    return {"display": "block", "background": "url(" + image + ")", 
    "background-position": "center center", "background-size": "cover", 
    "background-repeat": "no-repeat"};
}

function insertList(list){
    const key = Object.keys(list[0])[0];
    const location = $("#" + key);
    $.each(list, function(index, value){
        location.append("<a href='/blog.php'>" + value[key] + "</a> ")
    });
}