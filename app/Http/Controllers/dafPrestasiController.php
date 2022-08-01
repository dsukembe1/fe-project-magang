<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dafPrestasiController extends Controller
{
    function index(){
        return view('layouts.dafprestasi-layout');
    }
}
