<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contatos; 

class ClienteControlador extends Controller 
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* A RN04 (Deve ser ordenado a listagem de contatos de forma decrescente por data.) também não está sendo aplicada.
        Deve ser ordenado a listagem de contatos de forma descrescente por data de contato.*/
        $contatos = Contatos::orderBy('dataContato', 'desc')->get();
        return view('listarcontatos', compact('contatos'));

        
    }

    /**
     * Show the form for creating new resource.\zxz\x
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/cadastrarcontato');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        /*Dá uma revisada nas regras de negócio em especial a RN01 (Deve ser obrigatório informar os campos nome do vendedor, nome do contato, telefone e e-mail), 
        se somente estes campos são obrigatórios deveria ser possível cadastrar um contato informando APENAS esses campos.*/
        $cont = new Contatos;
        
       $request->validate([
            'nomeVendedor'=>'required|min:3',
            'nomeDoContato'=>'required|min:3',
            'numero'=>'required|min:11|max:11',
            'email'=>'required|email'            
        ]);   
           

        $cont = Contatos::create([
            'nomeVendedor' => $request['nomeVendedor'],
            'nomeDaEmpresa' => $request['nomeDaEmpresa'],
            'nomeDoContato' => $request['nomeDoContato'],
            'numero' => $request['numero'],
            'email' => $request['email'],
            'dataContato' => $request['dataContato'],
            'dataValidade' => $request['dataValidade']
                                   
        ]);
        /*
            Aqui criei duas variaveis recebendo as datas de contato e de validade
            criei um laço de decisao onde se data de contato for maior que data de validade 
            ele ordena a lista do DB em ordem decrescente por data de crição e pega o primeiro que no caso 
            foi o ultimo a ser criado e o deleta e retorna para pagina de cadastro, infelizmente nao consegui redirecionar para um aviso 
            do erro, mas enquanto o usuario nao por a data certa ele nao ira cadastrar.
        */
        $dContato = $cont['dataContato'];
        $dValidade = $cont['dataValidade'];
        if($dContato > $dValidade){
            echo 'A data de contato não pode ser maior que a data de Validade';
            $cont = Contatos::orderBy('created_at', 'desc')->first();
                if(isset($cont)){
                   $cont->delete();
            }
            return redirect('\cadastrarcontato');
            
        }
        
     
        return redirect('listarcontatos');

        
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cont = Contatos::find($id);
        if(isset($cont)){
            return view('editarcontatos', compact('cont'));
        }
            return redirect('/listarcontatos');
        
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomeVendedor'=>'required|min:3',
            'nomeDoContato'=>'required|min:3',
            'numero'=>'required|min:11|max:11',
            'email'=>'required|email'            
        ]); 
        

        $cont = Contatos::find($id);
            if(isset($cont)){
                $cont->nomeVendedor = $request->input('nomeVendedor');
                $cont->nomeDaEmpresa = $request->input('nomeDaEmpresa');
                $cont->nomeDoContato = $request->input('nomeDoContato');
                $cont->numero = $request->input('numero');
                $cont->email = $request->input('email');
                $cont->dataContato = $request->input('dataContato');
                $cont->dataValidade = $request->input('dataValidade');
                $cont->save();
            }
            return redirect('\listarcontatos');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cont = Contatos::find($id);
        if(isset($cont)){
            $cont->delete();
        }
            return redirect('\listarcontatos');
        
        
    }
}
