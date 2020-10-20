$.ajax({
    url: 'http://localhost/desafio_mobile_saude/ibge/public/api/regiao',
    dataType: 'json',
    type: 'GET',
    success: function (data){
        data.data.map(data => {
            $('select#regiao').append('<option value="'+data.id+'" rel="'+data.nome+'"  >'+ data.nome +'</option>')
        });
    }
});
/*
* ESSA REQUISIÇÃO SÓ É EXECUTADA APÓS EVENTO ONCHANGE
* A URL FILTRA DE ACORDO COM A REGIÃO SELECIONADA
*/
$('#regiao').on('change', function() {
    var urlv1 = 'http://localhost/desafio_mobile_saude/ibge/public/api/estado?id_regiao='+this.value;
    $.ajax({
        url: urlv1,
        dataType: 'json',
        type: 'GET',
        success: function (data){
            $('select#estado').empty();
            $('select#estado').append('<option value="" rel="">Selecione</option>');

            data.data.map(data => {
                $('select#estado').append('<option value="'+data.uf+'" rel="'+data.id+'"  >'+ data.nome +'</option>');
            });
        }
    });
  });

