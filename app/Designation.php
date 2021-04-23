<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable =['title','status'];

    public function employeeDesignation(){
        return $this->hasOne(User::class,'designation_id');
    }
}
