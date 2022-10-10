<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatalogosResource;
use App\Models\ApoyoEconomico;
use App\Models\EntidadesFederativas;
use App\Models\EstadosCiviles;
use App\Models\Genero;
use App\Models\IngresosFamiliares;
use App\Models\Municipio;
use App\Models\PersonasVivienda;
use App\Models\RazonTrabaja;
use App\Models\TipoBachillerato;
use App\Models\Transporte;
use App\Models\Vivienda;
use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipio = Municipio::all();
        $genero = Genero::all();
        $estadoCivil = EstadosCiviles::all();
        $razonTrabaja = RazonTrabaja::all();
        $viveCon = PersonasVivienda::all();
        $vivienda = Vivienda::all();
        $transporte = Transporte::all();
        $apoyoEconomico = ApoyoEconomico::all();
        $ingresosFamiliares = IngresosFamiliares::all();
        $tipoBachillerato = TipoBachillerato::all();
        $entidadFederativa = EntidadesFederativas::all();
 
        return [
            'status'=>0,
            'municipio'=>$municipio,
            'genero'=>$genero,
            'estadoCivil'=>$estadoCivil,
            'razonTrabaja'=>$razonTrabaja,
            'viveCon'=>$viveCon,
            'vivienda'=>$vivienda,
            'transporte'=>$transporte,
            'apoyoEconomico'=>$apoyoEconomico,
            'ingresosFamiliares'=>$ingresosFamiliares,
            'tipoBachillerato'=>$tipoBachillerato,
            'entidadFederativa'=>$entidadFederativa,
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
