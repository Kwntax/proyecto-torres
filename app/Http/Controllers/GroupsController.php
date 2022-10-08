<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GroupsController extends Controller
{
    function getDataApi(){
        $collection = Http::get('https://acs-api-utt.herokuapp.com/api/grupo');
        return view('group_list', ['collection'=>$collection['alumnos']]);
    }

}