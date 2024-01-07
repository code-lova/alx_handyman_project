<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function Currency()
    {
        try{

            $data['title'] = "Currency for Handyman";
            $data['currency'] = Currency::all();
            return view('admin.settings.currency', $data);

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }



    public function ChanegCurrency(int $currencyId)
    {
        $data = Currency::all();
        foreach ($data as $datas)
        {
            $datas->status = 0;
            $datas->save();
        }
        $default = Currency::find($currencyId);
        if($default)
        {
            $default->status = 1;
            $default->save();
            return response()->json([
                'status'=>200,
                'message'=>'Currency Was Updated Successfully',
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Currency ID not Found',
            ]);
        }
    }


}
