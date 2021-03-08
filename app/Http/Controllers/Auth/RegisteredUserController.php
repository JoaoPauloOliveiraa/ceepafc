<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Radcheck;
use App\Models\Radcheckgroup;
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
                'email' => 'required|string|email|max:255|unique:user',
                'cpf' => 'required|string|digits:11|unique:user',
                'birthdate' => 'required|date',
                'password' => 'required|string|confirmed|min:8',
                ]);
            
            $user = new User;
            $user -> name = $request->name;
            $user -> email = $request->email;
            $user -> cpf = $request->cpf;
            $user -> birth_date = $request->birthdate;
            $user -> password = Hash::make($request->password);
            $user -> Save();
            
            $userId = User::where('email', $request->email)->first();
            if($userId->id){

            $radcheck = new Radcheck;
            $radcheck -> user_id = $userId->id;
            $radcheck -> UserName = $request->cpf;
            $radcheck -> Attribute = "SHA2-Password";
            $radcheck -> Value = hash('sha256', $request->password);            
            $radcheck -> Save();
            return redirect (route('login'))->with('success', 'Usuario cadastrado com sucesso');
            }
            else{
                return redirect (route('register'))->with('fail', 'Não foi possivel cadastrar usuário');
            }
        
        }
}   