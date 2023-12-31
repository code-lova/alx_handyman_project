<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated(Request $request, $user)
    {
        if(Auth::user()->role_as == 1)
        {

            return redirect('admin/dashboard')->with('message', 'Welcome Back Admin');

        } elseif(Auth::user()->role_as == 0)
        {
            
            return redirect('/handyman-app/dashboard')->with('message', 'Login was Authorized');

        }
        else if(Auth::user()->role_as == 2)
        {
            return redirect('/customer/dashboard')->with('message', 'Login was Authorized');

        }

        else{
            return redirect('/');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
