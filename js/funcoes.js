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

function salvarSelecao(valor, selecionado) {
    registrosSelecionados = document.getElementById("registrosSelecionados");
    if (selecionado == true) {
        console.log(valor);
        registrosSelecionados.value += valor +",";
    }else{
        if (registrosSelecionados.value.includes(valor)){
            registrosSelecionados.value = registrosSelecionados.value.replace(valor+",","");
        }
    }    
}

function submitLimitador(elemento){
    elemento.form.submit();
}

function alertaSucesso(mensagem, redirecionamento){
    alert(mensagem);
    if(redirecionamento){
        window.location.href = redirecionamento;
    }
}

function alertaErro(mensagem, voltarPagina){
    alert(mensagem);
    if(voltarPagina == true){
        window.history.back();
    }
}

function confirma(mensagem){
    return confirm(mensagem);
}

function ajustarData(data){
    if (data != '0000-00-00'){
        return data.split("-").reverse().join("/");
    }else{
        return "";
    }
}