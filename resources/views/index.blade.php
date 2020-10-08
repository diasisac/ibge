<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IBGE</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
</head>
<body style="margin: 15px">
<div class="row" style="display: flex;justify-content: center; margin:15px 15px 36px 15px">
<div style="background:#e8e8e8; height:200px; border-radius: 10px; width: 100%; display:flex; align-items: center;">
    <div class="col-lg-12" style="padding:0px;height:50px;">
        <ul style="list-style: none">
            <li class="col-lg-3" style="padding:0px;font-size: 27px;display: inline-flex;">
                <span style="font-family: revert;color: #ce2121;font-weight: bold;">mobile</span><span style="color:#0391bb;"><em>saúde</em></span>
            </li>
            <li class="col-lg-3  col-xs-1" style="display: inline-flex;float: right;padding: 0px;"><span>https://sidra.ibge.gov.br/territorio</span></li>
            <li style="font-family: sans-serif;">Busca Município IBGE/SIDRA</li>
        </ul>
    </div>
</div>
</div>
<div class="container" style="margin-right:0px ">

    <form action="<?= url('/consultar')?>" method="GET">
    <div class="form-group row">
      <label for="regiao" class="col-sm-1 col-form-label"><strong>Região</strong></label>
      <div class="col-sm-11">
        <select name="regiao" id="regiao" class="form-control ">
            <option value="" rel=""></option>
        </select>
      </div>
    </div>
</div>
    <hr  style="border: 1px solid; color: #e8e8e8">
    <div class="container" style="margin-right:0px ">
    <div class="form-group row">
      <label for="estado" class="col-sm-1 col-form-label"><strong>Estado</strong></label>
      <div class="col-sm-11">
        <select name="estado" id="estado" class="form-control ">
            <option value="" rel=""></option>
          </select>
      </div>
    </div>
    </div>
    <hr  style="border: 1px solid; color: #e8e8e8">
    <div class="container" style="margin-right:0px ">
    <div class="form-group row">
      <label for="municipio" class="col-sm-1 col-form-label"><strong>Busca</strong></label>
      <div class="col-sm-11">
        <input type="text" class="form-control" value="" name="busca"/>
      </div>
    </div>
    </div>
    <div class="container" style="margin-right:0px ">
<div class="py-2" style="display: flex;justify-content: flex-end;">
    <div class="col-lg-11" style="padding: 0px">
        <button type="submit" class="btn btn-success">Buscar</button>
    </div>
</div>
    </div>
  </form>
  @if(empty($municipios))
    <?php $municipio = null; ?>
  @else


  <div class="container" style="margin-right:0px ">
    <div class="py-2" style="display: flex;justify-content: flex-end;">
        <div class="col-lg-11" style="padding: 0px">
        <h2>{{$text = count($municipios) > 1 ? count($municipios).' municípios encontrados' : count($municipios). ' município encontrado' }} </h2>
        </div>
    </div>
    <div class="container py-2">
    <div class="row "style="display: flex;justify-content: flex-end;">
       <table class="table col-lg-11 table" >
  <thead>
  </thead>
  <tbody>
      @foreach ($municipios as $mun)
      <tr>
        <td> <a href="https://sidra.ibge.gov.br/territorio#/N6/{{$mun['codigo']}}" target="_blank"><?= $mun['nome']. ' - Código: '. $mun['codigo'] ?></a></td>
      </tr>
      @endforeach

  </tbody>
</table>
    </div>
</div>

  </div>
  @endif
  <footer>
    <small style="font-family: sans-serif;">&copy; 2020 - Mobile Saúde</small>
   </footer>
<style>
    .table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border: 1px solid #dee2e6;
}
</style>
  <script>


$.ajax({
    url: 'http://localhost/desafio_mobile_saude/ibge/public/api/regiao',
    dataType: 'json',
    type: 'GET',
    success: function (data){
        data.map(data => {
            $('select#regiao').append('<option value="'+data.id+'" rel="'+data.nome+'"  >'+ data.nome +'</option>')
        });
    }
});

$.ajax({
    url: 'http://localhost/desafio_mobile_saude/ibge/public/api/municipio',
    dataType: 'json',
    type: 'GET',
    success: function (data){
    $("select#regiao").change(function(){
        $('select#municipio').empty();
        var valor = $('select#estado').val();
        data.map(data => {
            if(valor == data.uf)
            $('select#municipio').append('<option value="'+data.uf+'" rel="'+data.id+'"  >'+ data.nome +'</option>')
        });
    });

        $("select#estado").change(function(){
            $('select#municipio').empty();
            var valor = $('select#estado').val();
        data.map(data => {
            if(valor == data.uf)
            $('select#municipio').append('<option value="'+data.uf+'" rel="'+data.id+'"  >'+ data.nome +'</option>')
        });
    });
    }
});
$.ajax({
    url: 'http://localhost/desafio_mobile_saude/ibge/public/api/estado',
    dataType: 'json',
    type: 'GET',
    success: function (data){
    $("select#regiao").change(function(){
        $('select#estado').empty();
        var valor = $("select#regiao").val();
        data.map(data => {
            if(valor==data.id_regiao)
            $('select#estado').append('<option value="'+data.uf+'" rel="'+data.id+'"  >'+ data.nome +'</option>')
        });
    });
    }
});

    </script>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>



</html>
