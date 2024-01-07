<?php

namespace App\Http\Controllers;

use App\Mail\CustomEmail;
use Illuminate\Http\Request;
use App\Mail\SendSignUpEmail;
use App\Mail\SendSuccessEmail;
use App\Mail\ReplyContactedMessage;
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


    public static function SendCustomEmail($email, $subject, $status, $message)
    {
        $data = [
            'subject' => $subject,
            'status' => $status,
            'message' => $message
        ];

        Mail::to($email)->send(new CustomEmail($data));
    }


    public static function SendContactMessageEmail($email, $subject, $message, $name, $replied_message){

        $data = [

            'name' => $name,
            'subject' => $subject,
            'message' => $message,
            'replied_message' => $replied_message
        ];

        Mail::to($email)->send(new ReplyContactedMessage($data));

    }




}
