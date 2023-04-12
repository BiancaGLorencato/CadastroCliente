$.getJSON('/js/clientes/ux/estados_cidades.json', function (data) {

    var items = [];
    var options = '<option value="">Escolha um estado</option>';	

    $.each(data, function (key, val) {
        options += '<option value="' + val.nome + '">' + val.nome + '</option>';
    });					
    $("#estado").html(options);				

    
    $("#estado").change(function () {				
    
        var options_cidades = '<option value="">Escolha</option>';
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


$("#alerta_sucesso").hide();
$("#alerta_danger").hide();

$("#limpar").click(function(){
    $('#clientes input').val("");
    $('select').prop('selectedIndex',0);
});

function aparecerAlerta(status, mensagem){

    if(status == 201){
        $("#alerta_sucesso").text('');
        $("#alerta_sucesso").text(mensagem);
        $("#alerta_sucesso").show();
        
        window.setTimeout(function () { 
             $("#alerta_sucesso").alert('close'); 
        }, 4000); 
    }
    if(status == 200){
        $("#alerta_danger").text('');
        $("#alerta_danger").text(mensagem);
        $("#alerta_danger").show();

        window.setTimeout(function () { 
             $("#alerta_danger").hide(); 
        }, 4000); 
    }

    if(status == 500){
        $("#alerta_danger").text('');
        $("#alerta_danger").text(mensagem);
        $("#alerta_danger").show();

        window.setTimeout(function () { 
             $("#alerta_danger").hide(); 
        }, 4000); 
    }
   
}