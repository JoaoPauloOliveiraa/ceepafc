<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radcheck extends Model
{
    protected $table = 'radcheck';
    public $timestamps = false;
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
