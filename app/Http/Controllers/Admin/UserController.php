<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
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
}
