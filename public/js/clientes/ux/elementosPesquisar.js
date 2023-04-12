$.getJSON('/js/clientes/ux/estados_cidades.json', function (data) {

    var items = [];
    var options = '<option value="">Todos</option>';	
    
    $.each(data, function (key, val) {
        options += '<option value="' + val.nome + '">' + val.nome + '</option>';
    });					
    $("#estado").html(options);				
    
    
    $("#estado").change(function () {				
    
        var options_cidades = '<option value="">Todos</option>';
        var str = "";					
        
        $("#estado option:selected").each(function () {
            str += $(this).text();
        });
        
        $.each(data, function (key, val) {
            if(val.nome == str) {							
                $.each(val.cidades, function (key_city, val_city) {
                    options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                });							
            }
        });
    
        $("#cidade").html(options_cidades);
        
    }).change();		
    
    });
            
    
    $("#limpar").click(function(){
        $('#consulta input').val("");
        $("#sexo1").val("male");
        $("#sexo2").val("female");
        $("input[name='sexo']").prop("checked", false)
        $('select').prop('selectedIndex',0);
        pesquisarTodos(1);
    });
    
    $('.page-link').on('click', function(e){
        $('.page-item').removeClass('active');
        $('.page-link').removeClass('active');
        $(e).addClass('active');
        var href = e.target.hash
        href = href.split("#");
        page = href[1];
        if(page == "P"){
            
            page =pageGeral+1;
            
            pageGeral++;
        }
        if(page == "A"){
            
            page =pageGeral-1;
            
            pageGeral--;
        }
        pesquisarTodos(page);
    });

    $("#pesquisar").on('click', function(){
    
    filtros = "";
    dados = "";
    
    if($("#name").val() != ''){
        if(filtros != ""){
            dados = dados+ ',' + $("#name").val();
            filtros = filtros+',nome';
        }else{
            dados = $("#name").val();
            filtros = 'nome';
        }
    }
    if($("#cpf").val() != ''){
        if(filtros != ""){
            dados = dados+ ',' + $("#cpf").val();
            filtros = filtros+',cpf';
        }else{
            dados = $("#cpf").val();
            filtros = 'cpf';
        }
    }
    if($("#dataNascimento").val() != ''){
        if(filtros != ""){
            dados = dados+ ',' + $("#dataNascimento").val();
            filtros = filtros+',dataNascimento';
        }else{
            dados = $("#dataNascimento").val();
            filtros = 'dataNascimento';
        }
    }
    if($("[name='sexo']:checked").val() !=  undefined){
        if(filtros != ""){
            dados = dados+ ',' + $("[name='sexo']:checked").val();
            filtros = filtros+',sexo';
        }else{
            dados = $("[name='sexo']:checked").val();
            filtros = 'sexo';
        }
    }
    if($("#estado").val() != ''){
        if(filtros != ""){
            dados = dados+ ',' + $("#estado").val();
            filtros = filtros+',estado';
        }else{
            dados = $("#estado").val();
            filtros = 'estado';
        }
    }
    if($("#cidade").val() != ''){
        if(filtros != ""){
            dados = dados+ ',' + $("#cidade").val();
            filtros = filtros+',cidade';
        }else{
            dados = $("#cidade").val();
            filtros = 'cidade';
        }
    }
    if(dados == ""){
        pesquisarTodos(1);
    }else{
        pesquisar(filtros, dados)

    }
});

$(document).ready(function(){
    var pageGeral = 1;
    var contGeral; 
    pesquisarTodos(1);
    paginacao();
    

});