<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Os;


class OsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
          ["titulo"=>"Admin","url"=>route('admin')],
          ["titulo"=>"Lista de Ordem de Serviço","url"=>""]
        ]);


        //verifica se o usuario que ira receber a lista de os e admin ou nao
        if(auth()->user()->admin == 'S'){
          $user_id = '';
        }else{          
          $user_id = auth()->user()->id;
        }
        
        
        //Listar os usando o method que esta no Model Os.php
        $listaOs = Os::listaOs(5,$user_id);

        return view('admin.os.index',compact('listaMigalhas','listaOs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if(!empty($request->file('image'))){
          $imagePath = $request->image->store('os/fotos');
          $data['image'] = $imagePath;
        }else{
          $imagePath = 'Sem Imagen';
          $data['image'] = $imagePath;
        }


        $validacao = \Validator::make($data,[
          "titulo" => "required",
          "descricao" => "required",
          "conteudo" => "required",
          "data_inicio" => "required",
          "data_final" => "required",
          
          
          
        ]);

        if($validacao->fails()){
          return redirect()->back()->withErrors($validacao)->withInput();
        }

        Os::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Os::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      $data = $request->all();
      $validacao = \Validator::make($data,[
        "titulo" => "required",
        "descricao" => "required",
        "conteudo" => "required",
        "data_inicio" => "required",
        "data_final" => "required",
      ]);

      if($validacao->fails()){
        return redirect()->back()->withErrors($validacao)->withInput();
      }

      Os::find($id)->update($data);
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Os::find($id)->delete();
        return redirect()->back();
    }
}
