<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dafAdministrasiController extends Controller
{
    function index(){
        return view('layouts.dafadministrasi-layout');
    }
}
