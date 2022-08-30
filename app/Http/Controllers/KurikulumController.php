<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    function index(){
        return view('layouts.kurikulum-layout');
    }

    function guru(){
        return view('guru.kurikulum-layout');
    }
}
