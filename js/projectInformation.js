$(document).ready(function(){
    $("#back").click(() => window.history.back());
    loadProject();
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
}

function insertData(key){
    $("#" + key).find("b").after(project[key] + ".");
}

function insertList(key, list){
    console.log(list);
    $.each(list, function(index, value){
       $.each(value, function(listKey, language){
            $(key).find("b").after(language + (index == list.length - 1 ? (list.length == 1 ? "." : ", ") : "."));
       });
    });
}

function insertCategory(){
    $("#category").find("b").after(parseCategory(project["category"]) + ".");
}

function parseCategory(category){
    return category.slice(1).charAt(0).toUpperCase() + category.slice(2);
}