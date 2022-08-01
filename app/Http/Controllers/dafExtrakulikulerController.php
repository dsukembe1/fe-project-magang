<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dafExtrakulikulerController extends Controller
{
    function index(){
        return view('layouts.dafextrakulikuler-layout');
    }
}
