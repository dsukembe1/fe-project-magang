<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dafRapotController extends Controller
{
    function index(){
        return view('layouts.dafrapot-layout');
    }

    function guru(){
        return view('guru.dafrapot-layout');
    }
}
