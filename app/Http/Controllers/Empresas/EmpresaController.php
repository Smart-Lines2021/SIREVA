<?php

namespace App\Http\Controllers\Empresas;

use App\Empresa\Candidato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Empresa\Empresa;
use App\Http\Requests\Empresa\EmpresaRequest;
use App\User;
use Illuminate\Support\Facades\Crypt;
use GuzzleHttp\Client;
use App\Admin\Afiliacion;
use App\Admin\TipoCandidato;
use App\Admin\Sexo;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $empresas = Empresa::where('activo', '=', 1)->where('id', '>', '1')->get();
        return view('empresas.empresas.index', compact('empresas'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {

        $empresa = Empresa::create($request->validated());
        $empresa->telefono = $request->get('telefono');
        $empresa->correo = $request->get('correo');
        $empresa->domicilio = $request->get('domicilio');
        $empresa->save();
        return redirect()->route('empresas.index')->with('mensaje', 'Se ha registrado una nueva empresa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decryptString($id);
        $empresa = Empresa::findOrFail($id);
        $candidatos = Candidato::where('empresa_id', '=', $id)->where('activo', '=', 1)->get();
        return view('empresas.empresas.show', compact('candidatos', 'empresa'));
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

    public function listadoUsuarios($id)
    {
        $id = Crypt::decryptString($id);
        $empresa = Empresa::findOrFail($id);
        $usuarios = User::where('empresa_id', '=', $id)->where('activo', '=', 1)->get();
        return view('empresas.empresas.usuarios', compact('usuarios', 'empresa'));
    }


    public function createCandidatoEmpresa($id)
    {
        $id = Crypt::decryptString($id);
        $client = new Client(); //GuzzleHttp\Client
        $url = "https://api-sepomex.hckdrk.mx/query/get_estados";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $estados = json_decode($response->getBody());

        $afiliaciones = Afiliacion::where('activo', '=', 1)->get();
        $tipos_de_candidatos = TipoCandidato::where('activo', '=', 1)->get();
        $sexos = Sexo::where('activo', '=', 1)->get();
        $empresa = Empresa::findOrFail($id);

        $usuarios = User::where('empresa_id', '=', $id)->where('activo', '=', 1)->get();
        return view(
            'empresas.candidatos.create',
            compact('usuarios', 'empresa', 'afiliaciones', 'tipos_de_candidatos', 'sexos', 'estados')
        );
    }

    public function createUsuarioEmpresa($id)
    {
        $id = Crypt::decryptString($id);
        $empresa = Empresa::findOrFail($id);

        return view(
            'auth.register',
            compact( 'empresa', )
        );
    }
}
