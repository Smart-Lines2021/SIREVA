<?php

namespace App\Http\Controllers\Empresas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Afiliacion;
use App\Admin\TipoCandidato;
use App\Admin\Sexo;
use App\Empresa\Candidato;
use GuzzleHttp\Client;
use App\Empresa\Empresa;
use App\Http\Requests\Empresa\CandidatoRequest;
use Illuminate\Support\Facades\Crypt;
class CandidatoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $candidatos = Candidato::where('activo','=',1)->get();
        return view('empresas.candidatos.index',compact('candidatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = "https://api-sepomex.hckdrk.mx/query/get_estados";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $estados = json_decode($response->getBody());


        $afiliaciones = Afiliacion::where('activo', '=', 1)->get();
        $tipos_de_candidatos = TipoCandidato::where('activo', '=', 1)->get();
        $sexos = Sexo::where('activo', '=', 1)->get();
        return view(
            "empresas.candidatos.create",
            compact('afiliaciones', 'tipos_de_candidatos', 'sexos', 'estados')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidatoRequest $request)

    {
        $candidato = Candidato::create($request->validated());
        $candidato->telefono_celular = $request->get('telefono_celular');
        $candidato->numero_interior = $request->get('numero_interior');
        $candidato->save();
        return redirect()->route('empresas.show', Crypt::encryptString($request->empresa_id))->with('mensaje', 'Se ha registrado una nuevo candidato');
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
}
