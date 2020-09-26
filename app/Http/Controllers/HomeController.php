<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function submitForm(Request $request)
    {
        $orders = new Orders;
            $orders->name = '123';
            $orders->phone = '321';
        $orders->save();
    }

    public function notifications()
    {
        return view('notifications');
    }

    public function crud()
    {
        return view('crud');
    }

    public function chat()
    {
        return view('chat');
    }

    
}