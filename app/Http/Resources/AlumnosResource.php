<?php

namespace App\Http\Resources;

use App\Models\ApoyoEconomico;
use App\Models\Bachillerato;
use App\Models\DatosEconomicos;
use App\Models\DatosEscolares;
use App\Models\DatosFamiliares;
use App\Models\DatosLaborales;
use App\Models\DatosPersonales;
use App\Models\Domicilio;
use App\Models\EntidadesFederativas;
use App\Models\EstadosCiviles;
use App\Models\Genero;
use App\Models\IngresosFamiliares;
use App\Models\Municipio;
use App\Models\PersonasVivienda;
use App\Models\TipoBachillerato;
use App\Models\Transporte;
use App\Models\Vivienda;
use Illuminate\Http\Resources\Json\JsonResource;

class AlumnosResource extends JsonResource
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
            'matricula'=>$this->matricula,
            'nombre'=>$this->nombre,
            'urlFoto'=>$this->foto,
            //Laravel datosPersonales opening an array
            'datosPersonales'=> [
                //Laravel datosPersonales find fecha_nacimiento 
                'fecha_nacimiento' => DatosPersonales::find($this->id)->fecha_nacimiento,
                'edad'=>DatosPersonales::find($this->id)->edad,
                'lugarDeNacimiento'=> [
                    'ciudad'=> DatosPersonales::find($this->id)->ciudad_nacimiento,
                    'entidadFederativa' =>[
                        'id' => DatosPersonales::find($this->id)->municipio_estado,
                        'nombre' => EntidadesFederativas::find(DatosPersonales::find($this->id)->municipio_estado)->entidad_federativa,

                    ],
                'genero' => [
                    'id' => $this->genero,
                    'descripcion'=> Genero::find($this->genero)->genero,
                ],
                'estadoCivil' => [
                    'id' => DatosPersonales::find($this->id)->estado_civil,
                    'descripcion' => EstadosCiviles::find(DatosPersonales::find($this->id)->estado_civil)->estado_civil,

                ],
                'domicilio' => [
                    'calle'=> Domicilio::find(DatosPersonales::find($this->id)->domicilio)->calle,
                    'numero' => Domicilio::find(DatosPersonales::find($this->id)->domicilio)->numero,
                    'colonia' => Domicilio::find(DatosPersonales::find($this->id)->domicilio)->colonia,
                    'municipio' => [
                        'id' => Domicilio::find(DatosPersonales::find($this->id)->domicilio)->municipio,
                        'descripcion'=> Municipio::find(Domicilio::find(DatosPersonales::find($this->id)->domicilio)->municipio)->municipio,
                    ],

                ],
                'contacto' => [
                    'correoElectrónico' => [
                        'personal'=> DatosPersonales::find($this->id)->correo_personal,
                        'instituticional' => DatosPersonales::find($this->id)->correo_instituticional,
                    ],
                    'telefono' => [
                        'casa' => DatosPersonales::find($this->id)->telefono_casa,
                        'movil' => DatosPersonales::find($this->id)->telefono_celular,
                    ],
                ],
                ],

            ],
            'datosFamiliares' => [
                'padre' => DatosFamiliares::find($this->id)->where('alumno',$this->id)->where('parentesco','=','padre')->get(['nombre','ocupacion','telefono']),


                'madre' => DatosFamiliares::find($this->id)->where('alumno',$this->id)->where('parentesco','=','madre')->get(['nombre','ocupacion','telefono']),

                'conyuge' => [
                    'nombre' => '',
                    'ocupacion' => '',
                    'telefono' => '',

                ],
                'emergencia' => DatosFamiliares::find($this->id)->where('alumno',$this->id)->where('emergencia',1)->get(['nombre','ocupacion','telefono']),

            ],
            'datosLaborales' => [
                'trabaja' => true,
                'estaRelacionadoEstudios' => true,
                'empresa' => DatosLaborales::where('alumno',$this->id)->get(['nombre','domicilio','telefono','puesto','departamento']),

            ],
            'datosEconomicos' => [
                'viveCon' => [
                    'id'=>DatosEconomicos::where('alumno',$this->id)->find($this->id)->vive_con,
                    'descripcion' => PersonasVivienda::where('id',DatosEconomicos::where('alumno',$this->id)->find($this->id)->vive_con)->value('vive_con'),
                ],
                'vivienda' => [
                    'id' => DatosEconomicos::where('alumno',$this->id)->value('tipo_vivienda'),
                    'descripcion' => Vivienda::where('id',DatosEconomicos::where('alumno',$this->id)->value('tipo_vivienda'))->value('vivienda'),

                ],
                'tranporte' => [
                    'id' => DatosEconomicos::where('alumno',$this->id)->value('tipo_transporte'),
                    'descripcion' => Transporte::where('id',DatosEconomicos::where('alumno',$this->id)->value('tipo_transporte'))->value('transporte'),

                ],
                'apoyoEconomico' => [
                    'id' => DatosEconomicos::where('alumno',$this->id)->value('persona_apoyo_economico'),
                    'descripcion' => ApoyoEconomico::where('id',DatosEconomicos::where('alumno',$this->id)->value('persona_apoyo_economico'))->value('apoyo_economico'),

                ],
                'ingresosFamiliares' => [
                    'id' => DatosEconomicos::where('alumno',$this->id)->value('ingresos'),
                    'descripcion' => IngresosFamiliares::where('id',DatosEconomicos::where('alumno',$this->id)->value('ingresos'))->value('ingresos_familiares')
                ],
            ],
            'datosEscolares' => [
                'nombreBachillerato' => Bachillerato::where('id',DatosEscolares::where('alumno',$this->id)->value('bachillerato'))->value('nombre'),
                'tipoBachillerato'=>[
                    'id' => DatosEscolares::where('alumno',$this->id)->value('tipo_bachillerato'),
                    'descripcion' => TipoBachillerato::where('id',DatosEscolares::where('alumno',$this->id)->value('tipo_bachillerato'))->value('tipo_bachillerato')

                ],
                'entidadFederativa' => [
                    'id' => DatosEscolares::where('alumno',$this->id)->value('entidad_federativa'),
                    'nombre' => EntidadesFederativas::where('id',DatosEscolares::where('alumno',$this->id)->value('entidad_federativa'))->value('entidad_federativa'),
                ],

            ],
            'promedios' => [
                'tsu' => [
                    'bachillerato'=>null,
                    'nivelIngles' => null,
                    'puntosExamenIngreso ' => null,
                    'porCuatrimestre'=> null,
                    'promedio'=> null,

                ],
                'ingenieria' => [
                    'porCuatrimestre' => null,
                    'promedios' => null,
                ],
            ],


           
        ];

    }
}
