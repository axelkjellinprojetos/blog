<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $contatos = Contatos::all();
        return view('listarcontatos', compact('contatos'));
    }

    /**
     * Show the form for creating new resource.
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
        $cont = new Contatos;
        $request->validate([
            'nomeVendedor'=>'required|min:3|unique:contatos|string',
            'nomeDoContato'=>'required|min:3',
            'numero'=>'required|min:11|max:11|unique:contatos',
            'email'=>'required|email|unique:contatos',
            'dataContato'=>'date|before:tomorrow',
            'dataValidade'=>'date|after:tomorrow'              
        ]);       

        $cont = Contatos::create([
            'nomeVendedor' => $request['nomeVendedor'],
            'nomeDaEmpresa' =>$request['nomeDaEmpresa'],
            'nomeDoContato' =>$request['nomeDoContato'],
            'numero' =>$request['numero'],
            'email' =>$request['email'],
            'dataContato'=>$request['dataContato'],
            'dataValidade' =>$request['dataValidade']                       
        ]);
            
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
            'email'=>'required|email',
            'dataContato'=>'date|before:tomorrow',
            'dataValidade'=>'date|after:tomorrow'              
        ]); 

      /* $cont = Contatos::findOrFail($id);
        $cont->fill($request->all());     
        $cont->save();*/
        

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


 /*$cont = new Contatos;      
         $cont->nomeVendedor = $request->input('nomeVendedor');  
         $cont->nomeDaEmpresa = $request->input('nomeDaEmpresa');
         $cont->nomeDoContato = $request->input('nomeDoContato');
         $cont->numero = $request->input('numero');
         $cont->email = $request->input('email');
         $cont->dataContato = $request->input('dataContato');
         $cont->dataValidade = $request->input('dataValidade');
         $cont->save();
         return redirect('listarcontatos');*/