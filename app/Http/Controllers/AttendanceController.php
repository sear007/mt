<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
class AttendanceController extends Controller
{
    
    public function store(Request $request)
    {
        if($request->ajax()){
            $action = new Attendance;
            $action->employee_id = $request->id;
            $action->attendance = true;
            $action->date = $request->date;
            $action->save();
            return response()->json("បានដាក់អវត្តមានរួចរាល់។");
        }
    }
    public function destroy(Request $request){
        if($request->ajax()){
            $action = Attendance::where('employee_id','=',$request->id)->where('date','=',$request->date);
            $action->delete();
            return response()->json("បានដក់អវត្តមានរួចរាល់។");
        }
    }
    public function SumitRequest(Request $request){
        if($request->ajax()){
            return response()->json($request);
        }
    }
}
