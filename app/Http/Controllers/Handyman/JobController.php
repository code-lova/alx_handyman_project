<?php

namespace App\Http\Controllers\Handyman;

use Exception;
use Carbon\Carbon;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostJobFormRequest;
use App\Models\JobCategory;
use App\Models\JobTypes;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function postJob(){

        try{

            $data['title'] = "Post a Job";
            $data['time'] = Carbon::now();
            $data['handyman'] = User::where('id', Auth::user()->id)->first();
            $data['jobCategory'] = JobCategory::where('status', '1')->latest()->get();
            return view('handyman.jobPost.index', $data);

            
        }
        catch(Exception $e)
        {
            Log::error($e);
        }

    }


     //fetch all job type with job cat ID when job cat is selected
     public function fetchJobType(Request $request){

        $data['jobtype'] = JobTypes::where('catId',$request->job_category)->where('status','1')->get(['name','id']);

        return response()->json($data);
    }


    //Function to store Job Posting by handyman
    public function storeJobPosting(PostJobFormRequest $request)
    {
        try{

            $currenctTime = Carbon::now();
            $endDate = Carbon::now()->addMonth();

            $user = User::where('id', Auth::user()->id)->get();
            if(count($user) > 0){

                
                $validateData = $request->validated();

                $category = JobCategory::findOrFail($validateData['job_category']);
                if($category)
                {

                    $jobPosting = new Jobs();
                    $jobPosting->email = Auth::user()->email;
                    $jobPosting->userId = Auth::user()->id;
                    $jobPosting->job_title = $validateData['job_title'];
                    $jobPosting->job_location = $validateData['job_location'];
                    $jobPosting->job_type = $validateData['job_type'];
                    $jobPosting->job_category = $validateData['job_category'];
                    $jobPosting->job_description = $validateData['job_description'];
                    $jobPosting->url = $validateData['url'];
                    $jobPosting->expires_at = $endDate;
                    if($request->hasFile('image'))
                    {
                        $file = $request->file('image');
                        $filename = 'image_'. time() . '.' . $file->hashName();
                        $file->move('uploads/job_posting/', $filename);
                        $jobPosting->image = $filename;
                    }
                    $jobPosting->save();
                    return redirect('/handyman-app/dashboard')->with('message', 'Job Added Successfully');

                }
                else{
                    return redirect('handyman-app/post-job')->with('error', 'Category ID does not exist anymore');
                }

            }
            else{
                return redirect('handyman-app/post-job')->with('error', 'User is not recorgnized');
            }
            


        }
        catch(Exception $e)
        {
            Log::error($e);
        }

    }





    public function editJobPost(int $jobPostId)
    {
        try{

            $checkPost = Jobs::where('id', $jobPostId)->first();
            if($checkPost)
            {
                $data['title'] = "Edit Your Job Posting";
                $data['post'] = Jobs::where('id', $jobPostId)->get();
                return view('handyman.jobPost.edit_job_post', $data);
            }

        }catch(Exception $e)
        {
            Log::error($e);
        }
    }
}
