<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeployCable;
use Illuminate\Support\Facades\Validator;
class DeployCableController extends Controller
{
    public function index(Request $request){
        return view('pages.deploy_cable');
    }
    public function getDataJson(Request $request){
        $data = DeployCable::paginate($request->show);
        return response()->json($data);
    }

    public function store(Request $request){
        if($request->ajax()){
            $validator = Validator::make($request->all(),[
                'name_pop'=>'required',
                'plan_code'=>'required',
            ]);
            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()]);
            }else{
                $post = DeployCable::create([
                    'name_pop' => $request->name_pop,
                    'plan_code' => $request->plan_code,
                ]);
                return response()->json(['code'=>200,'message'=>'successful uploaded']);
            }
        }
    }
}
