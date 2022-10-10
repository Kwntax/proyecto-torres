<?php

namespace App\Http\Resources;

use App\Models\Alumno;
use App\Models\Bachillerato;
use App\Models\DatosEconomicos;
use App\Models\DatosEscolares;
use App\Models\DatosLaborales;
use App\Models\DatosPersonales;
use App\Models\EstadosCiviles;
use App\Models\Genero;
use App\Models\IngresosFamiliares;
use App\Models\PersonasVivienda;
use App\Models\RazonTrabaja;
use App\Models\TipoBachillerato;
use Illuminate\Http\Resources\Json\JsonResource;

class EstadisticaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'alumno' => $this->count(),
            'datosPersonales' => [
                'genero' => [ 
                    [
                    'descripcion' => Genero::where('id','=','GN-M')->value('genero'),
                    'cantidad' => Alumno::where('genero','=','GN-M')->count(),
                    ],
                    [
                    'descripcion' => Genero::where('id','=','GN-F')->value('genero'),
                    'cantidad' => Alumno::where('genero','=','GN-F')->count(),
                    ],
                ],
                'estadoCivil' => [
                    [
                        'descripcion' => EstadosCiviles::where('id','=','EC-SLT')->value('estado_civil'),
                        'cantidad' => DatosPersonales::where('estado_civil','=','EC-SLT')->count(),
                    ],
                    [
                        'descripcion' => EstadosCiviles::where('id','=','EC-UL')->value('estado_civil'),
                        'cantidad' => DatosPersonales::where('estado_civil','=','EC-UL')->count(),
                    ],
                ],       
                'viveCon' => [
                    [
                        'descripcion' => PersonasVivienda::where('id','=','VC-AP')->value('vive_con'),
                        'cantidad' => DatosEconomicos::where('vive_con','=','VC-AP')->count(),
                    ],
                    [
                        'descripcion' => PersonasVivienda::where('id','=','VC-UP')->value('vive_con'),
                        'cantidad' => DatosEconomicos::where('vive_con','=','VC-UP')->count(),
                    ],
                    [
                        'descripcion' => PersonasVivienda::where('id','=','VC-SL')->value('vive_con'),
                        'cantidad' => DatosEconomicos::where('vive_con','=','VC-SL')->count(),
                    ],
                    [
                        'descripcion' => PersonasVivienda::where('id','=','VC-OF')->value('vive_con'),
                        'cantidad' => DatosEconomicos::where('vive_con','=','VC-OF')->count(),
                    ],
                ],    
                'ingresosFamiliares' => [
                    [
                        'descripcion' => IngresosFamiliares::where('id','=','IF-510')->value('ingresos_familiares'),
                        'cantidad' => DatosEconomicos::where('ingresos','=','IF-510')->count(),
                    ],
                    [
                        'descripcion' => IngresosFamiliares::where('id','=','IF-1015')->value('ingresos_familiares'),
                        'cantidad' => DatosEconomicos::where('ingresos','=','IF-1015')->count(),
                    ],
                    [
                        'descripcion' => IngresosFamiliares::where('id','=','IF-ME5')->value('ingresos_familiares'),
                        'cantidad' => DatosEconomicos::where('ingresos','=','IF-ME5')->count(),
                    ],
                    [
                        'descripcion' => IngresosFamiliares::where('id','=','IF-MA15')->value('ingresos_familiares'),
                        'cantidad' => DatosEconomicos::where('ingresos','=','IF-MA15')->count(),
                    ],
                ],
                
            ],
            'datosLaborales' => [
                'trabajan' => [
                    'si' => null,
                    'no' => null,
                ],
                'trabajoRelacionadoEstudios' => [
                    'si' => null,
                    'no' => null,
                ],
                'razonTrabaja' => [
                    [
                        'descripcion' => RazonTrabaja::where('id','=','RT-AEF')->value('razon'),
                        'cantidad' => DatosLaborales::where('razon_trabajo','=','RT-AEF')->count(),
                    ],
                    [
                        'descripcion' => RazonTrabaja::where('id','=','RT-ATF')->value('razon'),
                        'cantidad' => DatosLaborales::where('razon_trabajo','=','RT-ATF')->count(),
                    ],
                    [
                        'descripcion' => RazonTrabaja::where('id','=','RT-SGI')->value('razon'),
                        'cantidad' => DatosLaborales::where('razon_trabajo','=','RT-SGI')->count(),
                    ],
                    [
                        'descripcion' => RazonTrabaja::where('id','=','RT-ST')->value('razon'),
                        'cantidad' => DatosLaborales::where('razon_trabajo','=','RT-ST')->count(),
                    ],
                ],
            ],
            'datosEscolares' => [
                'tipoBachillerato' => [
                    [
                        'description' => TipoBachillerato::where('id','=','TB-PBL')->value('tipo_bachillerato'),
                        'cantidad' => DatosEscolares::where('tipo_bachillerato','=','TB-PBL')->count(),
                    ],
                    [
                        'description' => TipoBachillerato::where('id','=','TB-PBL')->value('tipo_bachillerato'),
                        'cantidad' => DatosEscolares::where('tipo_bachillerato','=','TB-PBL')->count(),
                    ],
                ],
                'bachilleratos' => [
                    [
                        'descripcion' => Bachillerato::where('id',1)->value('nombre'),
                        'cantidad' => DatosEscolares::where('bachillerato',1)->count(),
                    ],
                    [
                        'descripcion' => Bachillerato::where('id',2)->value('nombre'),
                        'cantidad' => DatosEscolares::where('bachillerato',2)->count(),
                    ],
                    [
                        'descripcion' => Bachillerato::where('id',3)->value('nombre'),
                        'cantidad' => DatosEscolares::where('bachillerato',3)->count(),
                    ],
                    [
                        'descripcion' => Bachillerato::where('id',4)->value('nombre'),
                        'cantidad' => DatosEscolares::where('bachillerato',4)->count(),
                    ],
                    [
                        'descripcion' => Bachillerato::where('id',5)->value('nombre'),
                        'cantidad' => DatosEscolares::where('bachillerato',5)->count(),
                    ],
                    [
                        'descripcion' => Bachillerato::where('id',6)->value('nombre'),
                        'cantidad' => DatosEscolares::where('bachillerato',6)->count(),
                    ],
                    [
                        'descripcion' => Bachillerato::where('id',7)->value('nombre'),
                        'cantidad' => DatosEscolares::where('bachillerato',7)->count(),
                    ],
                    [
                        'descripcion' => Bachillerato::where('id',8)->value('nombre'),
                        'cantidad' => DatosEscolares::where('bachillerato',8)->count(),
                    ],
                    [
                        'descripcion' => Bachillerato::where('id',9)->value('nombre'),
                        'cantidad' => DatosEscolares::where('bachillerato',9)->count(),
                    ],
                    [
                        'descripcion' => Bachillerato::where('id',10)->value('nombre'),
                        'cantidad' => DatosEscolares::where('bachillerato',10)->count(),
                    ],
                    [
                        'descripcion' => Bachillerato::where('id',11)->value('nombre'),
                        'cantidad' => DatosEscolares::where('bachillerato',11)->count(),
                    ],
                ],
            ],
            'promedios' => [
                'bachillerato' => null,
                'tsu' => [
                    'porCuatrimestre' => null,
                    'promedios' => null,
                ],
                'ingenieria' => [
                    'porCuatrimestre' => null,
                    'promedios' => null,
                ],
            ],

        ];
    }
}
