async function postData(url, data) {
    try{
        const response = await fetch(url, {
            method: "POST", 
            mode: "cors",
            credentials: "same-origin", 
            headers: {
                "Content-Type": "application/json",
            },
            redirect: "follow", 
            referrerPolicy: "no-referrer", 
            body: JSON.stringify(data), 
        });
        return response.json();
    }catch (err){
        return response.json();
    }
     
}

$("#salvar").click(function()
{
    erro = validaCampo();
    if(erro != true){
        urlSalvar = url + '/api/createClient';
        data ={
            "nome": $("#name").val(),
            "cpf":  $("#cpf").val(),
            "dataNascimento" : $("#dataNascimento").val(),
            "endereco": $("#endereco").val(),
            "cidade": $("#cidade").val(),
            "estado": $("#estado").val(),
            "sexo": $("input[name='sexo']:checked").val()
        }
        postData(urlSalvar,data).then((data) => {
            aparecerAlerta(data[1], data[0]);
        }).catch(error => {
            aparecerAlerta(500, 'Erro! Por favor tente mais tarde');
    
        });
    }
   
});

function validaCampo(){
    if($("#cpf").val() == '' || $("#name").val() == '' || $("#dataNascimento").val() == '' ||
        $("#endereco").val() == ''|| $("#cidade").val() == '' ||
        $("#estado").val() == '' || $("[name='sexo']:checked").val() ==  undefined){
        
            aparecerAlerta(500, 'Erro! Por favor preencher todos os campos');
            return true;
    }
    return false;
}