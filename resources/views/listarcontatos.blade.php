<!DOCTYPE html>
<html lang="en">
<head>
    @extends('layout.css')
    @include('layout.navbar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Contatos</title>
</head>
<body class="bg-light">
    <div class="card-border" >
        <div class="card-body" >
                <h5>Lista De Contatos</h5>
                <table class="col table-bordered table-hover" id="tabeladecontatos">
                    <thead>
                        <tr>
                            <th>Nome de Empresa</th>
                            <th>Nome do Contato</th>
                            <th>E-mail</th>
                            <th>Numero</th>
                            <th>Data de Validade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contatos as $c)
                        <tr>
                            <td>{{ $c->nomeDaEmpresa }}</td>
                            <td>{{ $c->nomeDoContato  }}</td>
                            <td>{{ $c->email  }}</td>
                            <td>{{ $c->numero  }}</td>
                            <td>{{ $c->dataValidade  }}</td>                          
                            <td>
                                <a class="btn btn-sm btn-primary" href="listarcontatos/editarcontatos/{{$c->id}}">Editar</a>
                                <a class="btn btn-sm btn-danger" href="listarcontatos/apagar/{{$c->id}}">Apagar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</body>
</html>