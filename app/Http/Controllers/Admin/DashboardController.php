<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){

        $data['users'] = User::select("*")
                        ->whereNotNull('last_seen')
                        ->orderBy('last_seen', 'DESC')
                        ->paginate(10);
       // $data['counter'] = Counter::find(1);

        $data['totalUsers'] = User::count();
        $data['totalActive'] = User::where('is_active', '1')->count();
        $data['totalBan'] = User::where('is_active', '0')->count();
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
