<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HandyMenListController extends Controller
{
    public function index(){

        $data['title'] = "List of all handy men";
        $data['list'] = User::orderBy('created_at', 'DESC')->latest()->get();
        return view('admin.handymen.index', $data);
        
    }


    public function deleteHandyMan(int $handymanId) {
        
        $delHandyman = User::findOrFail($handymanId);
        if($delHandyman){

            $delHandyman->delete();
            return redirect()->back()->with('message', 'User deleted successfully..');
        }
        else{
            return redirect()->back()->with('error', 'User Id not found.');
        }

    }



    public function editProfile(int $id){

        $handyManId = $data['userProfile'] = User::findOrFail($id);
        return view('admin.handymen.edit_profile', $data);
        
    }





}
