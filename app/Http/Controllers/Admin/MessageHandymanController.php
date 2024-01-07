<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MessageHandyman;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\ContactMessages;
use Carbon\Carbon;

class MessageHandymanController extends Controller
{
    public function MessageFunction(){

        try{

            $data['title'] = "Send HandyMan a quick message";
            $data['handymen'] = User::where('role_as', '0')->latest()->get();
            return view('admin.messages.index', $data);


        }catch(Exception $errors){

            Log::error($errors);
        }
    }


    public function createMessage(Request $request){

        //check if this user exists
        $getId = $request->userId;
        $getEmail = User::findOrFail($getId);

    
        $custEmail = new MessageHandyman();
        $custEmail->userId = $request->userId;
        $custEmail->subject = $request->subject;
        $custEmail->status = $request->status;
        $custEmail->email = $getEmail->email;
        $custEmail->message = $request->message;
        $custEmail->save();

        if($custEmail != null)
        {
            MailController::SendCustomEmail($custEmail->email, $custEmail->status, $custEmail->subject, $custEmail->message);
            return redirect('/admin/message-handyman')->with('message', 'Email Message Sent Successfully');
        }

    }


    public function sendMessage(int $handymanId){
        try{

            $data['title'] = "Send a quick message";
            $data['handyId'] = User::findOrfail($handymanId);
            //$data['handymen'] = User::where('role_as', '0')->latest()->get();
            return view('admin.messages.send_slected', $data);


        }catch(Exception $errors){

            Log::error($errors);
        }
    }



    public function MessageSelected(Request $request, int $handymanId)
    {
        //check if this user exists
        //$getId = $request->userId;
        $getEmail = User::findOrFail($handymanId);

        $custEmail = new MessageHandyman();
        $custEmail->userId = $request->userId;
        $custEmail->subject = $request->subject;
        $custEmail->status = $request->status;
        $custEmail->email = $getEmail->email;
        $custEmail->message = $request->message;
        $custEmail->save();

        if($custEmail != null)
        {
            MailController::SendCustomEmail($custEmail->email, $custEmail->status, $custEmail->subject, $custEmail->message);
            return redirect('/admin/job-contacted')->with('message', 'Email Message Sent Successfully');
        }
        else{

            return redirect('/admin/job-contacted')->with('error', 'Something went wrong');
        }
 
    }





    public function MessageContacted(){

        try{

            $data['title'] = "List of all message from contact us page";
            $data['contact'] = ContactMessages::latest()->get();
            return view('admin.messages.contactmessage', $data);


        }catch(Exception $errors){

            Log::error($errors);
        }
    }


    public function fetchMessage(int $messageId){

        try{

            $getMessage = ContactMessages::findOrFail($messageId);
            if($getMessage){

                return response()->json([

                    'status' => 200,
                    'messages' => $getMessage
                ]);

            }else{

                return response()->json([

                    'status' => 404,
                    'messages' => 'Sorry ID Not Found'
                ]);
            }

        }
        catch(Exception $e){

            Log::error($e);
        }
    }


    //View all messages sent to handyMen
    public function viewAllSentHandymanMessages(){

        try{

            $data['title'] = "Sent Messages to HandyMen";
            $data['listing'] = MessageHandyman::latest()->get();
            return view('admin.messages.sent_hanyman_message', $data);


        }catch(Exception $errors){

            Log::error($errors);
        }
    }


    public function fetchSentMessage(int $sentId){

        try{

            $getSent = MessageHandyman::findOrFail($sentId);
            if($getSent){

                return response()->json([

                    'status' => 200,
                    'sent' => $getSent
                ]);

            }else{

                return response()->json([

                    'status' => 404,
                    'sent' => 'Sorry ID Not Found'
                ]);
            }

        }
        catch(Exception $e){

            Log::error($e);
        }

    }




    //reply sent contacted message from website
    public function replyMessageContacted(int $replyId){

        try{
            
            $data['title'] = "Reply Contacted Message";
            $data['replyId'] = ContactMessages::findOrFail($replyId);
            return view('admin.messages.reply_contacted_message', $data);


        }catch(Exception $errors){

            Log::error($errors);
        }

    }

    //Send a reply to the contacted email
    public function sendReply(Request $request, int $replyId){

        $theReply = ContactMessages::findOrFail($replyId);
        $theReply->replied_message = $request->replied_message;
        $theReply->email = $request->email;
        $theReply->replied = 1;
        $theReply->date_replied = Carbon::now();
        $theReply->save();
        if($theReply->replied_message != null){

            MailController::SendContactMessageEmail($theReply->email, $theReply->subject, $theReply->message, $theReply->name, $theReply->replied_message);
            return back()->with('message', 'Reply Sent Successfully');

        }else{

            return back()->with('error', 'Something went wrong');

        }



    }




}
