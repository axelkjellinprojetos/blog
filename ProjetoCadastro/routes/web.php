<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// aqui devemos implementar a validação de todos os campos do cadastro 
//se for ok ele vai pra essa pagina se nao retorna pra pagaina de cadastro
//
/*Route::get('/cadastrosalvo', function(){
    return view('cadastrosalvo');
})->name('salvo');*/

/*Route::post('/cadastrosalvo', function(Request $request){
    return redirect(view('cadastrosalvo'));
});*/

Route::get('/deletarcontatos', function(){
    return view('deletarcontatos');
})->name('deletar');

Route::get('/editarcontatos', function(){
    return view('editarcontatos');
})->name('editar');

/*Route::get('/listarcontatos', function(){
    return view('listarcontatos');
})->name('listar');*/

Route::get('/cadastrosalvo', function(){
    return view('cadastrosalvo');
})->name('salvo');


/*Route::get('/cadastrarcontato', 'ClienteControlador@index')->name('principal');
Route::get('/cadastrosalvo', 'ClienteControlador@store')->name('salvo');
Route::post('/caddastrarcontato', 'ClienteControlador@store');*/

Route::get('/cadastrarcontato', 'ClienteControlador@create');
Route::get('/listarcontatos', 'ClienteControlador@index');
Route::post('/listarcontatos', 'ClienteControlador@store');
Route::get('/listarcontatos/apagar/{id}', 'ClienteControlador@destroy');  
Route::get('/listarcontatos/editarcontatos/{id}', 'ClienteControlador@edit');  
Route::post('listarcontatos/{id}', 'ClienteControlador@update');

Route::get('testelogica', function(){

    return view('testelogica');

});

/*<div class="form-group" >
              <label for="dataContato">Data de contato
              <input class="form-control" id="dataContato" type="date" name="dataContato">
              </label>
              <label for="dataValidade">Data de validade
              <input class="form-control" id="dataValidade" type="date"  name="dataValidade">
              </label>
            </div>*/