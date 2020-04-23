$(document).ready(() => {
    const urlParameters = new URLSearchParams(window.location.search);
    const language = urlParameters.has("language") ? urlParameters.get("language") : "ES";
    $("header").load("/html/header.html", function () {
        $("custom-dropdown").attr("default", language);
    });
    
});