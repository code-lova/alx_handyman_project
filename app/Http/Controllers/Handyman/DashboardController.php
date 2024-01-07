<?php

namespace App\Http\Controllers\Handyman;

use Exception;
use Carbon\Carbon;
use App\Models\Jobs;
use App\Models\User;
use App\Models\JobTypes;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index(){

        try{

            $data['title'] = "My Dashboard";
            $user = Auth::user()->id;
            $data['time'] = Carbon::now();
            $data['handyman'] = User::where('id', Auth::user()->id)->first();
            $data['listing'] = Jobs::where('userId', $user)->latest()->paginate(10);
            $data['jobCategory'] = JobCategory::where('status', '1')->latest()->get();
            $data['jobType'] = JobTypes::where('status', '1')->latest()->get();
            return view('handyman.index', $data);


        }
        catch(Exception $e){

            Log::error($e);
        }
    }

    //Function to fetch job category id if that job post was selected
    public function FetchJobPosting(int $id)
    {
        $job = Jobs::find($id);
        if($job)
        {
            return response()->json([
                'status'=>200,
                'job'=>$job,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'msg'=>'Product ID not Found',
            ]);
        }
    }


    //function to update handyman job post 
    public function updateJobPost(Request $request, int $id)
    {

        try{

            
            if(Auth::check())
            {
               
                $validator = Validator::make($request->all(), [
                    'image'=> 'nullable|mimes:png,jpg,jpeg|max:1024',
                    'url'=> 'nullable|string|url|max:100',
                    'job_title'=> 'required|string|max:100',
                    'job_location'=>'required|string',
                    'job_category'=>'required|integer',
                    'job_type'=>'required|integer',
                    'job_description'=>'required|string|max:1000',
                    
                ]);
        
                if($validator->fails())
                {
                    return response()->json([
                        'status'=>400,
                        'msg'=>$validator->errors()->first()
                    ]);
                }
                else{
        
                    $updateJobPost = Jobs::findOrfail($id);
                    if($updateJobPost){
        
                        $updateJobPost->url = $request->url;
                        $updateJobPost->job_title = $request->job_title;
                        $updateJobPost->job_location = $request->job_location;
                        $updateJobPost->job_category = $request->job_category;
                        $updateJobPost->job_type = $request->job_type;
                        $updateJobPost->job_description = $request->job_description;
                        if($request->hasFile('image'))
                        {
                            $destination_path = 'uploads/job_posting/'.$updateJobPost->image;
                            if(File::exists($destination_path))
                            {
                                File::delete($destination_path);
                            }
                            $file = $request->file('image');
                            $filename = 'image_'. time() . '.' . $file->hashName();
                            $file->move('uploads/job_posting/', $filename);
                            $updateJobPost->image = $filename;
                        }
                        $updateJobPost->save();
                        return response()->json([
                            'status'=>200,
                            'message'=>'Post was Updated Successfully',
                        ]);
                    }
                    else{
                        return response()->json([
                            'status'=>404,
                            'message'=>'Post ID Not Found',
                        ]);
                    }
        
                }
                
            }


        }
        catch(Exception $e)
        {
            Log::error($e);
        }

    }


    //Implement a function here that deletes each post after 30 days of posting.

    /**
     * 
     * 
     * 
     * IMPLEMENT FUNCTION HERE  LATER 
     * 
     * 
     * 
     * 
     * */






    //Function to make job post as filled
    public function makeJobPostFilled(int $id)
    {
        try{
            
            $OptionID = Jobs::findOrFail($id);
            if($OptionID)
            {
                $OptionID->filled = 1;
                $OptionID->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Job Post is now marked as filled',
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


    //Function to make job post as filled
    public function makeJobPostUnFilled(int $id)
    {
        try{
            
            $OptionID = Jobs::findOrFail($id);
            if($OptionID)
            {
                $OptionID->filled = 0;
                $OptionID->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'Job Post is now marked as Unfilled',
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

    

    public function destroyJobPost($id)
    {
        $job = Jobs::findOrfail($id);
        if($job)
        {
            $destination_path = 'uploads/job_posting/'.$job->image;
            if(File::exists($destination_path))
            {
                File::delete($destination_path);
            }
            $job->delete();
            // $product->orders()->delete();
            // $product->likes()->delete();
            // $product->stars()->delete();
            // $product->comments()->delete();
            return response()->json([
                'status'=>200,
                'msg'=>'Job Post Data Deleted Successfully',
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'msg'=>'Relative ID not Found',
            ]);
        }

    }


    
    

 



}
