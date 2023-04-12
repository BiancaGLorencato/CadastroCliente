async function postData(url) {
    try{
        const response = await fetch(url, {
            method: "GET", 
            mode: "cors",
            credentials: "same-origin", 
            headers: {
                "Content-Type": "application/json",
            },
            redirect: "follow", 
            referrerPolicy: "no-referrer", 
        });
        return response.json();
    }catch (err){
        return response.json();
    }
     
}

async function pesquisarAPI(url, data) {
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

async function count(url) {
    try{
        const response = await fetch(url, {
            method: "GET", 
            mode: "cors",
            credentials: "same-origin", 
            headers: {
                "Content-Type": "application/json",
            },
            redirect: "follow", 
            referrerPolicy: "no-referrer", 
        });
        return response.json();
    }catch (err){
        return response.json();
    }
}

function paginacao(){
    count(url+"/api/getCountCliente").then((data) => {
        paginacao = Math.ceil(data/15);
        contGeral = paginacao;
        for(i = 6; i <= paginacao ; i++){
            var texto = "<li class='page-item'><a class='page-link' href='#"+i+"'>"+i+"</a></li>";

            $(".pagination").append(texto);
        }
        $(".pagination").append('<li class="page-item"><a class="page-link" href="#P">Próximo</a></li>');
        
    });
    

}

function pesquisarTodos(page){
    $("#tbodyCliente").empty();
    postData(url+'/api/getCliente/'+page).then((data) => {
           createTableBody(data);
        }).catch(error => {
            console.log(error);
    
        });
}


function pesquisar(filtros, dados){
    data ={
        "filtros": filtros,
        "dados":  dados,
    };
    pesquisarAPI(url+'/api/getClienteFiltro', data).then((data) => {
        $("#tbodyCliente").empty();
       createTableBody(data);
    }).catch(error => {
        console.log(error);
    });;
}



function createTableBody(data){
    var row = $("#clientesTable");

    
    data.forEach(function(elemento){
        if(elemento.sexo == "female"){
            sexo = "F";
        }else{
            sexo = "M";
        }
       var texto ='<tr>'+
                '<td><button class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" style="font-size:24px"></i></button></td>'+
                '<td><button class="btn btn-outline-primary"><i class="fa fa-trash-o" style="font-size:24px"></i></button></td>'+
                '<td>'+elemento.cpf+'</td>'+
                '<td>'+elemento.nome+'</td>'+
                '<td>'+elemento.dataNascimento+'</td>'+
                '<td>'+elemento.estado+'</td>'+
                '<td>'+elemento.cidade+'</td>'+
                '<td>'+sexo+'</td>'+
            '</tr>';
       row.append(texto);

    });
}