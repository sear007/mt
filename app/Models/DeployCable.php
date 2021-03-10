<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RunCable;
class DeployCable extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function RunCables(){
        return $this->hasMany(Runcable::class,'deploy_cable_id');
    }
}
