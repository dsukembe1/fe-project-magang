<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TartibController extends Controller
{
    function index(){
        return view('layouts.tartib-layout');
    }
}
