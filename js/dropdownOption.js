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
        $(this).click(function(){
            $(this).parent().parent().parent().find(".selected").text($(this).find("label").text());
            $(this).parent().removeClass("active").slideUp(400);
            this.addParamToURL();
        });
    }

    addParamToURL(){
        const url = new URL(window.location.href);
        const urlParameters = new URLSearchParams(url.search);
        if (urlParameters.has(this.name)){
            urlParameters.delete(this.name);
        }
        urlParameters.append(this.name, $(this).find("label").text());
        window.location.href = url.pathname + "?" + urlParameters.toString();
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