<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendSignUpEmail;
use App\Mail\SendSuccessEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function SendSignUpEmail($name, $email, $verification_code){

        $data = [

            'name' => $name,
            'verification_code' => $verification_code

        ];

        Mail::to($email)->send(new SendSignUpEmail($data));
    }


    public static function SendSuccessEmail($name, $email, $username){

        $data = [

            'name' => $name,
            'username' => $username

        ];

        Mail::to($email)->send(new SendSuccessEmail($data));
    }
}
