<?php

namespace App\Http\Controllers\Radius;

use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nas;
use Illuminate\Support\Facades\DB;
use RouterOS\Client;

use Symfony\Component\Process\Process;



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
        // TENTAR DEPOIS
        // if($nas){
        //     $process = new Process(['/usr/bin/freeradius_restart.sh']);
        //     $process->run(); 
        //     if (!$process->isSuccessful()) {
        //         throw new ProcessFailedException($process);
        //     }
            
        //     echo $process->getOutput();         
        // }
        return redirect('nas')->with('success', 'Routeboard cadastrada com sucesso!');
    }         
             
    public function remove($id){
        
        Nas::destroy($id);
        
         return redirect('nas')->with('deleted', 'Routeboard excluída com sucesso!');
    }

    public function routerboard(){
        $client = new Client([
            'host' => env('MK_HOST'),
            'user' => env('MK_USER'),
            'pass' => env('MK_PASS'),
            'port' => env('MK_PORT'),
        ]);
    }

    
}
