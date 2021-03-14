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
        $data = DeployCable::orderBy('id','desc')->paginate($request->show);
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
                    'request_day' => $request->request_day?rv_date($request->request_day):'',
                    'return_day' => $request->return_day?rv_date($request->return_day):'',
                    'send_file_opn' => $request->send_file_opn?rv_date($request->send_file_opn):'',
                    'take_invoice' => $request->take_invoice?rv_date($request->take_invoice):'',
                    'pay_money' => $request->pay_money?rv_date($request->pay_money):'',
                ]);
                return response()->json(['code'=>200,'message'=>'ទិន្នន័យត្រូវបានបញ្ចូនជោគជ័យ។']);
            }
        }
    }
    public function destroy(Request $request){
        $post = DeployCable::find($request->id);
        $post->delete();
        return response()->json(['code'=>200,'message'=>'ទិន្នន័យត្រូវបានលុបជោគជ័យ។']);
    }
    public function edit(Request $request){
        $post = DeployCable::find($request->id);
        return response()->json($post); 
    }
    public function update(Request $request){
        if($request->ajax()){
            $validator = Validator::make($request->all(),[
                'name_pop'=>'required',
                'plan_code'=>'required',
            ]);
            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()]);
            }else{
                $post = DeployCable::find($request->id);
                $post->update([
                    'name_pop' => $request->name_pop,
                    'plan_code' => $request->plan_code,
                    'request_day' => $request->request_day?rv_date($request->request_day):'',
                    'return_day' => $request->return_day?rv_date($request->return_day):'',
                    'send_file_opn' => $request->send_file_opn?rv_date($request->send_file_opn):'',
                    'take_invoice' => $request->take_invoice?rv_date($request->take_invoice):'',
                    'pay_money' => $request->pay_money?rv_date($request->pay_money):'',
                ]);
                return response()->json(['code'=>200,'message'=>'ទិន្នន័យត្រូវបានកែសំម្រួលជោគជ័យ។']);
            }
        }
    }

    public function deploy_cable_print(Request $request){
        $posts = DeployCable::orderBy('id','desc')->get();
        return view('print.deploy_cable',compact('posts'));
    }


}
