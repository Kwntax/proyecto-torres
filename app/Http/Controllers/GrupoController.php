<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GrupoController extends Controller
{
    function getDataApi(){
        $collection = Http::get('https://acs-api-utt.herokuapp.com/api/grupo');
        return view('group_list', ['collection'=>$collection['alumnos']]);

        $collection2 = Http::get('https://acs-api-utt.herokuapp.com/api/grupo', ['datosPersonales']);
        return view('group_list', ['collection2'=>$collection2['alumnos']]);
    }
}
