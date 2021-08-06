<?php

namespace App\Http\Controllers\Radius;
use App\Models\Radgroupcheck;
use App\Models\Radgroupreply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RadgroupreplyController extends Controller
{
    public function index(){
         
        $groups = Radgroupreply::where('attribute', 'Mikrotik-Rate-Limit')->get();
    
        return view('admin.groups.index',[
            'groups' => $groups
            ]);
    }
    
    public function register(){
        return view('admin.groups.registerGroup');
    }
    
    public function create(Request $request){
            $request->validate(
                [
                'name' => 'required|regex:/^[a-zA-Z].*/|unique:radgroupcheck,groupname|max:100',       
                'down' => 'required|max:999|numeric|gt:0',
                'up'   => 'required|max:999|numeric|gt:0',
                'downvel' => 'required|in:K,M',
                'upvel' => 'required|in:K,M',
                ], 
                [
                'name.regex' => 'Nome deve iniciar com letras!',
                'name.unique' => 'Já existe um grupo com esse nome!',
                'name.required' => 'Nome não pode ser em branco!',
                'name.max' => 'O nome deve conter no maximo 100 caracteres!',
                
                'down.required' => 'O valor não pode ser em branco!',
                'down.numeric' => 'Insira um valor válido!',
                'down.gt' => 'Insira um valora válido!',
                'down.max' => 'Velocidade de download inválida!',
                
                'downvel.in' => 'Valor deve ser em Kbps ou Mbps!',
                'downvel.required' => 'O Valor deve ser preenchido!',
                
                'upvel.in' => 'Valor deve ser em Kbps ou Mbps!',
                'upvel.required' => 'O Valor deve ser preenchido!',
                
                'up.required' => 'O valor não pode ser em branco!',
                'up.numeric' => 'Insira um valor válido!',
                'up.gt' => 'Insira um valora válido!',
                'up.max' => 'Velocidade de upload inválida!',
                ]);
                
            $groupNasPortType = new Radgroupcheck;
            $groupNasPortType->groupname = $request->name;
            $groupNasPortType->attribute = 'NAS-Port-Type';
            $groupNasPortType->op = '==';
            $groupNasPortType->value = 'Wireless-802.11';
            
            /*$groupNasIPAddress = new Radgroupcheck;
            $groupNasIPAddress->groupname = $request->name;
            $groupNasIPAddress->attribute = 'NAS-IP-Address'; 
            $groupNasIPAddress->op = '==';
            $groupNasIPAddress->value = '192.168.0.1';
            */
               
            $groupDownUp = new Radgroupreply;
            $groupDownUp->groupname = $request->name;
            $groupDownUp->attribute = 'Mikrotik-Rate-Limit';
            $groupDownUp->op = ':=';
            $groupDownUp->value = $request->down . $request->downvel .'/' . $request->up . $request->upvel;
            
            $groupInterval = new Radgroupreply;
            $groupInterval->groupname = $request->name;
            $groupInterval->attribute = 'Acct-Interim-Interval';
            $groupInterval->op = ':=';
            $groupInterval->value = '300';
            
            $groupPrimaryDnsServer = new Radgroupreply;
            $groupPrimaryDnsServer->groupname = $request->name;
            $groupPrimaryDnsServer->attribute = 'MS-Primary-DNS-Server';
            $groupPrimaryDnsServer->op = ':=';
            $groupPrimaryDnsServer->value = '1.1.1.3';
            
            $groupSecondaryDnsServer = new Radgroupreply;
            $groupSecondaryDnsServer->groupname = $request->name;
            $groupSecondaryDnsServer->attribute = 'MS-Secondary-DNS-Server';
            $groupSecondaryDnsServer->op = ':=';
            $groupSecondaryDnsServer->value = '1.0.0.3';
            
            if($groupNasPortType && $groupDownUp && $groupInterval && $groupPrimaryDnsServer && $groupSecondaryDnsServer){
            $groupNasPortType->save();
            $groupDownUp->save(); 
            $groupInterval->save();
            $groupPrimaryDnsServer->save();
            $groupSecondaryDnsServer->save();
            return redirect(route('groups'))->with('success', 'Grupo cadastrado com sucesso!');
            }
            
            return redirect(route('groups'))->with('fail', 'Não foi possivel cadastrar grupo!');
    }
    
    public function edit($id){
        
        $group = Radgroupreply::where('id', $id)
        ->where('attribute', 'Mikrotik-Rate-Limit')->first();
        
        if($group){
            return view('admin.groups.editgroup',[
            
            'group' => $group
            
            ]);
        }
            return redirect(route('groups'))->with('fail', 'O grupo não existe!');
    }
    
    public function update(Request $request, $id){
        $request->validate(
                [
                'down' => 'required|max:999|numeric|gt:0',
                'up'   => 'required|max:999|numeric|gt:0',
                'downvel' => 'required|in:K,M',
                'upvel' => 'required|in:K,M',
                ], 
                [
                'down.required' => 'O valor não pode ser em branco!',
                'down.numeric' => 'Insira um valor válido!',
                'down.gt' => 'Insira um valora válido!',
                'down.max' => 'Velocidade de download inválida!',
                
                'downvel.in' => 'Valor deve ser em Kbps ou Mbps!',
                'downvel.required' => 'O Valor deve ser preenchido!',
                
                'upvel.in' => 'Valor deve ser em Kbps ou Mbps!',
                'upvel.required' => 'O Valor deve ser preenchido!',
                
                'up.required' => 'O valor não pode ser em branco!',
                'up.numeric' => 'Insira um valor válido!',
                'up.gt' => 'Insira um valora válido!',
                'up.max' => 'Velocidade de upload inválida!',
                ]);
        $group = Radgroupreply::where('id', $id)
        ->where('attribute', 'Mikrotik-Rate-Limit')->first();
        
        if($group){
            $group->value = $request->down . $request->downvel .'/' . $request->up . $request->upvel;
            $group->Save();
            return redirect(route('groups'))->with('success', 'Grupo atualizado com sucesso!');
        }
        
        return redirect(route('groups'))->with('fail', 'O grupo não existe!');
        
    }
    
}
