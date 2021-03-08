<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\RequestLeave;
class AttendanceController extends Controller
{
    
    public function store(Request $request)
    {
        if($request->ajax()){
            $employee = Employee::find($request->id);
            $employee->attendances()->create([
                'employee_id'=>$request->id,
                'attendance'=>true,
                'date'=>$request->date,    
            ]);
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
                $action = Attendance::create([
                    'employee_id'=> $request->request_leave_employee,
                    'attendance'=>false,
                    'request_leave'=>$request->request_leave_reason,
                    'date'=> Carbon::parse($request->request_leave_date)->format('Y-m-d'),
                ]);
                return response()->json(["message"=>"បានដាក់ច្បាប់វត្តមានរួចរាល់", "status_code"=>200]);
            }
            return response()->json(["message"=>"វត្តមានសំរាប់ថ្ងៃ ".$request->request_leave_date." មានរួចរាល់។", "status_code"=>500]);
        }
    }

    public function AttendancesJson(Request $request)
    {
        $start = $request->year."-".sprintf('%02d',$request->month)."-01";
        $end = $request->year."-".sprintf('%02d',$request->month)."-".$request->last_day;
        $attendances = Attendance::whereBetween('date',[$start,$end])->get();
        
        return response()->json([
            'attendances'=>$attendances,
        ]);
    }
    public function PrintAttendances(Request $request){
        $employees = Employee::all();
        $attendances = Attendance::whereBetween('date',[$request->start,$request->end])->with('employee')->get();
        return view('print.attendance',compact('request','attendances','employees'));
    }
}
