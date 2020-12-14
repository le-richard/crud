@extends('layout.app')

@section('content')
<div class="container-fluid w-50">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-2">
                <h3 class="card-header">Listagem de Clientes</h3>
                <div class="col-md-12 p-2">

                    @if(session('retorno'))
                        <div class="alert alert-{{session('retorno')['status']}}" role="alert">
                            {{session('retorno')['message']}}
                        </div>
                    @endif

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"width="10%">ID</th>
                                <th scope="col" width="50%">Nome</th>
                                <th scope="col" width="20%">Data de Nascimento</th>
                                <th scope="col" width="20%">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($clientes->count() == 0)
                            <td></td>
                            <td>Sem cliente cadastrado</td>
                            @else
                                @foreach($clientes as $cli)
                                    <tr>
                                        <th scope="row">{{$cli->id}}</th>
                                        <td>{{$cli->nome}}</td>
                                        <td>{{\Carbon\Carbon::parse($cli->data_nascimento)->format('d/m/Y')}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Exemplo básico">
                                                <a href="{{ route('visualizar', $cli->id)}}" class="btn btn-primary">Visualizar</a>
                                                <a href="{{ route('alterar', $cli->id)}}" class="btn btn-primary">Alterar</a>
                                                <a href="/" onclick="deletarCliente({{$cli->id}}, '{{$cli->nome}}')" class="btn btn-danger">Remover</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$clientes->links()}}
                </div>
                <div class="row">
                    <div class="col-md-2 m-2">
                        <a href="{{ route('cadastrar')}}" class="btn btn-primary btn-lg" tabindex="-1" role="button" >Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function deletarCliente($id, $nome){
        if(confirm('Deseja deletar o cliente '+ $nome +'?')){
            $.post("{{route('excluir')}}",{_token: $('meta[name="csrf-token"]').attr('content'), id: $id} );
        }
    }
</script>