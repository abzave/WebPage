$(document).ready(function(){
    const urlParameters = new URLSearchParams(window.location.search);
    const language = urlParameters.has("language") ? urlParameters.get("language") : "ES";
    $.getJSON('/translation/translation.json', function(json){
        $(".translate").each(function(){
            $(this).html(json[$(this).attr("id")][language]);
        });
        $(".translatePlaceholder").each(function(){
            $(this).attr("placeholder", json[$(this).attr("id")][language]);
        });
        $(".translateValue").each(function(){
            $(this).attr("value", json[$(this).attr("id")][language]);
        });
    });
});