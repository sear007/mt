<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RunCableController extends Controller
{
    public function index(){
        return view('pages.run_cable');
    }
}
