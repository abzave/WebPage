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
    var images = $(".bannerImage");
    if (imageIndex >= images.length) {
        imageIndex = 0;
    } else if (imageIndex < 0) {
        imageIndex = images.length - 1;
    }
    images.css("display", "none");
    images.eq(imageIndex).css("display", "block"); 
    return imageIndex;
}