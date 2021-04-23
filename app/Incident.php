<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    //protected $table = 'incidents';
    protected $fillable =['subject','status','start_date','description','severity_id'];

    public function severity(){
        return $this->belongsTo(Severity::class);
    }

    // public function users(){
    //     return $this->belongsTo(User::class,'incidentusers');
    // }

    //    public function incidentUsers(){
    //     return $this->hasMany(Incident::class,'user_id' );
    // }

    // public function users(){
    //     return $this->belongsToMany(User::class,'incidentusers');
    // }


    // public function incidentUsers(){
    //     return $this->hasMany(Incident::class,'user_id' );
    // }

    // public function user(){
    //     return $this->hasMany(User::class,'incident_id');
    // }



    // public function latestStatus() {
    //     return $this->users()->latest();
    // }


    public function users(){
        return $this->belongsToMany(User::class,'incidentusers')->withTimestamps();
    }

    public function latestStatus() {
        return $this->users()->latest();
    }
}
