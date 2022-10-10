<?php

namespace App\Http\Resources;

use App\Models\Carrera;
use App\Models\Especialidad;
use App\Models\Nivel;
use App\Models\Periodo;
use Illuminate\Http\Resources\Json\JsonResource;

class GruposResource extends JsonResource
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
            'id'=>$this->id,
            'cuatrimestre'=>$this->cuatrimestre,
            'grupo' =>$this->grupo,
            'descripcion' =>$this->nombre_completo,
            'carrera' => [
                'id' => $this->carrera,
                'nombre' => Carrera::where('id',$this->carrera)->value('carrera'),
                'nivel' => [
                    'id' => Carrera::where('id',$this->carrera)->value('nivel'),
                    'nombre'=> Nivel::where('id',Carrera::where('id',$this->carrera)->value('nivel'))->value('nivel'),

                ],
            ],
            'especialidad' => [
                'id' => $this->especialidad,
                'nombre' => Especialidad::where('id',$this->especialidad)->value('periodo'),
            ],
            'periodo' => [
                'id' => $this->periodo,
                'nombre' => Periodo::where('id',$this->periodo)->value('nombre'),
            ],
        ];
    }
}
