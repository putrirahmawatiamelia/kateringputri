<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        $totalUsers = User::count();
        $totalMerchants = User::where('role', 'merchant')->count();
        $totalCustomers = User::where('role', 'customer')->count();

        return view('dashboard', compact('totalUsers',  'totalMerchants', 'totalCustomers'));
    }

    public function merchantHome()
    {
        return view('dashboard');
    }
}
