<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|max:14|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'location' => 'required'

        ]);

        if($validator->fails()){

            return redirect()->back();
        }else{

            $pass = substr(str_shuffle("0123456789ABCDEFGHIJKLMONPQRSTUVWXYZ"), 0, 6);
            $users = new User();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->username = $request->username;
            $users->location = $request->location;
            $users->phone = $request->phone;
            $users->password = Hash::make($request->password);
            $users->verification_code = $pass;
            $users->save();

            if($users != null){

                MailController::SendSignUpEmail($users->name, $users->email, $users->verification_code);
                return redirect('/verification')->with('message','Check Your Email for OTP Verification Code');
            }

        }
    }



    public function verifyPage(){
        return view('auth.validate');
    }



    public function verifyNow(Request $request){
        $data = \Illuminate\Support\Facades\Request::get('otp');
        $users = User::where(['verification_code' => $data])->orderBy('created_at','DESC')->limit(1)->first();
        if($users != null){
            $users->email_status = 1;
            $users->save();
            if($users->email_status == 1){
                MailController::SendSuccessEmail($users->name, $users->email, $users->username);
            }
            return redirect()->route('login')->with('message','Account Verified Successfully');
        }
        else{
             return redirect()->back()->with('error','Verification OTP is Invalid');
        }
    }






}
