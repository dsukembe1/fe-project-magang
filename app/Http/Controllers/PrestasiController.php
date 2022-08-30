<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    function index(){
        return view('layouts.prestasi-layout');
    }

    function guru(){
        return view('guru.prestasi-layout');
    }
}
