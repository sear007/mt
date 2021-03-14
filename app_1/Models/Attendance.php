<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class Attendance extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    public function employee()
    {
        return $this->hasOne(Employee::class,'id','employee_id');
    }
}
