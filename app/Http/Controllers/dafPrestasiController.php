<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dafPrestasiController extends Controller
{
    function index(){
        return view('layouts.dafprestasi-layout');
    }

    function guru(){
        return view('guru.dafprestasi-layout');
    }
}
