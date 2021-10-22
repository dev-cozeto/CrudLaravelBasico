<?php

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

use App\Produto;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('inicio');
});

//Rota de criação do Produto
Route::post('/cadastrar-produto', function (Request $request) {
    //Criando um produto no banco de dados 
    Produto::create([
        'nome' => $request->nome,
        'valor' => $request->valor,
        'estoque' => $request->estoque
    ]);

    echo "Produto criado com sucesso!";
});

//Rota de leitura do produto
Route::get('/ver-produto/{id}', function ($id) {

    $produto = Produto::find($id);
    return view('ver', ['produto' => $produto]);
});

//Rota de edição do produto - GET
Route::get('/editar-produto/{id}', function ($id) {

    $produto = Produto::find($id);
    return view('editar', ['produto' => $produto]);
});

//Rota de edição do produto - POST
Route::post('/editar-produto/{id}', function (Request $request, $id) {

    $produto = Produto::find($id);
    $produto -> update ([
        'nome' => $request->nome,
        'valor' => $request->valor,
        'estoque' => $request->estoque
    ]);

    echo "Produto editado com sucesso!";
});

//Rota de exclussão do produto - POST
Route::get('/excluir-produto/{id}', function ($id) {

    $produto = Produto::find($id);
    $produto->delete();

    echo "Produto excluído com sucesso!";
});


