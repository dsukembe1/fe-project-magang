<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    function index(){
        return view('layouts.dashboard-layout');
    }

    function guru(){
        return view('guru.dashboard-layout');
    }
}
