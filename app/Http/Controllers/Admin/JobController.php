<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Jobs;
use App\Models\JobTypes;
use App\Models\JobCategory;
use Illuminate\Support\Str;
use App\Models\JobContacted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CategoryFormRequest;

class JobController extends Controller
{


    //function to Create Job Categories
    public function createCategory()
    {
        try{

            $data['title'] = "List of all job categories";
            $data['cat'] = JobCategory::latest()->get();
            return view('admin.category.index', $data);

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }


    //Function to store new job category
    public function storeCat(CategoryFormRequest $request)
    {
        try{

            $validateData = $request->validated();

            $category = new JobCategory();
            $category->name = $validateData['name'];
            $category->slug = Str::slug($validateData['slug']) ;
            // if($request->hasFile('image'))
            // {
            //     $file = $request->file('image');
            //     $filename = 'image_'. time() . '.' . $file->hashName();
            //     $file->move('uploads/category/', $filename);
            //     $category->image = $filename;
            // }

            $category->meta_title = $validateData['meta_title'];
            $category->meta_keyword = $validateData['meta_keyword'];
            $category->meta_description = $validateData['meta_description'];
            $category->status = $request->status == true ? '1':'0';
            $category->save();
            return redirect()->back()->with('message','Job Category Added Successfully');

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
        
    }

    //Function to Edit job Category
    public function editCat(CategoryFormRequest $request, int $id)
    {
        $validateData = $request->validated();

        $category = JobCategory::findOrFail($id);
        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']) ;
        // if($request->hasFile('image'))
        // {
        //     $path = 'uploads/category/'.$category->image;
        //     if(File::exists($path)){
        //         File::delete($path);
        //     }
        //     $file = $request->file('image');
        //     $filename = 'image_'. time() . '.' . $file->hashName();
        //     $file->move('uploads/category/', $filename);
        //     $category->image = $filename;
        // }

        $category->meta_title = $validateData['meta_title'];
        $category->meta_keyword = $validateData['meta_keyword'];
        $category->meta_description = $validateData['meta_description'];
        $category->status = $request->status == true ? '1':'0';
        $category->update();
        return redirect()->back()->with('message','Job Category Updated Successfully');

    }

    
    //Function to delete category
    public function destroyCat(int $id)
    {
        $category = JobCategory::findOrFail($id);
        // $destination_path = 'uploads/category/'.$category->image;
        //     if(File::exists($destination_path))
        //     {
        //         File::delete($destination_path);
        //     }

        $category->delete();
        return redirect()->back()->with('message','Data Deleted Successfully');
    }




    //Function for job types 
    public function createTypes(){

        try{

            $data['title'] = "List of all job types";
            $data['type'] = JobTypes::latest()->get();
            $data['category'] = JobCategory::orderBy('created_at','ASC')->where('status', '1')->get();
            return view('admin.types.index', $data);

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }


    //Function for storing Job types
    Public function storeTypes(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                'catId'=> 'required',
                'name'=> 'required|max:100|unique:job_types,name',
                'slug'=> 'required|string',
                'meta_title'=>'required|string',
                'meta_keyword'=>'required|string',
                'meta_description'=>'required|string',
            ]);
    
            if($validator->fails())
            {
                return response()->json([
                    'status'=>400,
                    'msg'=>$validator->errors()->first()
                ]);
            }
            else{
    
                $newJobType = new JobTypes();
                $newJobType->catId = $request->catId;
                $newJobType->name = $request->name;
                $newJobType->slug = Str::slug($request->slug);
                $newJobType->status = $request->status == true ? '1':'0';
                $newJobType->meta_title = $request->meta_title;
                $newJobType->meta_keyword = $request->meta_keyword;
                $newJobType->meta_description = $request->meta_description;
                // if($request->hasFile('product_image'))
                // {
                //     $file = $request->file('product_image');
                //     $filename = 'product_image_'. time() . '.' . $file->hashName();
                //     $file->move('uploads/product/', $filename);
                //     $product->product_image = $filename;
                // }
                $newJobType->save();
    
                return response()->json([
                    'status'=>200,
                    'message'=>'New Job Type Added Successfully',
                ]);
    
            }
    

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }



    //Function to fetch job Id type
    public function FetchProduct(int $id)
    {
        $jobId = JobTypes::find($id);
        if($jobId)
        {
            return response()->json([
                'status'=>200,
                'type'=>$jobId,
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'msg'=>'Job Type ID not Found',
            ]);
        }
    }


    //Function to update job type
    public function updateType(Request $request, int $typeId)
    {

        try{

            $validator = Validator::make($request->all(), [
                'catId'=> 'required',
                'name'=> 'required|max:100',
                'slug'=> 'required|string',
                'meta_title'=>'required|string',
                'meta_keyword'=>'required|string',
                'meta_description'=>'required|string',
            ]);
    
            if($validator->fails())
            {
                return response()->json([
                    'status'=>400,
                    'msg'=>$validator->errors()->first()
                ]);
            }
            else{
    
                $jobType = JobTypes::findOrFail($typeId);
                if($jobType){
    
                    $jobType->catId = $request->catId;
                    $jobType->name = $request->name;
                    $jobType->slug = Str::slug($request->slug);
                   
                    // if($request->hasFile('product_image'))
                    // {
                    //     $destination_path = 'uploads/product/'.$product->product_image;
                    //     if(File::exists($destination_path))
                    //     {
                    //         File::delete($destination_path);
                    //     }
                    //     $file = $request->file('product_image');
                    //     $filename = 'product_image_'. time() . '.' . $file->hashName();
                    //     $file->move('uploads/product/', $filename);
                    //     $product->product_image = $filename;
                    // }
    
                    $jobType->status = $request->status == true ? '1':'0';
                    $jobType->meta_title = $request->meta_title;
                    $jobType->meta_keyword = $request->meta_keyword;
                    $jobType->meta_description = $request->meta_description;
                    $jobType->save();
    
                    return response()->json([
                        'status'=>200,
                        'message'=>'Job Type Updated Successfully',
                    ]);
                }
                else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'Job Type Not Found',
                    ]);
                }
    
            }

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }


    //function to delete job types
    public function destroyType(int $id)
    {
        $jobTypes = JobTypes::find($id);
        if($jobTypes)
        {
            // $destination_path = 'uploads/product/'.$product->product_image;
            // if(File::exists($destination_path))
            // {
            //     File::delete($destination_path);
            // }
            $jobTypes->delete();
            return response()->json([
                'status'=>200,
                'msg'=>'All Job types Data Deleted Successfully',
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'msg'=>'Relative ID not Found',
            ]);
        }

    }



    //function for all Jobs posted by handyman
    public function allJobPosts(){

        try{

            $data['title'] = "List of all Posted Jobs";
            $data['Listing'] = Jobs::latest()->get();
            return view('admin.job_posting.index', $data);

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }



    //handy man Contaced for jobs
    
    public function allJobsContacted(){

        try{

            $data['title'] = "List of all Jobs Contacted by customers";
            $data['Listing'] = JobContacted::latest()->get();
            return view('admin.job_contacted.index', $data);

        }
        catch(Exception $e)
        {
            Log::error($e);
        }

    }


    //Fectching the description of customers job
    public function fetchDetails(int $id){

        try{

            $getDetails = JobContacted::findOrFail($id);
            
            if($getDetails)
            {
                return response()->json([
                    'status'=>200,
                    'description'=>$getDetails,
                ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Sorry ID Not Found',
                ]);
            }

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }



    //Processing Jobs 
    public function jobProcessing()
    {
        try{

            $data['title'] = "List of Jobs Accepted/Processing/Completed by HandyMen";
            $data['Listing'] = JobContacted::latest()->get();
            return view('admin.job_apc.index', $data);

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }


    //Rejected Jobs by Handymen
    public function jobRejected()
    {
        try{

            $data['title'] = "List of Jobs Rejected by HandyMen";
            $data['Listing'] = JobContacted::where('status', '2')->latest()->get();
            return view('admin.job_rejected.index', $data);

        }
        catch(Exception $e)
        {
            Log::error($e);
        }

    }


}
