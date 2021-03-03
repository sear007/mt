<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    public function edit(Employee $employee)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
