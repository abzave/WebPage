class ProjectCard extends HTMLElement{

    connectedCallback(){
        this.attachShadow({mode: 'open'}).innerHTML = 
                        "<style>\n" +
                            "\timg{\n" + 
                                "\t\theight: 300px;\n" + 
                                "\t\twidth: 570px;\n" + 
                            "\t}\n" + 
                            "\th3{\n" + 
                                "\t\tmargin-left: 1em;\n" + 
                                "\t\tcolor: #F9F871;\n" + 
                                "\t\ttext-shadow: 2px 2px 1px #000000;\n" + 
                            "\t}\n" + 
                            "\tp{\n" + 
                                "\t\tmargin-left: 1em;\n" + 
                                "\t\tcolor: #AFEF8B;\n" + 
                                "\t\ttext-shadow: 2px 2px 1px #000000;\n" + 
                            "\t}\n" + 
                            "\ta{\n" + 
                                "\t\tmargin-left: 45%;\n" + 
                                "\t\tcolor: #F9F871;\n" + 
                                "\t\ttext-shadow: -1px 1px 0 #000, 1px 1px 0 #000,\n" + 
                                            "\t\t\t\t1px -1px 0 #000, -1px -1px 0 #000;\n" + 
                            "\t}\n" + 
                        "</style>\n" +  
                        "<img src='" + this.image + "'>\n" + 
                        "<h3>" + this.title + "</h3>\n" + 
                        "<p><slot></slot></p>\n" + 
                        "<a href='" + this.href + "'>Más</a>\n";
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