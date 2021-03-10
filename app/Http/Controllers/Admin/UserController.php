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
        
        $users = User::where(function($query) {
                $query->where('root', 0)
                      ->where('block', 0);
            })->get();
        
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
        if($user){    
            if(!$user->root){
                return view('admin.users.details', [
                    'user' => $user
                ]);
            }else{
                return redirect('users')->with('notblock', 'Não é possivel ver detalhes de '. $user->name);
            }
        }

        return redirect('users')->with('notblock', 'Usuário não encontardo!');
    }
    
    public function showBlockeds(){
        
        $users = User::where('block', 1)->get();
        return view('admin.users.blocked', [
        'users' => $users
        ]);
    }
    
    public function block($id){
        
        $user = User::find($id);
        
        
        
        if(!$user->block){
            if(!$user->root){
                $user->block = 1;
                $user->save();
                return redirect('users')->with('blocked', 'Usuário blockeado!');
            }else{
                return redirect('users')->with('notblock', 'Não é possivel bloquear o usuário '. $user->name);
            }
        }
        else{
        $user->block = 0;
        $user->save();
        return redirect('users')->with('unblocked', 'Usuário desbloqueado com sucesso!');
        }
    }
}
