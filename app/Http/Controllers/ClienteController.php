<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Estado;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function listarCliente()
    {
        $clientes = Cliente::paginate(10);

        return view('listagem', compact('clientes'));
    }

    public function viewCadastrar()
    {
        $titulo = 'Cadastro de Cliente';
        
        $estados = Estado::select('uf','ds_estado')->get();

        return view('dados', compact('titulo', 'estados'));
    }

    public function cadastrarCliente(Request $request)
    {
        DB::beginTransaction();

        try {
            Cliente::create([
                'nome' => $request->nome
                , 'data_nascimento' => $request->data_nascimento
                , 'sexo' => $request->sexo
                , 'cep' => preg_replace( '/[^0-9]/', '', $request->cep )
                , 'endereco' => $request->endereco
                , 'numero' => $request->numero
                , 'complemento' => $request->complemento
                , 'bairro' => $request->bairro
                , 'estado' => $request->estado
                , 'cidade' => $request->cidade
            ]);

            DB::commit();

            return redirect('/')->with('retorno',['status' => 'success', 'message' => 'Cadastrado com sucesso!']);
        } 
        catch (\Exception $e) {
            DB::rollback();
            return redirect('/')->with('retorno',['status' => 'danger', 'message' => $e]);
        }
    }

    public function viewVisualizarCliente($id)
    {
        $titulo = 'Visualizar Cliente';

        $dados = Cliente::find($id);

        $visualizar = true;

        $estados = Estado::select('uf','ds_estado')->get();

        return view('dados', compact('titulo', 'dados', 'visualizar', 'estados'));
    }

    public function viewAlterarCliente($id)
    {
        $titulo = 'Alterar Cliente';

        $dados = Cliente::find($id);

        $visualizar = false;

        $alterar = true;

        $estados = Estado::select('uf','ds_estado')->get();

        return view('dados', compact('titulo', 'dados', 'visualizar' , 'alterar', 'estados'));
    }

    public function alterarCliente(Request $request, $id)
    {

        $cliente = Cliente::find($id);
        
        DB::beginTransaction();

        try {
            $cliente->update([
                'nome' => $request->nome
                , 'data_nascimento' => $request->data_nascimento
                , 'sexo' => $request->sexo
                , 'cep' => $request->cep != null ? preg_replace( '/[^0-9]/', '', $request->cep ) : null
                , 'endereco' => $request->endereco
                , 'numero' => $request->numero
                , 'complemento' => $request->complemento
                , 'bairro' => $request->bairro
                , 'estado' => $request->estado
                , 'cidade' => $request->cidade
            ]);
            DB::commit();

            return redirect('/')->with('retorno',['status' => 'success', 'message' => 'Cliente '. $cliente->nome .' alterado com sucesso!']);
        } 
        catch (\Exception $e) {
            DB::rollback();
            return redirect('/')->with('retorno',['status' => 'danger', 'message' => $e]);
        }
    }

    public function excluirCliente(Request $request)
    {
        $cliente = Cliente::where('id',$request->id)->first();

        DB::beginTransaction();

        try {
            $cliente->delete();

            DB::commit();

            return redirect('/')->with('retorno',['status' => 'success', 'message' => 'Cliente deletado com sucesso!']);
        } 
        catch (\Exception $e) {
            DB::rollback();
            return redirect('/')->with('retorno',['status' => 'danger', 'message' => $e]);
        }
    }

}
