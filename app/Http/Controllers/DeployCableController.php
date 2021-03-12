<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeployCable;
class DeployCableController extends Controller
{
    public function index(Request $request){
        return view('pages.deploy_cable');
    }
    public function getDataJson(Request $request){
        $data = DeployCable::paginate($request->show);
        return response()->json($data);
    }
}
