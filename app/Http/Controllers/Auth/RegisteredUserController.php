<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
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
                'cpf' => 'required|string|digits:11',
                'birthdate' => 'required|date',
                'password' => 'required|string|confirmed|min:8',
                ]);
            
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'cpf' => $request->cpf,
                'birth_date' =>$request->birthdate,
                'password' => Hash::make($request->password),
            ]);
            
            
             
            if($user){
                return redirect (route('login'))->with('success', trans('Usuario criado com sucesso'));
            }
            else{
                return redirect(route('404'));
            }
        
        }
}   