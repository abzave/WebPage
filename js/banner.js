var imagesUrls = ["D:/Pictures/Pic_20171107_203753_4096x2160.png", "D:/Pictures/Pic_20170706_203225_4096x2160.png", "D:/Pictures/148221.jpg"];

$(document).ready(() => {
    var currentIndex = 0;
    showImage(currentIndex);
    $("#leftSlide").click(() => {
        currentIndex = showImage(currentIndex - 1);
    });
    $("#rightSlide").click(() => {
        currentIndex = showImage(currentIndex + 1);
    });
});

function showImage(imageIndex) {
    if (imageIndex >= imagesUrls.length) {
        imageIndex = 0;
    } else if (imageIndex < 0) {
        imageIndex = imagesUrls.length - 1;
    }
    $(".bannerImage").css({"display": "block", "background": "url(" + imagesUrls[imageIndex] + ")", 
                           "background-position": "center center", "background-size": "cover", 
                           "background-repeat": "no-repeat"});
    return imageIndex;
}