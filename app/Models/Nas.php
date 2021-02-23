<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nas extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    protected $table = 'nas';
    
    protected $fillable = [
        'nasname',
        'shortname',
        'secret',
        'description',
    ];
    
    
    
}
