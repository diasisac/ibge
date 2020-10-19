<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IBGE</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= asset('css/app.css'); ?>">
</head>

<body>
  <div class="row r1">
    <div id="d1-r1">
      <div class="col-lg-12" id="d2-r1">
        <ul>
          <li class="col-lg-3" id="l1-d2">
            <span id="s1-d2">mobile</span><span id="s2-d2"><em>saúde</em></span>
          </li>
          <li class="col-lg-3  col-xs-1" id="l2-d2"><span>https://sidra.ibge.gov.br/territorio</span></li>
          <li id="l3-d2">Busca Município IBGE/SIDRA</li>
        </ul>
      </div>
    </div>
  </div>
  <div id="conteudo">
    <div class="container">
      <form action="<?= url('/consultar')?>" method="GET" autocomplete="on">
        <div class="form-group row">
          <label for="regiao" class="col-sm-1 col-form-label"><strong>Região</strong></label>
          <div class="col-sm-11">
            <select name="regiao" id="regiao" class="form-control">
              <option value="" rel="">Selecione</option>
            </select>
          </div>
        </div>
    </div>

    <hr>

    <div class="container">
      <div class="form-group row">
        <label for="estado" class="col-sm-1 col-form-label"><strong>Estado</strong></label>
        <div class="col-sm-11">
          <select name="estado" id="estado" class="form-control">
          </select>
        </div>
      </div>
    </div>

    <hr>

    <div class="container">
      <div class="form-group row">
        <label for="municipio" class="col-sm-1 col-form-label"><strong>Busca</strong></label>
        <div class="col-sm-11">
          <input type="text" class="form-control" value="" name="busca" />
        </div>
      </div>
    </div>

    <div class="container">
      <div class="py-2">
        <div class="col-lg-11 padding-0">
          <button type="submit" class="btn btn-success">Buscar</button>
        </div>
      </div>
    </div>
    </form>

    @if(empty($municipios))
    <?php $municipio = null; ?>
    @else

    <div class="container">
      <div class="py-2">
        <div class="col-lg-11 padding-0">
          <h2>
            {{$text = $municipios->total() > 1 ? $municipios->total().' municípios encontrados' : $municipios->total(). ' município encontrado' }}
          </h2>
        </div>
      </div>
      <div class="py-2">
        <div class="col-lg-11 padding-0">
          <table class="table col-lg-12 table">
            <tbody>
              @foreach ($municipios as $mun)
              <tr>
                <td> <a href="https://sidra.ibge.gov.br/territorio#/N6/{{$mun['codigo']}}"
                    target="_blank"><?= $mun['nome']. ' - Código: '. $mun['codigo'] ?></a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {{ $municipios->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>


  </div>
  @endif
  <footer>
    <small>&copy; 2020 - Mobile Saúde</small>
  </footer>
  <script src="<?= asset('js/app.js'); ?>"></script>
</body>

</html>
