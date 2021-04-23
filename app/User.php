<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   // protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password','user_role','status','designation_id'
    ];

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

    // public function users(){
    //     return $this->belongsTo(User::class,'incidentusers');
    // }

    // public function incidentUsers(){
    //     return $this->hasMany(Incident::class,'user_id' );
    // }

    // public function incidents(){
    //     return $this->belongsToMany(Incident::class,'incidentusers');
    // }

    // public function incidents(){
    //     return $this->belongsTo(Incident::class,'incidentusers');
    // }

    // public function incidentUsers()
    //     {
    //         $this->BelongsTo('App\Incident');
    //     }

    // public function latestStatus() {
    //     return $this->users()->latest();
    // }


    public function incidents(){
        return $this->belongsToMany(Incident::class,'teachercourses')->withTimestamps();
    }

    public function latestStatus() {
        return $this->incidents()->latest();
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
