$(document).ready(() => {
    if(posts != undefined){
        setupBanner();
    }else{
        setupBannerImage();
    }
});

function showPost(index) {
    if (index >= posts.length) {
        index = 0;
    } else if (index < 0) {
        index = posts.length - 1;
    }
    post = posts[index];
    $(".bannerImage").css({"display": "block", "background": "url(" + post['image'] + ")", 
                           "background-position": "center center", "background-size": "cover", 
                           "background-repeat": "no-repeat"});
    $(".imageInfo h2 a").html(post['title']);
    $(".imageInfo p").html(post['description']);
    $(".imageInfo a").attr('href', '/html/post.php?post=' + encodeURIComponent(post['title']));
    return index;
}

function setupBanner(){
    var currentIndex = 0;
    showPost(currentIndex);
    $("#leftSlide").click(() => {
        currentIndex = showPost(currentIndex - 1);
    });
    $("#rightSlide").click(() => {
        currentIndex = showPost(currentIndex + 1);
    });
}

function setupBannerImage(){
    $(".bannerImage").css({"display": "block", "background": "url(" + post['image'] + ")", 
                           "background-position": "center center", "background-size": "cover", 
                           "background-repeat": "no-repeat"});
}