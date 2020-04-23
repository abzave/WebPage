const ROW_LENGHT = 4;
const PROJECTS_TO_SELECT = 3;

function applyProjectsStyle(){
    const projects = $(".projects .projectsShowcase .project");
    projects.hover(function(){
        $(this).css("opacity", "0.5");
    }, function(){
        $(this).css("opacity", "1");
    });
    projects.click(function() {
        var link = $(this).find(".link").attr("href");
        if(!link){
            link = $(this).find("project-card").attr("href");
        }
        window.location.href = link;
    });
}

function insertProjects(){
    var currentCategory;
    var showcase;
    var categories = {};
    $.each(projects, function(index, value){
        if (value['category'] != currentCategory){
            currentCategory = value['category'];
            showcase = createShowcase($(currentCategory).parent().parent());
            if(categories[currentCategory] == undefined){
                categories[currentCategory] = 0;
            }
        }
        if(!(categories[currentCategory] % ROW_LENGHT)){
            showcase = createShowcase(showcase);
        }
        categories[currentCategory]++;
        showcase.append(createProjectCard(value));
    });
    verifyAligment(categories);
}

function verifyAligment(categories){
    $.each(categories, function(key, value){
        var remaining = value % ROW_LENGHT;
        if(remaining){
            const cardsNedeed = ROW_LENGHT - remaining;
            for(var card = 0; card < cardsNedeed; card++){
                $(key).parent().parent().siblings(".row").first().prev().append(createEmptyCard());
            }
        }
    });
}

function createEmptyCard(){
    return "<td class='emptyCard'></td>";
}

function createShowcase(base){
    return base.after("<tr class='projectsShowcase'></tr>").next();
}

function createProjectCard(info){
    return "<div class='project'>\n\t<project-card image='" + info["image"] + "' title='" + 
            info["title"] + "' href='/html/projectInformation.php?project=" + 
            encodeURIComponent(info["title"]) + "'>" + info["description"] + "</project-card>\n" + 
            "</div>";
}

function selectRandomProjects(){
    for(var project = 0; project < PROJECTS_TO_SELECT; project++){
        projects = insertProject(projects);
    }
}

function insertProject(candidates){
    const selected = getRandomNumber(candidates.length);
    $("#selectedProjects").prepend(createProjectCard(candidates[selected]));
    candidates.splice(selected, 1)
    return candidates;
}

function getRandomNumber(max){
    return Math.floor(Math.random() * max);
}

function getRandomBoolean(){
    return Math.round(Math.random());
}

$(document).ready(() => {
    insertProjects();
    if(window.location.pathname == "/index.php" || window.location.pathname == "/"){
        selectRandomProjects();
    }
    applyProjectsStyle();
});