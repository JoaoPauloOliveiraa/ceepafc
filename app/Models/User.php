<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    
    
    use HasFactory, Notifiable;

   
    protected $table = 'users';  

    
    protected $fillable = [
        'name',
        'email',
        'cpf',
        'birth_date',
        'password',
    ];

   
    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes["birth_date"])->age;
    }

    public function group()
    {
        return $this->belongsTo(Radgroupcheck::class, 'radgroupcheck_id', 'id');
    }

    public function radcheck(){
        return $this->hasOne(Radcheck::class, 'user_id', 'id');
    }

}
