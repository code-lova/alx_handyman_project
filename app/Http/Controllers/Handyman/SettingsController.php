<?php

namespace App\Http\Controllers\Handyman;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function createPage(){

        try{

            $data['title'] = "Profile";
            $data['time'] = Carbon::now();
            $data['handyman'] = User::where('id', Auth::user()->id)->first();
            return view('handyman.settings.index', $data);
        }
        catch(Exception $e)
        {
            Log::error($e);
        }


    }

}
