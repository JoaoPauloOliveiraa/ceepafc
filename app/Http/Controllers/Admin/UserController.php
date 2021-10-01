<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Radusergroup;
use App\Models\Radgroupcheck;
use App\Models\Radacct;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon as Carbon;

class UserController extends Controller
{
    public function index(){
        
        $users = User::where('admin', 0)->get();
        return view('admin.users.index', [
            'users' => $users
        ]);
            
    }

    public function newAdmin(){
        
    }

    public function online(){
        $online = Radacct::where('acctstoptime', null)->get();

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
        $group = Radusergroup::where('username', $user->cpf)->first();

        if($user){    
            if(!$user->root){
                return view('admin.users.details', [
                    'user' => $user,
                    'group' => $group
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
                $user->Save();
                return redirect('users')->with('blocked', 'Usuário blockeado!');
            }else{
                return redirect('users')->with('notblock', 'Não é possivel bloquear o usuário '. $user->name);
            }
        }
        else{
        $user->block = 0;
        $user->Save();
        return redirect('users')->with('unblocked', 'Usuário desbloqueado com sucesso!');
        }
    }

    public function profileAdmin(){
        $admin = User::where('admin', 1)->get()->first();
        return view('admin.users.profile',['admin' => $admin]);
    }

    public function updateAdmin(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required',
        ], 
        [
            'name.required' => 'O nome não pode ser vazio!',
            'name.string' => 'Nome inválido!',
            'name.max' => 'O Nome deve conter no maximo 255 caracteres',
            'password.required' => 'O Campo senha precisa ser preenchido',
            'password.string' => 'A senha deve conter no mínimo 8 caracteres alfanuméricos',
            'password.min' => 'A senha deve conter no mínimo 8 caracteres alfanuméricos',
            'password.confirmed' => 'As senhas não conferem!',
            'password_confirmation.required' => 'Por favor confirme a senha!'
        ]);
        
        $admin = User::find($id);
        if($admin){
            $admin -> name = $request->name;
            $admin -> password = Hash::make($request->password);
            $admin -> Save();
            return redirect('users')->with('success', 'Os dados do administrador foram alterados com sucesso');
        }
        return redirect('users')->with('blocked', 'Os dados do administrador não foram atualizados');
    }

    public function approveUser($id){
        $user = User::find($id);
        if(!$user || $user->admin == 1){
            return redirect('users')->with('fails', 'Usuário não existe!');    
        }
        $groups = Radgroupcheck::all();
        return view('admin.users.approve',[
        'user' => $user,
        'groups' => $groups
        ]);
    }

    public function updateApprove(Request $request, $id){
        $user = User::find($id);
        if(!$user || $user->admin){
            return redirect('users')->with('fails', 'Usuário não existe!');    
        }
        $group_id = Radgroupcheck::where('groupname', $request->group)->first();
        if($group_id){
            User::where('id', $user->id)->update(['radgroupcheck_id' => $group_id->id]);
            Radusergroup::where('username', $user->cpf)->update(['groupname' => $group_id->groupname]);
            return redirect('users')->with('success', 'O grupo do usuário foi atualizado com sucesso!');
        }
        return redirect('users')->with('fails', 'O grupo informado não existe!');    
    }

}
