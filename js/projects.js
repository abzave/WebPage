const ROW_LENGHT = 4;

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
        console.log(value);
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
            info["title"] + "' href='/html/projectInformation.html?project=" + 
            encodeURIComponent(info["title"]) + "'>" + info["description"] + "</project-card>\n" + 
            "</div>";
}

function selectRandomProjects(){
    insertProject(projects);
    if(getRandomBoolean()){
        insertProject(projects);
    }else{
        insertProject(projects);
    }
    insertProject(projects);
}

function insertProject(candidates){
    $("#selectedProjects").prepend(createProjectCard(candidates[getRandomNumber(candidates.length)]));
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