<?php

namespace App\Http\Controllers\Handyman;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        try{

            $data['title'] = "My Dashboard";
            $data['time'] = Carbon::now();
            $data['handyman'] = User::where('id', Auth::user()->id)->first();
            return view('handyman.index', $data);


        }
        catch(Exception $e){

            Log::error($e);
        }
    }


    public function postJob(){

        try{

            $data['title'] = "Post a Job";
            $data['time'] = Carbon::now();
            $data['handyman'] = User::where('id', Auth::user()->id)->first();
            return view('handyman.post_job', $data);

            
        }
        catch(Exception $e)
        {
            Log::error($e);
        }

    }


    public function viewProfile(){

        try{

            $data['title'] = "Profile";
            $data['time'] = Carbon::now();
            $data['handyman'] = User::where('id', Auth::user()->id)->first();
            return view('handyman.profile', $data);

            
        }
        catch(Exception $e)
        {
            Log::error($e);
        }


    }




}
