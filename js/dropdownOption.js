class DropdownOption extends HTMLElement{

    connectedCallback(){
        const value = this.innerText
        $(this).load("/html/dropdownOption.html", function(){
            $(this).find(".radio").attr({id: value, name: this.name});
            $(this).find("label").attr("for", value).text(value);
            this.setClick();
        });
    }

    setClick() {
        const urlParameters = new URLSearchParams(window.location.search);
        $(this).click(function(){
            $(this).parent().parent().parent().find(".selected").text($(this).find("label").text());
            $(this).parent().removeClass("active").slideUp(400);
            if (!urlParameters.has("language")){
                urlParameters.remove("language");
            }
            urlParameters.append("language", $(this).find("label").text());
        });
    }

    attributeChangedCallback(attribute, oldValue, newValue){
        if(oldValue != newValue){
            this.createAttribute(attribute, newValue);
        }
    }

    set name(name){
        this.createAttribute('name', name);
    }

    get name(){
        return this.getAttribute('name');
    }

    createAttribute(attribute, value) {
        if(value){
            this.setAttribute(attribute, value);
        }else{
            this.removeAttribute(attribute);
        }
    }

}

customElements.define('dropdown-option', DropdownOption);