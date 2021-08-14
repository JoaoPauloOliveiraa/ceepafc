<?php

namespace App\Http\Controllers\Hotspot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotspotController extends Controller
{
    public function index(Request $request){
        return view('hotspot.register');
    }

    public function redirectToLogin(){
        return view('hotspot.redirect');
    }

    public function login(Request $request){
    $ip = $request->ip();
    if($ip != ""){
        $partsIP = explode(".", $ip);
        if($partsIP[1] == 16){
            return redirect()->to("http://172.16.0.1");
        }
        else if($partsIP[1] == 17){
            return redirect()->to("http://172.17.0.1");
        }
        return redirect(route('hotspot'));
    }
    return redirect(route('hotspot'));
    }
}
