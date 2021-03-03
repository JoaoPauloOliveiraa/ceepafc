<?php

namespace App\Http\Controllers\Radius;
use App\Models\Radgroupcheck;
use App\Models\Radgroupreply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RadgroupcheckController extends Controller
{
    public function index(){
        $groups = Radgroupcheck::all();
        $groups = Radgroupreply::where('Attribute', 'Mikrotik-Rate-Limit')->get();
        
        return view('admin.groups.index',[
            'groups' => $groups
            ]);
    }
    
    public function register(){
        return view('admin.groups.registerGroup');
    }
    
    public function create(Request $request){
        
    
             $request->validate([
                        
                'down' => 'required',
                'up' => 'required',
                'downvel' => 'required',
                'upvel' => 'required',
                ], 
                [
                'name.required' => 'O campo IP não pode ser vazio',
                'nasname.max' => 'O IP deve possuir no maximo 12 caracteres',
                ]);
            $group = new Radgroupcheck;
            
            $group->GroupName = $request->name;
               
            $groupDownUp = new Radgroupreply;
            $groupDownUp->GroupName = $request->name;
            $groupDownUp->Attribute = 'Mikrotik-Rate-Limit';
            $groupDownUp->op = ':=';
            $groupDownUp->Value = $request->down . $request->downvel .'/' . $request->up . $request->upvel;
            
            $groupInterval = new Radgroupreply;
            $groupInterval->GroupName = $request->name;
            $groupInterval->Attribute = 'Acct-Interim-Interval';
            $groupInterval->op = ':=';
            $groupInterval->Value = '300';
            
            
            $groupPrimaryDnsServer = new Radgroupreply;
            $groupPrimaryDnsServer->GroupName = $request->name;
            $groupPrimaryDnsServer->Attribute = 'MS-Primary-DNS-Server';
            $groupPrimaryDnsServer->op = ':=';
            $groupPrimaryDnsServer->Value = '1.1.1.3';
            
            $groupSecondaryDnsServer = new Radgroupreply;
            $groupSecondaryDnsServer->GroupName = $request->name;
            $groupSecondaryDnsServer->Attribute = 'MS-Secondary-DNS-Server';
            $groupSecondaryDnsServer->op = ':=';
            $groupSecondaryDnsServer->Value = '1.0.0.3';
            
            if($group && $groupDownUp && $groupInterval && $groupPrimaryDnsServer && $groupSecondaryDnsServer){
           
            $group->save();
            $groupDownUp->save(); 
            $groupInterval->save();
            $groupPrimaryDnsServer->save();
            $groupSecondaryDnsServer->save();
            
            return redirect(route('groups'))->with('success', 'Grupo cadastrado com sucesso!');
            }
            
    }
}
