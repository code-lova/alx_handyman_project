<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HandyMenListController extends Controller
{
    public function index(){

        $data['title'] = "List of all handy men";
        $data['list'] = User::orderBy('created_at', 'DESC')->latest()->get();
        return view('admin.handymen.index', $data);
        
    }


    public function deleteHandyMan(int $userId) {
        
        $delHandyman = User::findOrFail($userId);
        if($delHandyman){

            $delHandyman->delete();
            return redirect()->back()->with('message', 'User deleted successfully..');
        }
        else{
            return redirect()->back()->with('error', 'User Id not found.');
        }

    }



    public function editProfile(int $id){

        try{

            $handyMan = $data['userProfile'] = User::findOrFail($id);

            $data['jobListing'] = Jobs::where('userId', $id)->latest()->get();

            $data['countJobPosted'] = Jobs::where('userId', $id)->count();

            return view('admin.handymen.edit_profile', $data);

        }catch(Exception $e){

            Log::error($e);
        }

    }



    public function UpdateHandymanProfile(Request $request, int $profileId)
    {
        try{

            $validator = Validator::make($request->all(), [

                'name' => 'required|string',
                'email' => 'required|max:255',
                'username' => 'required|string',
                'location' => 'required|string|max:100',
                'phone' => 'required|string|max:100',
                'state'=> 'string|max:100|nullable',
                'gender'=> 'required',
                'education'=> 'string|max:200|nullable',
                'description'=> 'string|max:2000|nullable',
                'short_description'=> 'string|max:500|nullable',
                'fb_link'=> 'string|max:100|nullable',
                'x_link'=> 'string|max:100|nullable',
                'linkedin_link'=> 'string|max:100|nullable',
            ]);


            if($validator->fails())
            {
                return response()->json([
                    'status' => 400,
                    'message' => $validator->errors()->first()
                ]);
            }
            else{


                $updateProfile = User::findOrFail($profileId);
                $updateProfile->name = $request->name;
                $updateProfile->email = $request->email;
                $updateProfile->username = $request->username;
                $updateProfile->location = $request->location;
                $updateProfile->phone = $request->phone;
                $updateProfile->state = $request->state;
                $updateProfile->gender = $request->gender;
                $updateProfile->url = $request->url;
                $updateProfile->marital_status = $request->marital_status;
                $updateProfile->birth_date = $request->birth_date;                
                $updateProfile->education = $request->education;
                $updateProfile->description = $request->description;
                $updateProfile->short_description = $request->short_description;
                $updateProfile->fb_link = $request->fb_link;
                $updateProfile->x_link = $request->x_link;
                $updateProfile->linkedin_link = $request->linkedin_link;
                $updateProfile->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Profile Updated Successfully'
                ]);


            }

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }




    public function BlockUser(int $id)
    {
        try{

            $blockUser = User::findOrFail($id);
            $blockUser->is_active = 0;
            $blockUser->save();
            return response()->json([
                'status'=>200,
                'message'=>'Profile Blocked Successfully',
            ]);
        }
        catch(Exception $e)
        {
            Log::error($e);
        }

       
    }


    public function UnBlockUser(int $id)
    {

        try{

            $unblockUser = User::findOrFail($id);
            $unblockUser->is_active = 1;
            $unblockUser->save();
            return response()->json([
                'status'=>200,
                'message'=>'Profile UnBlocked Successfully',
            ]);

        }
        catch(Exception $e)
        {
            Log::error($e);
        }

        
    }



    public function viewFullDetails(int $id){

        try{

            $job = $data['jobDetails'] = Jobs::findOrFail($id);
            if ($job)
            {
                $data['details'] = User::where('id', $job->userId)->first();
                $data['title'] = "View Full Details of Job Posted";
                return view('admin.handymen.view_details', $data);
            }



            

        }catch(Exception $e)
        {
            Log::error($e);
        }
    }





}
