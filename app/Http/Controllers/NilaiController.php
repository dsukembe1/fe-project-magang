<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    function index(){
        return view('layouts.nilai-layout');
    }

    function guru(){
        return view('guru.nilai-layout');
    }
}
