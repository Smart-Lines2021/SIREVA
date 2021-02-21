<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Crypt;
use App\Empresa\Empresa;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    
    public function index()
    {
          $usuarios = User::where('activo','=',1)->where('empresa_id','=',1)->get();
          return view('admin.usuarios.index',compact('usuarios'));
    }

    public function usuariosEmpresas()
    {
        $usuarios = User::where('activo','=',1)->where('empresa_id','>',1)->get();
        return view('admin.usuarios.index2',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas= Empresa::where('activo','=',1)->where('id','>',1)->get();
        $roles= Role::get();
        return view('auth.register',compact('empresas','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {   
        $usuario = User::create($request->validated());
        $usuario->password=Hash::make($request->get('password'));
        $usuario->save();
        $usuario->roles()->attach(1);
        
        //asignamos roles
      
        return redirect()->route('admin.usuarios.index')->with('mensaje','Se ha creado un nuevo usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createUsuarioEmpresa()
    {  
        $empresas= Empresa::where('activo','=',1)->where('id','>',1)->get();
        $roles= Role::get();
        return view('auth.register2',compact('empresas','roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(UserRequest $request)
    {   
        $usuario = User::create($request->validated());
        $usuario->password=Hash::make($request->get('password'));
        $usuario->save();
        $usuario->roles()->attach(2);
        
        return redirect()->route('admin.usuarios.empresas')->with('mensaje','Se ha creado un nuevo usuario');
    }

    public function createUsuarioPorEmpresa($id)
    {  
        $id = Crypt::decryptString($id);
        $empresa = Empresa::findOrFail($id);
        return view('auth.register3',compact('empresa'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store3(UserRequest $request)
    {   
        $usuario = User::create($request->validated());
        $usuario->password=Hash::make($request->get('password'));
        $usuario->save();
        $usuario->roles()->attach(2);
        
        return redirect()->route('empresas.usuarios',Crypt::encryptString($request->get('empresa_id')))->with('mensaje','Se ha creado un nuevo usuario');
    }
}
