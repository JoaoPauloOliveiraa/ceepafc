<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Radcheck;
use App\Models\Radcheckgroup;
use App\Models\Radusergroup;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('hotspot.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
        {
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'cpf' => 'required|string|cpf|unique:users',
                'birthdate' => 'required|date|before:-13 years',
                'password' => 'required|string|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,10}$/',
            ],
            [
                'name.required' => 'O nome não pode ser vazio!',
                'name.string' => 'O nome não pode ser um número!',
                'name.max' => 'O nome deve conter no máximo 255 caracteres!',
                'email.required' => 'O campo e-mail é obrigatório!',
                'email.string' => 'Insira um e-mail válido!',
                'email.email' => 'Insira um e-mail válido!',
                'email.max' => 'E-mail deve conter no máximo 255 caracteres!',
                'email.unique' => 'Este e-mail já está cadatrado!',
                'cpf.required' => 'CPF é obrigatŕio!',
                'cpf.string' => 'Insira um cpf válido!',
                'cpf.cpf' => 'Insira um cpf válido!',
                'cpf.unique' => 'O cpf já está cadastrado!',
                'birthdate.before' => 'O usuário deve ter no mínimo 13 anos para se cadastrar!',
                'birthdate.required' => 'A data de nascimento não pode ser em branco!',
                'birthdate.date' => 'Data de nascimento inválida!',
                'password.required' => 'A senha não pode ser vazia!',
                'password.string' => 'Senha inválida!',
                'password.confirmed' => 'Senhas não conferem!',
                'password.regex' => 'A senha deve conter de 6 a 10 caracteres com pelo menos 1 letra e 1 número!',
            ]

            );

            
            $user = new User;
            $user -> name = $request->name;
            $user -> email = $request->email;
            $user -> cpf = $request->cpf;
            $user -> birth_date = $request->birthdate;
            $user -> password = Hash::make($request->password);
            $user -> radgroupcheck_id = 1;
            $user -> Save();
            
            $userId = User::where('email', $request->email)->first();
            if($userId->id){
                $radusergroup = new Radusergroup;
                $radusergroup -> username = $request->cpf;
                $radusergroup -> groupname = "Visitantes";
                $radusergroup -> Save();
                
                $userName = Radusergroup::where('username', $request->cpf)->first();

                if($userId->id && $userName->username){
                $radcheck = new Radcheck;
                $radcheck -> user_id = $userId->id;
                $radcheck -> username = $request->cpf;
                $radcheck -> Attribute = "SHA2-Password";
                $radcheck -> Value = hash('sha256', $request->password);            
                $radcheck -> Save();
                return redirect()->to("http://172.168.0.1")->send();
                }
            }
            else{
                return redirect (route('register'))->with('fail', 'Não foi possivel cadastrar usuário');
            }
        
        }
}   