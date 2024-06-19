function criticaNome(nome){
	if(nome.length < 3){
        return false;
    }else{
        return true;
    }
}
function trocarCor(currentUrl) {
    var links = document.querySelectorAll("a");
    for(var i = 0; i < links.length; i++) {
        if(links[i].href == currentUrl) {
            links[i].style.backgroundColor = "#e3e1e1";
            links[i].style.borderRadius = "20px";
        }
    }
}