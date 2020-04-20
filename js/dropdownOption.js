class DropdownOption extends HTMLElement{

    connectedCallback(){
        const value = this.innerText
        $(this).load("/html/dropdownOption.html", function(){
            $(this).find(".radio").attr({id: value, name: this.name});
            $(this).find("label").attr("for", value).text(value);
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