<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RapotController extends Controller
{
    function index(){
        return view('layouts.rapot-layout');
    }

    function guru(){
        return view('guru.rapot-layout');
    }
}
