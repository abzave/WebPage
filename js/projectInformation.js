var project = {
    "title": "Keylogger",
    "image": "D:/Pictures/Pic_20171107_203753_4096x2160.png",
    "projectType": "Personal",
    "date": "5 Jul. 2017",
    "language": "C++",
    "technologies": "Aplicación desktop, API de Windows",
    "paradigm": "Imperativo",
    "description": "Este es un programa que funciona de manera local el cual tiene como proposito capturar todas la teclas pulsadas y guadarlas en un archivo para su futura revisón. Este programa una vez que se ejecuta la primera vez se inicia automáticamente al iniciar Windows, función que se puede desactivar desde el administrador de tareas. Finalmente, se ejecuta en segundo plano para evitar molestias."
};

$(document).ready(function(){
    loadProject();
});

function loadProject(){
    $("h1").text(project["title"]);
    $("img").attr("src", project["image"]);
    insertData("projectType");
    insertData("date");
    insertData("language");
    insertData("technologies");
    insertData("paradigm");
    insertData("description");
}

function insertData(key){
    $("#" + key).find("b").after(project[key] + ".");
}