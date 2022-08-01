<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dafTartibController extends Controller
{
    function index(){
        return view('layouts.daftartib-layout');
    }
}
