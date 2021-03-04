<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $employees = Employee::orderBy('id','asc')->paginate($request->show);
            return response()->json(['data'=>$employees,'code'=>200]);
        }
        return view('pages.employees');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'name.required' => 'សូមអភ័យទោស, លោកអ្នកមិនបានបំពេញឈ្មោះបុគ្គលិក។',
            'salary.required' => 'សូមអភ័យទោស, លោកអ្នកមិនបានបំពេញមុខដំណែងបុគ្គលិក។',
            'position.required' => 'សូមអភ័យទោស, លោកអ្នកមិនបានបំពេញប្រាក់ខែបុគ្គលិក។',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'salary' => 'required',
            'position' => 'required',
        ],$messages);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }else{
            $employee = Employee::create([
                'name'=>$request->name,
                'salary'=>$request->salary,
                'position'=>$request->position,
            ]);

            return response()->json([
                'message'=>'ឈ្មោះបុគ្គលិក '.$request->name.' ត្រូវបានដាក់បញ្ចូលរួចរាល់។',
                'code'=>200,
            ]);
        }

        // $employee = Employee::create([
        //     'name'=>$request->name,
        //     'salary'=>$request->salary,
        // ]);

        // return response()->json([
        //     'message'=>'',
        //     'code'=>200,
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee,Request $request)
    {
        $employee = Employee::find($request->id);
        if($employee){
            return response()->json([
                "data"=>$employee,
                "message"=> 'ទាញទិន្នន័យបានជោគជ័យ សូមអបអរ។',
                "code"=>200,
            ]);
        }
        return response()->json([
            "data"=>'',
            "message"=>"ប្រព័ន្ធទាញទិន្នន័យបរាជ័យ សូមអធ្យាស្រ័យ។",
            "code"=>500,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $messages = [
            'name_edit.required' => 'សូមអភ័យទោស, លោកអ្នកមិនបានបំពេញឈ្មោះបុគ្គលិក។',
            'salary_edit.required' => 'សូមអភ័យទោស, លោកអ្នកមិនបានបំពេញមុខដំណែងបុគ្គលិក។',
            'position_edit.required' => 'សូមអភ័យទោស, លោកអ្នកមិនបានបំពេញប្រាក់ខែបុគ្គលិក។',
        ];
        $validator = Validator::make($request->all(), [
            'name_edit' => 'required',
            'salary_edit' => 'required',
            'position_edit' => 'required',
        ],$messages);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }else{
            $employee = Employee::find($request->id);
            $employee->name = $request->name_edit;
            $employee->salary = $request->salary_edit;
            $employee->position = $request->position_edit;
            $employee->update();
            return response()->json([
                'message'=>'ឈ្មោះបុគ្គលិក '.$request->name_edit.' ត្រូវបានកែប្រែរួចរាល់។',
                'code'=>200,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee,Request $request)
    {
        if($request->ajax()){
            $total = count(Employee::all());
            $employee = Employee::find($request->id);
            $employee->delete();
            if($request->id <= $total){
                for ($i=$request->id+1; $i <= $total ; $i++) { 
                    Employee::where('id', $i)->update(['id' =>  DB::raw('id -1')]);
                } 
            }
            return response()->json([
                'message'=>'ឈ្មោះបុគ្គលិក '.$request->name.' ត្រូវបានលុបចោល',
                'code'=>200,
            ]);
        }
    }
}
