<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    function index(){
        return view('layouts.pengumuman-layout');
    }
}
