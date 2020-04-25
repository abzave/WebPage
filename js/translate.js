$(document).ready(function(){
    const urlParameters = new URLSearchParams(window.location.search);
    const language = urlParameters.has("language") ? urlParameters.get("language") : "ES";
    $.getJSON('/translation/translation.json', function(json){
        translateText(json, language);
        $(".translatePlaceholder").each(function(){
            $(this).attr("placeholder", json[$(this).attr("id")][language]);
        });
        $(".translateValue").each(function(){
            $(this).attr("value", json[$(this).attr("id")][language]);
        });
        $(".translateDefault").each(function(){
            $(this).find(".selected").text(json[$(this).attr("id")][language]);
        });
    });
});

function translateText(json, language){
    $(".translate").each(function(){
        $(this).html(json[$(this).attr("id")][language]);
    });
}