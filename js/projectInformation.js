$(document).ready(function(){
    $("#back").click(() => window.history.back());
    loadProject();
    $("#url").click(function(){
        window.location.href = project['url'];
    });
});

function loadProject(){
    project = project[0];
    $("title").text("Proyecto - " + title);
    $("h1").text(title);
    $("img").attr("src", project["image"]);
    insertCategory();
    insertData("date");
    insertList("#language", languages);
    insertList("#technologies", technologies);
    insertList("#paradigm", paradigms);
    insertData("long_description");
    insertData("url");
}

function insertData(key){
    $("#" + key).find("b").after(project[key]);
}

function insertList(key, list){
    var listText = "";
    $.each(list, function(index, value){
       $.each(value, function(listKey, listValue){
            listText += listValue + (index == list.length - 1 ? "." : ", ");
       });
    });
    $(key).find("b").after(listText);
}

function insertCategory(){
    $("#category").find("b").after(parseCategory(project["category"]));
}

function parseCategory(category){
    return category.slice(1).charAt(0).toUpperCase() + category.slice(2);
}