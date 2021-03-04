<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;
use App\Models\RequestLeave;
class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function requestLeave()
    {
        return $this->hasMany(RequestLeave::class);
    }
}
