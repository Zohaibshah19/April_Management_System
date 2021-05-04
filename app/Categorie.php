<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['name','status','parent_id'];


    public function tasksCategory(){
        return $this->hasOne(Task::class,'category_id');
    }

    public function children(){
        return $this->hasOne(Categorie::class,'parent_id');
    }

    public function parent()
    {
    return $this->belongsTo(Categorie::class,'parent_id'); // try category_id
    }

    public function userCategory(){
        return $this->hasOne(Incident::class,'category_id');
    }
}
