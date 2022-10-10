<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstadisticaResource;
use App\Http\Resources\GruposResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Alumno;
use App\Models\DatosPersonales;
use App\Models\Grupo;


class GrupoController extends Controller
{


    


    public function index()
    {
           /* $collectionGroup = Http::get('https://acs-api-utt.herokuapp.com/api/grupo');
            return view('group_list', ['collection'=>$collectionGroup['grupo']]);*/
        
        //
       /* $grupo = Grupo::all();
        $alumnos = Alumno::all(['matricula','nombre','foto']);

        return [
            'status'=>0,
            'grupo' => GruposResource::collection($grupo),
            'alumnos' => $alumnos,
            'estadisticas' => EstadisticaResource::collection($alumnos),
        ];*/
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
    public function show($grupo)
    {
        // url: /api/grupos/{TI-IDGS-9A-202203} 
        $alumnogrupo = $grupo;
        $grupo = Grupo::where('id',$grupo)->FirstOrFail()->get();
        $alumnos = Alumno::where('grupo',$alumnogrupo)->FirstOrFail()->get(['matricula','nombre','foto']);
        //$alumnos = Alumno::all(['matricula','nombre','foto','grupo']);
        return [
            'status'=>0,
            'grupo' => GruposResource::collection($grupo),
            'alumnos' => $alumnos,
            'estadisticas' => EstadisticaResource::collection($alumnos),
        ];

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

