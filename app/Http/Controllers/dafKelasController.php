<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dafKelasController extends Controller
{
    function index(){
        return view('layouts.dafkelas-layout');
    }
}
