<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class incidentuser extends Model
{
    protected $fillable=[
        'user_id',
        'incident_id'
        ];
}
