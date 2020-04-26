function goToPage(url){
    const urlParameters = new URLSearchParams(window.location.search);
    url = addLanguage(url, urlParameters);
    window.location.href = url;
}

function addLanguage(url, urlParameters){
    if (urlParameters.has("language")){
        const urlObject = new URL(window.location.origin + url);
        const newParams = new URLSearchParams(url.search);
        newParams.append("language", urlParameters.get("language"));
        url = urlObject.pathname + "?" + newParams.toString();
   }
   return url;
}