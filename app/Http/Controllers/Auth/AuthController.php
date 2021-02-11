<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\carbon;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'cpf' => 'required|string|digits:11',
            'birthdate' => 'required',
            'password' => 'required|string|confirmed|min:8',
            'terms' => 'accepted'
        ]);
        
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'birth_date' => Carbon::parse($request->birthdate)->format('Y-m-d'),
            'password' => Hash::make($request->password),
        ]);
        
        if($user){
            return redirect (route('login'))->with('success', trans('Usuario criado com sucesso'));
        }
        else{
            echo 'Ocorreu um erro, tente novamente em alguns minutos';
        }
    }
}