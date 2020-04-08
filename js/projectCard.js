class ProjectCard extends HTMLElement{

    connectedCallback(){
        $(this).load("projectCard.html");
        $(this).find("#image").attr("src", this.image);
        $(this).find("#title").text(this.title);
        $(this).find("#description").text(this.innerText);
        $(this).find("#link").attr("href", this.href);
    }

    attributeChangedCallback(attribute, oldValue, newValue){
        if(oldValue != newValue){
            this.createAttribute(attribute, newValue);
        }
    }

    set image(source){
        this.createAttribute('image', source);
    }

    set title(value){
        this.createAttribute('title', value);
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