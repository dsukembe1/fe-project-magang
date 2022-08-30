<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dafNilaiController extends Controller
{
    function index(){
        return view('layouts.dafnilai-layout');
    }

    function guru(){
        return view('guru.dafnilai-layout');
    }
}
