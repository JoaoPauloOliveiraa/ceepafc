<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Radgroupreply;

class Radgroupcheck extends Model
{
    protected $table = 'radgroupcheck';
    public $timestamps = false;
    use HasFactory;
  
    
    public function user(){
        return $this->hasMany(User::class, 'radgroupcheck_id', 'id');
    }
}
