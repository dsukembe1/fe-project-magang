<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dafKurikulumController extends Controller
{
    function index(){
        return view('layouts.dafkurikulum-layout');
    }

    function guru(){
        return view('guru.dafkurikulum-layout');
    }
}
