<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\MyEvent; // PUSHER

class PusherController extends Controller
{
    public function home()
    {
        event(new MyEvent('sieee'));
        return view('home');
    }
}
