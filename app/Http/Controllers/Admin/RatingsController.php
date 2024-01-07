<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class RatingsController extends Controller
{
    public function handymanRatings()
    {
        try{

            $data['title'] = "List of HandyMen Ratings by Customers";
            $data['rating'] = ratings::latest()->get();
            return view('admin.ratings.index', $data);

        }
        catch(Exception $e)
        {
            Log::error($e);
        }
    }
}
