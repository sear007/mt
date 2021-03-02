<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
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
            $action = Attendance::where('employee_id','=',$request->id)->where('date','=',$request->date)->first();
            $success = $action->delete();
            if($success ){
                return response()->json("បានដក់អវត្តមានរួចរាល់។");
            }
            return $request->id;
            
        }
    }
    public function DestroyRequest(Request $request){
        if($request->ajax()){
            $action = Attendance::find($request->id);
            $action->delete();
            return response()->json("បានដក់អវត្តមានរួចរាល់។");
        }
    }
    public function SumitRequest(Request $request){
        if($request->ajax()){
             $query = Attendance::where('employee_id','=',$request->request_leave_employee)->where('date','=',Carbon::parse($request->request_leave_date)->format('Y-m-d'))->get();
            if(count($query)<=0){
                $action = new Attendance;
                $action->employee_id = $request->request_leave_employee;
                $action->attendance = false;
                $action->date = Carbon::parse($request->request_leave_date)->format('Y-m-d');
                $action->request_leave = $request->request_leave_reason;
                $action->save();
                return response()->json(["message"=>"បានដាក់ច្បាប់វត្តមានរួចរាល់", "status_code"=>200]);
            }
            return response()->json(["message"=>"វត្តមានសំរាប់ថ្ងៃ ".$request->request_leave_date." មានរួចរាល់។", "status_code"=>500]);
        }
    }
}
