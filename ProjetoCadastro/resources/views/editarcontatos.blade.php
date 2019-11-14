<!doctype html>
<html lang="en">
  <head>
    @extends('layout.css')
     @include('layout.navbar')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Ficha de Edição</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <style>
            .bd-placeholder-img {
              font-size: 1.125rem;
              text-anchor: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              -ms-user-select: none;
              user-select: none;
            }

            @media (min-width: 768px) {
              .bd-placeholder-img-lg {
                font-size: 3.5rem;
              }
            }
      </style>
    <!-- Custom styles for this template -->
</head>
<body class="bg-light">
  <div class="row">
    <div class="container col-md-10 offset-md" >   
      <div class="card border">
        <div class="card-header" >
          <div class="card-title" >
            <h4 class="mb-3">Cadastro do Contato</h4>
          </div>
        </div>
        <div class="card-body" >
        <form action="/listarcontatos/{{$cont->id}}"  method="POST"> 
            @csrf
            <div class="form-group" >
              <label for="nomeVendedor">Nome do Vendedor</label>
            <input type="text" class="form-control" id="nomeVendedor" name="nomeVendedor" placeholder="Escreva o nome do vendedor" value="{{$cont->nomeVendedor}}">
            </div>
            <div class="form-group" >
              <label for="nomeDAEmpresa">Nome da Empresa</label>
            <input type="text" class="form-control" id="nomeDaEmpresa" name="nomeDaEmpresa" placeholder="Escreva o nome da empresa" value="{{$cont->nomeDaEmpresa}}">
            </div>
            <div class="form-group" >
              <label for="nomeDoContato">Nome do Contato</label>
            <input type="text" class="form-control" id="nomeDoContato" name="nomeDoContato" placeholder="Escreva o nome do contato" value="{{$cont->nomeDoContato}}">
            </div>
            <div class="form-group" >
              <label for="numero">Numero de Telefone</label>
            <input type="tel" class="form-control" id="numero" name="numero" placeholder="47995024545" value="{{$cont->numero}}" >
            </div>
            <div class="form-group" >
              <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="user@gmail.com" value="{{$cont->email}}" >
            </div>
            <div class="form-group" >
              <label for="dataContato">Data de contato
                <input class="form-control" id="dataContato" type="date" name="dataContato" value="{{$cont->dataContato}}"  >
              </label>
              <label for="dataValidade">Data de validade
                <input class="form-control" id="dataValidade" type="date" name="dataValidade" value="{{$cont->dataValidade}}" >
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block" >Salvar Edição</button>            
        </form>
      </div>
      @if($errors->any())
      <div class="card-footer" >
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            {{ $error }}
          </div>  
        @endforeach
      </div>
      @endif
    </div>
  </div>
</body>
</html>