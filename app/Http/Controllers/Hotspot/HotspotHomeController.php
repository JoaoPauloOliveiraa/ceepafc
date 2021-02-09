<?php

namespace App\Http\Controllers\Hotspot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotspotHomeController extends Controller
{
      public function index(){
        return view('hotspot.home');
    }
}
