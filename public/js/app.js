var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
var regiao = getUrlParameter('regiao');
var estado = getUrlParameter('estado');
var busca =  getUrlParameter('busca');
if(regiao!=''){

}

$.ajax({
    url: 'http://localhost/desafio_mobile_saude/ibge/public/api/regiao',
    dataType: 'json',
    type: 'GET',
    success: function (data){
        $('select#regiao').empty();
        data.data.map(data => {
        if(data.nome !='temp')
            $('select#regiao').append('<option value="'+data.id+'" rel="'+data.nome+'"  >'+ data.nome +'</option>')
            $("select#regiao option[value="+regiao+"]").attr("selected", "selected");
        });
    }
});
/*
1- ESSA REQUISIÇÃO SÓ É EXECUTADA APÓS EVENTO ONCHANGE
2- A URL FILTRA DE ACORDO COM A REGIÃO SELECIONADA
*/
$('#regiao').on('change', function() {
    var urlv1 = 'http://localhost/desafio_mobile_saude/ibge/public/api/estado?id_regiao='+this.value;
    $.ajax({
        url: urlv1,
        dataType: 'json',
        type: 'GET',
        success: function (data){
            $('select#estado').empty();
            data.data.map(data => {
                $("select#estado option[value="+estado+"]").attr("selected", "selected");
                $('select#estado').append('<option value="'+data.uf+'" rel="'+data.id+'"  >'+ data.nome +'</option>');
            });
        }
    });
  });

