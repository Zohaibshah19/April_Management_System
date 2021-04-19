<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['name','description','category_id','status'];  
    
    

    public function category(){
        return $this->belongsTo(Categorie::class);
    }
}
