<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    function index(){
        return view('layouts.kelas-layout');
    }
}
