class ProjectCard extends HTMLElement{

    connectedCallback(){
        this.innerHTML = "<img src='" + this.image + "'>\n" + 
                         "<h3 class='contentTitle'>" + this.title + "</h3>\n" + 
                         "<p>" + this.description +"</p>\n" + 
                         "<a href='" + this.href + "' class='link'>Más</a>\n";
    }

    set image(source){
        this.createAttribute('image', source);
    }

    set title(value){
        this.createAttribute('title', value);
    }

    set description(value){
        this.createAttribute('description', value);
    }

    set href(link){
        this.createAttribute('href', link);
    }

    get image(){
        return this.getAttribute('image');
    }

    get title(){
        return this.getAttribute('title');
    }

    get description(){
        return this.getAttribute('description');
    }

    get href(){
        return this.getAttribute('href');
    }

    createAttribute(attribute, value) {
        if(value){
            this.setAttribute(attribute, value);
        }else{
            this.removeAttribute(attribute);
        }
    };

}

customElements.define('project-card', ProjectCard);