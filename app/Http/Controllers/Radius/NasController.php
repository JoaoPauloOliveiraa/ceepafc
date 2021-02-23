<?php

namespace App\Http\Controllers\Radius;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nas;
use Illuminate\Support\Facades\DB;

class NasController extends Controller
{
    public function index(){
        $nas = DB::table('nas')->get();
        return view('admin.nas.index', [
            'nas' => $nas
        ]);
    }

    public function register(){
        return view('admin.nas.register');
    }
    
    public function create(Request $request){
       
        $request->validate([
                'nasname' => 'required|string|max:15|unique:nas|ipv4',
                'shortname' => 'required|string|max:100',
                'secret' => 'required|string|',
                'description' => 'nullable|string|max:255',
                ], 
                [
                'nasname.required' => 'O campo IP não pode ser vazio',
                'nasname.max' => 'O IP deve possuir no maximo 12 caracteres',
                'nasname.unique' => 'IP ja esta sendo utilizado',
                'nasname.ipv4' => 'Insira um IP válido',
                'shortname.required' => 'O nome da Routerbard não pode ser vazio',
                'shortname.max' => 'O Nome deve conter no máximo 100 caracteres',
                'secret.required' => 'O campo senha não pode ser vazio',
                'description.max' => 'A descrição deve conter no maximo 255 caracteres',
                ]);
                
        $nas = Nas::create([
            'nasname' => $request->nasname,
            'shortname' => $request->shortname,
            'type' => 'other',
            'secret' => $request->secret,
            'description' => $request->description,
        ]);
            
        return redirect('nas')->with('success', 'Routeboard cadastrada com sucesso!');
    }         
            
             
      
    
    public function remove($id){
        
        Nas::destroy($id);
        
         return redirect('nas')->with('deleted', 'Routeboard excluída com sucesso!');
    }
}
