function criticaNome(nome){
    nome.value = nome.value.replace(/[,.\s]{2,}|[^\w\s]/g, '');
}
function criticaUsername(username){
    username.value = username.value.toLowerCase().replace(/[,.\s]{1,}|[^\w\s]/g, '');
}
function criticaSenha(senha){
    var regex = /^[a-zA-Z0-9]*$/;
    if (!regex.test(senha.value)) {
        alert("A senha não pode conter espaços ou caracteres especiais. Apenas letras e números são permitidos.");
        senha.value = "";
    }
}
function criticaTelefone(telefone){
    let x = telefone.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
    telefone.value = (!x[2]) ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
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

function criticaValor(valor) {
    return valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}