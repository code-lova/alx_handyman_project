<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function Index(){

        try{

            return view('frontend.index');

        }catch(Exception $e){

            Log::error($e);
        }



    }
}
