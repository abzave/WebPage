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
    $.each(projects, function(key, value){
        var projectCount = 0;
        var showcase = createShowcase($(key).parent().parent());
        $.each(value, function(index, value){
            if(projectCount == ROW_LENGHT){
                projectCount = 0;
                showcase = createShowcase(showcase);
            }
            showcase.append(createProjectCard(value));
            projectCount++;
        });
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
            info["title"] + "' href='" + info["url"] + "'>" + info["description"] + 
            "</project-card>\n</div>";
}

function selectRandomProjects(){
    insertProject(projects["#personal"]);
    if(getRandomBoolean()){
        insertProject(projects["#colaborative"]);
    }else{
        insertProject(projects["#work"]);
    }
    insertProject(projects["#university"]);
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