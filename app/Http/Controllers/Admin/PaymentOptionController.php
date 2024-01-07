<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Models\PaymentOption;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PaymentOptionController extends Controller
{
    Public function PaymentOptionPage()
    {
        try{

            $data['title'] = 'Payment Option Page';
            $data['payment'] = PaymentOption::latest()->paginate(5);
            return view('admin.payment-option.index', $data);
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
        
    }

    public function StorePaymentOption(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_name'=> 'required',
            'payment_details'=> 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'message'=>$validator->errors()->first()
            ]);
        }
        else{

            $Poption = new PaymentOption();
            $Poption->payment_name = $request->payment_name;
            $Poption->payment_details = $request->payment_details;
            $Poption->save();
            return response()->json([
                'status'=>200,
                'message'=>'Payment Option Created Successfully',
            ]);
        }
    }



    public function FetchPaymentOption(int $id)
    {
        try{

            $PaymentOpt = PaymentOption::findOrFail($id);
            if($PaymentOpt)
            {
                return response()->json([
                    'status'=>200,
                    'option'=>$PaymentOpt,
                ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Payment Option ID not Found',
                ]);
            }

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
       

    }


    public function UpdatePaymentOption(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'payment_name'=> 'required',
            'payment_details'=> 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'message'=>$validator->errors()->first()
            ]);
        }
        else{

            $OptionID = PaymentOption::find($id);
            if($OptionID){
                $OptionID->payment_name = $request->payment_name;
                $OptionID->payment_details = $request->payment_details;
                $OptionID->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Payment Option Updated Successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Payment Option ID Not Found',
                ]);
            }

        }
    }



    

    public function activatePaymentOption(int $id)
    {
        try{

            $data = PaymentOption::all();
            foreach($data as $value){

                $value->status = 0;
                $value->save();
            }

            $OptionID = PaymentOption::findOrFail($id);
            if($OptionID)
            {
                $OptionID->status = 1;
                $OptionID->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Payment Option is now Active',
                ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Relative ID not Found',
                ]);
            }

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
       
    }




}
