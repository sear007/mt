<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeployCableController extends Controller
{
    public function index(Request $request){
        return view('pages.deploy_cable');
    }
}
