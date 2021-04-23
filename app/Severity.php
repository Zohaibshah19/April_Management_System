<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Severity extends Model
{
    protected $fillable =['title','due_date','status'];

    public function userSeverity(){
        return $this->hasOne(Incident::class,'severity_id');
    }
}
