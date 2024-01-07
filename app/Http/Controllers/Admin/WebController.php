<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\LogoFavicon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
     //Log and Favicon

     public function LogoFavicon()
     {
        try{

            $data['logofav'] = LogoFavicon::find(1);
            $data['title'] = 'Logo & Favicon';
            return view('admin.web.logofavicon', $data);
        }
        catch(Exception $e){

            Log::error($e);
        }
         
     }
 
     public function logoFav(Request $request)
     {
         $validator = Validator::make($request->all(),[
             'logo' => 'mimes:png,jpg,jpeg',
             'favicon' => 'mimes:png,jpg,jpeg'
         ]);
 
         if($validator->fails())
         {
             return response()->json([
                 'status'=>400,
                 'msg'=>$validator->errors()->first()
             ]);
         }
         else{
             $logoFav = LogoFavicon::where('id', '1')->first();
             if($logoFav)
             {
                 if($request->hasFile('logo'))
                 {
                     $destination_path = 'uploads/logo/'.$logoFav->logo;
                     if(File::exists($destination_path))
                     {
                         File::delete($destination_path);
                     }
                     $file = $request->file('logo');
                     $filename = 'logo'. time() . '.' . $file->hashName();
                     $file->move('uploads/logo/', $filename);
                     $logoFav->logo = $filename;
                 }
 
                
                 if($request->hasFile('favicon'))
                 {
                     $destination_path = 'uploads/logo/'.$logoFav->favicon;
                     if(File::exists($destination_path))
                     {
                         File::delete($destination_path);
                     }
                     $file = $request->file('favicon');
                     $filename = 'favicon'. time() . '.' . $file->hashName();
                     $file->move('uploads/logo/', $filename);
                     $logoFav->favicon = $filename;
                 }
 
                 $logoFav->save();
                 return response()->json([
                     'status'=>200,
                     'message'=>'Logo & Favicon Settings Updated Successfully',
                 ]);
             }
             else
             {
                 $logoFav = new LogoFavicon;
                 if($request->hasFile('logo'))
                 {
                     $file = $request->file('logo');
                     $filename = 'logo'. time() . '.' . $file->hashName();
                     $file->move('uploads/logo/', $filename);
                     $logoFav->logo = $filename;
                 }
 
                 if($request->hasFile('favicon'))
                 {
                     $file = $request->file('favicon');
                     $filename = 'favicon'. time() . '.' . $file->hashName();
                     $file->move('uploads/logo/', $filename);
                     $logoFav->favicon = $filename;
                 }
                 $logoFav->save();
                 return response()->json([
                     'status'=>200,
                     'message'=>'Logo & Favicon Settings Added Successfully',
                 ]);
             }
         }
     }
}
