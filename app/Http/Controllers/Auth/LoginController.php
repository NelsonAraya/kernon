<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.login');
    }
    
    public function login(){

       $credentials= $this->validate(request(),[
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);
        
        /*
        * Limpiar run y dividir en ID y DV
        */
        
        $credentials['id'] = str_replace('.','',$credentials['run']);
        $credentials['id'] = str_replace('-','',$credentials['run']);

        unset($credentials['run']);
        
        $credentials['dv'] = substr($credentials['id'], -1);
        $credentials['id'] = substr($credentials['id'], 0, -1);
        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }else{
            return back()
                ->withErrors([$this->username() => trans('auth.failed')])
                ->withInput(request([$this->username()]));
        }
    }
    public function username(){
        return 'run';
    }
}
