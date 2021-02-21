<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Empresa\Empresa;
use App\Empresa\Candidato;


class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        if(Auth::user()->hasRole('admin')){
            return view('layouts.home');
        } else {
            $empresa = Empresa::findOrFail(Auth::user()->empresa->id);
            $candidatos = Candidato::where('empresa_id', '=', Auth::user()->empresa->id)->where('activo', '=', 1)->get();
            return view('layouts.home',compact('empresa','candidatos'));
        }
        
    }
}
