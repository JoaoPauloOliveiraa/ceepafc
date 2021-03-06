<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radgroupreply extends Model
{
    protected $table = 'radgroupreply';
    public $timestamps = false;
    use HasFactory;
    
    public function getValueAttribute()
    {
        $values = explode("/",$this->attributes["Value"]);
        
        if(str_contains($values[0], "M")){
           $value["download"] = str_replace("M", " Megabits", $values[0]);
           
            
        }else{
            $value["download"] = str_replace("K", " Kilobits", $values[0]);
           
        }
        
        if(str_contains($values[1], "M")){
           $value["upload"] = str_replace("M", " Megabits", $values[1]);
           
            
        }else{
            $value["upload"] = str_replace("K", " Kilobits", $values[1]);
           
        }
       return $value;
    }
    public function getVelocidadeAttribute(){
         $velocidades = explode("/",$this->attributes["Value"]);
         
         $velocidade["download"] = preg_replace("[M|K]","",$velocidades[0]);
         $velocidade["upload"] = preg_replace("[M|K]","",$velocidades[1]);
        //  $velocidade["download"] = intval($velocidade["download"]);
        //  $velocidade["upload"] = intval($velocidade["upload"]);
        //  dd($velocidade["download"]);
         
        return $velocidade;
    }
    
  }
