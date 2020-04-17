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
    $.each(projects, function(index, value){
        var projectCount = 0;
        var showcase = createShowcase($(value["category"]).parent().parent());
        if(projectCount == ROW_LENGHT){
            projectCount = 0;
            showcase = createShowcase(showcase);
        }
        showcase.append(createProjectCard(value));
        projectCount++;
        verifyAligment(projectCount, showcase);
    });
}

function verifyAligment(projectCount, showcase){
    const remaining = projectCount % ROW_LENGHT;
    if(remaining != 0){
        const cardsNedeed = ROW_LENGHT - remaining;
        for(var card = 0; card < cardsNedeed; card++){
            showcase.append(createEmptyCard());
        }
    }
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
    return candidates.slice(selected, 1);
}

function getRandomNumber(max){
    return Math.floor(Math.random() * max);
}

function getRandomBoolean(){
    return Math.round(Math.random());
}

$(document).ready(() => {
    insertProjects();
    selectRandomProjects();
    applyProjectsStyle();
});