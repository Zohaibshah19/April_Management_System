<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['name','status'];


    public function tasksCategory(){
        return $this->hasOne(Task::class,'category_id');
    }
}
