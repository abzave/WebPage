class Dropdown extends HTMLElement{

    connectedCallback(){
        const options = $(this).html();
        $(this).load("/html/dropdown.html", function(){
            this.setDelegate();
            $(this).find(".selected").text(this.default);
            $(this).find(".optionBox").append(options);
        });
    }
    
    setDelegate(){
        $(this).find(".optionBox").hide().css("opacity", "1");
        $(this).find(".selected").click(() => {
            $(this).find(".optionBox").toggleClass("active").slideToggle(400);
        });
    }

    attributeChangedCallback(attribute, oldValue, newValue){
        if(oldValue != newValue){
            this.createAttribute(attribute, newValue);
        }
    }

    set default(text){
        this.createAttribute('default', text);
    }

    get default(){
        return this.getAttribute('default');
    }

    createAttribute(attribute, value) {
        if(value){
            this.setAttribute(attribute, value);
        }else{
            this.removeAttribute(attribute);
        }
    }

}

customElements.define('custom-dropdown', Dropdown);