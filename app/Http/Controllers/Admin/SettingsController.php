<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function SiteSetting()
    {
        try{
            $data['title'] = "HandyMan Application @TNT";
            $data['settings'] = Settings::findOrFail(1);
            return view('admin.settings.site-settings', $data);
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }


    public function create( Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'app_name' => 'required|max:255',
            'app_desc' => 'required',
            'tawk_id' => 'string',
            'email' => 'required|string',
            'mobile' => 'required',
            'address' => 'required',
            'keywords' => 'string',
            'working_hours'=> 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'msg'=>$validator->errors()->first()
            ]);
        }
        else{
            $settings = Settings::where('id', '1')->first();
            if($settings)
            {
                $settings->title = $request->title;
                $settings->app_name = $request->app_name;
                $settings->app_desc = $request->app_desc;
                $settings->keywords = $request->keywords;
                $settings->tawk_id = $request->tawk_id;
                $settings->email = $request->email;
                $settings->mobile = $request->mobile;
                $settings->address = $request->address;
                $settings->working_hours = $request->working_hours;
                $settings->payment = $request->payment == true ? '1':'0';
                $settings->registration = $request->registration == true ? '1':'0';
                $settings->email_notify = $request->email_notify == true ? '1':'0';
                $settings->handyman = $request->handyman == true ? '1':'0';
                $settings->pricing = $request->pricing == true ? '1':'0';
                $settings->testimony = $request->testimony == true ? '1':'0';

                $settings->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Site Settings Updated Successfully',
                ]);
            }
            else
            {
                $settings = new Settings;
                $settings->title = $request->title;
                $settings->app_name = $request->app_name;
                $settings->app_desc = $request->app_desc;
                $settings->keywords = $request->keywords;
                $settings->tawk_id = $request->tawk_id;
                $settings->email = $request->email;
                $settings->mobile = $request->mobile;
                $settings->address = $request->address;
                $settings->working_hours = $request->working_hours;
                $settings->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Site Settings Created Successfully',
                ]);
            }
        }
    }



    public function AccountSetting()
    {
        try{

            $data['title'] = 'Administrator Account Settings';
            $data['user'] = User::where('id',Auth::user()->id)->first();
            return view('admin.settings.account', $data);

        }
        catch(Exception $e){
            Log::error($e);
        }
       
    }




    public function UpdateAccount(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'oldpassword'=>'required',
            'password'=>'min:6|max:20|confirmed'

        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'message'=>$validator->errors()->first()
            ]);
        }
        else
        {
            $update = User::find(Auth::user()->id);
            if($update)
            {
                //Check if the password provided is same with the 
                //password in the database
                if(Hash::check($request->oldpassword, $update->password))
                {
                    //if true Update the old password from the database with the new password
                    //provided
                    $update->password=Hash::make($request->password);
                    $update->update();
                    return response()->json([
                        'status'=>200,
                        'message'=>'Account Updated Successfully',
                    ]);
                }
                else{
                    return response()->json([
                        'status'=>403,
                        'message'=>'Current Password Does not Match',
                    ]);
                }
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'User Record Not Found',
                ]);
            }

        }
    }







}
