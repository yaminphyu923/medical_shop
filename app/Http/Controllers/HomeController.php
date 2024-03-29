<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\MedicalList;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $customer_count = Customer::count();
        $medicallist_count = MedicalList::count();
        $user_count = User::where('name','!=','MMcities')->count();
        return view('backend.dashboard',compact('customer_count','medicallist_count','user_count'));
    }
}
