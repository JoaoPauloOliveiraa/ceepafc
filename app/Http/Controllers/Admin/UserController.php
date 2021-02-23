<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon as Carbon;

class UserController extends Controller
{
    public function index(){
        $users = User::where('block', 0)->get();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function showAdmins(){
        $admins = DB::table('user')->where('admin', '1')->get();
        return view('admin.users.admins', [
            'admins' => $admins
        ]);
    }

    public function remove(){
        return ('admin remove');
    }
    
    public function show($id){
        $user = User::where('id', $id)->get()->first();
        return view('admin.users.details', [
            'user' => $user
        ]);
    }
    
    public function showBlockeds(){
        $users = User::where('block', 1)->get();
        return view('admin.users.blocked', [
        'users' => $users
        ]);
    }
    
    public function block($id){
        
        $user = User::find($id);
        if($user->block == 0){
        $user->block = 1;
        $user->save();
         return redirect('users')->with('blocked', 'Usuário blockeado!');
        }
        $user->block = 0;
        $user->save();
        return redirect('users')->with('unblocked', 'Usuário desbloqueado com sucesso!');
    }
    
}
