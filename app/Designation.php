<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable =['title','status'];

    public function employeeDesignation(){
        return $this->hasOne(Employee::class,'designation_id');
    }
}
