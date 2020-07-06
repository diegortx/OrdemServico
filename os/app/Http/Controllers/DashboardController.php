<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Os;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
          ["titulo"=>"Dashboard","url"=>""]
        ]);

        $totalUsuarios = User::count();
        $totalOs = Os::count();
        $totalAutores = User::where('autor','=','S')->count();
        $totalAdmin = User::where('admin','=','S')->count();


        return view('dashboard',compact('listaMigalhas','totalUsuarios','totalOs','totalAutores','totalAdmin'));
    }
}
