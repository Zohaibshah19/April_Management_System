<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['full_name','email','password','user_role','status','designation_id'];

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

}
