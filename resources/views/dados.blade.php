@extends('layout.app')

@section('content')
<div class="container-fluid w-50">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-2">
                <h3 class="card-header">{{$titulo}}</h3>
                <div class="col-md-12 p-2">
                    <form action="{{isset($alterar) && $alterar == true ? route('alterar', ['id' => $dados->id]) : route('cadastrar.novo')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required value="{{isset($dados->nome) ? $dados->nome : ''}}" {{isset($visualizar) && $visualizar == true ? 'disabled' : ''}}>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required value="{{isset($dados->data_nascimento) ? $dados->data_nascimento : ''}}" {{isset($visualizar) && $visualizar == true ? 'disabled' : ''}}>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sexo">Sexo</label>
                                    <select class="form-control" id="sexo" name="sexo" required {{isset($visualizar) && $visualizar == true ? 'disabled' : ''}}>
                                        <option value="M" {{isset($dados->sexo) && $dados->sexo == 'M' ? 'selected' : ''}}>Masculino</option>
                                        <option value="F" {{isset($dados->sexo) && $dados->sexo == 'F' ? 'selected' : ''}}>Feminino</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" id="cep" name="cep" value="{{isset($dados->cep) ? $dados->cep : ''}}" {{isset($visualizar) && $visualizar == true ? 'disabled' : ''}}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" value="{{isset($dados->endereco) ? $dados->endereco : ''}}" {{isset($visualizar) && $visualizar == true ? 'disabled' : ''}}>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="numero">Numero</label>
                                    <input type="text" class="form-control" id="numero" name="numero" value="{{isset($dados->numero) ? $dados->numero : ''}}" {{isset($visualizar) && $visualizar == true ? 'disabled' : ''}}>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento" value="{{isset($dados->complemento) ? $dados->complemento : ''}}" {{isset($visualizar) && $visualizar == true ? 'disabled' : ''}}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" value="{{isset($dados->bairro) ? $dados->bairro : ''}}" {{isset($visualizar) && $visualizar == true ? 'disabled' : ''}}>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sexo">Estado</label>
                                    <select class="form-control" id="estado" name="estado" required {{isset($visualizar) && $visualizar == true ? 'disabled' : ''}}>
                                        @foreach($estados as $est)
                                            <option value="{{$est->uf}}" {{isset($dados->estado) && $dados->estado == $est->uf ? 'selected' : ''}}>{{$est->ds_estado}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" value="{{isset($dados->cidade) ? $dados->cidade : ''}}" {{isset($visualizar) && $visualizar == true ? 'disabled' : ''}}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                @if(isset($visualizar) && $visualizar == true)
                                    <a href="{{ url('/')}}" class="btn btn-primary">Voltar</a>
                                @else
                                    <button type="submit" class="btn btn-primary">{{isset($alterar) && $alterar == true ? 'Alterar' : 'Cadastrar'}}</button>
                                    <a href="{{ url('/')}}" class="btn btn-primary">Voltar</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#endereco").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#estado").val("");
        }
        
        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#estado").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#endereco").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#estado").val(dados.uf);
                            $("#cidade").val(dados.localidade);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
</script>
@endsection
