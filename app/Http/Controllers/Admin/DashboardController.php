<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactMessages;
use App\Models\JobCategory;
use App\Models\Jobs;
use App\Models\JobTypes;

class DashboardController extends Controller
{
    public function index(){

        $data['title'] = "Administrator HandyMan";

        $data['users'] = User::select("*")
                        ->whereNotNull('last_seen')
                        ->orderBy('last_seen', 'DESC')
                        ->paginate(10);
       // $data['counter'] = Counter::find(1);

        $data['totalUsers'] = User::count();
        $data['totalActive'] = User::where('is_active', '1')->count();
        $data['totalBan'] = User::where('is_active', '0')->count();
        $data['totalCustomers'] = User::where('role_as', '2')->count();
        $data['totalHandyMen'] = User::where('role_as', '0')->count();
        $data['members'] = User::latest()->limit(4)->get();
        $data['jobPosted'] = Jobs::latest()->limit(8)->get();
        $data['contactUs'] = ContactMessages::latest()->limit(6)->get();
        $data['jobCategory'] = JobCategory::count();
        $data['jobType'] = JobTypes::count();


        

        // $data['totalDebits'] = Transaction::where('trac_type','Debit')->sum('amount');
        // $data['totalCredit'] = Transaction::where('trac_type','Credit')->sum('amount');
        // $data['totalcrypto'] = CryptoDebit::sum('amount');
        // $data['totalpaymentmethod'] = PaymentMethod::count();

        // $data['pendingDebit'] = Transaction::where('status', '0')->count();
        // $data['completeDebit'] = Transaction::where('status', '1')->count();

        // $data['message'] = Message::count();
        // $data['totalcryptoDebit'] = CryptoDebit::count();
        // $data['totalKyc'] = KYCVerify::count();
        // $data['currency'] = Currency::where('status', '1')->first();
        return view('admin.dashboard', $data);
    }
}
