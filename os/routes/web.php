<?php

use App\Os;
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

Route::get('/', function (Request $req) {

    //buscar na pagina inicial
    if(isset($req->busca) && $req->busca != ""){

      $busca =  $req->busca;
      $lista =  Os::listaOsSite(6,$busca); 
      


    }else{
      $lista = Os::listaOsSite(6);
      $busca= "";
    }

   
    return view('site', compact('lista'));
})->name('site');

Route::get('/os/{id}/{titulo?}', function ($id) {

  $os = Os::find($id);
  if($os){
    return view('os', compact('os'));
  }

  return redirect()->route('site');

})->name('os');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:eAutor');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function(){

  Route::resource('os', 'OsController')->middleware('can:eAutor');
  Route::resource('usuarios', 'UsuariosController')->middleware('can:eAdmin');
  Route::resource('autores', 'AutoresController')->middleware('can:eAdmin');
  Route::resource('adm', 'AdminController')->middleware('can:eAdmin');

});
