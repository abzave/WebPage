function getPostHtml(value){
    return "<div class='post'>\n" + 
            "\t<img src='" + value["image"] + "'>\n" + 
            "\t<div class='information'>\n" + 
                "\t\t<div class='publication leftSpacing'>\n" + 
                    "\t\t\t<p>" + value["date"] + "</p>\n" + 
                    "\t\t\t<p>" + value["author"] + "</p>\n" + 
                "\t\t</div>\n" + 
                "\t\t<h2 class='contentTitle leftSpacing'>" + value["title"] + "</h2>\n" + 
                "\t\t<p class='leftSpacing'>" + value["description"] + "</p>\n" + 
                "\t\t<a href='/html/post.php?post=" + encodeURIComponent(value["title"]) + "' class='link leftSpacing'>Más</a>\n" + 
            "\t</div>\n" + 
        "</div>\n";
}

function createPosts(){
    var postsHtml = "";
    $.each(entries, function(index, value){
        postsHtml += getPostHtml(value);
    });
    $(".searchBoxes").after(postsHtml);
}

function loadlist(list, id){
    $.each(list, function(index, value){
        $(id).append("<option value='" + value["name"] + "'>" + value["name"] + "</option>");
    });
}

function createPages(){
    const pages = Math.ceil(totalPosts[0]["amount"] / limit);
    const lastButton = $(".pageContainer");
    lastButton.append(createPageButton(Math.max(currentPage - 1, 0), "&#706;"));
    for(var page = 0; page < pages; page++){
        lastButton.append(createPageButton(page, page + 1));
    }
    lastButton.append(createPageButton(Math.min(currentPage + 1, pages - 1), "&#707;"));
    lastButton.append(createPageButton(pages - 1, "&#707;&#707;"));
}

function createPageButton(index, content){
    return "<button class='pages' onclick='goToPage(\"blog.php?page=" + index + "\")'>" + content + "</button>";
}

$(document).ready(function(){
    createPosts();
    loadlist(categories, "#categories");
    loadlist(tags, "#tags");
    createPages();
    $(".post").click(function(){
        window.location.href = $(this).find(".link").attr("href");
    });
});