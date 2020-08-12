<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\HasDatabaseNotifications;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->usertype=='admin')
        {
           // DatabaseNotification
           $notifications =  DatabaseNotification::orderBy('read_at','Asc')->get();//where('read_at','=',null)->get();
           $countNotifications =  DatabaseNotification::where('read_at','=',null)->get();
        // dd($notifications);
         // $notifications = Auth::user()->unreadNotifications;
            return view('home',[
               'notifications'=>$notifications,
               'countNotifications'=>$countNotifications

            ]);
        }
        else if(Auth::user()->usertype=='writer'){
            //unread
            $notifications = auth()->user()->Notifications;
            return view('home',compact('notifications'));
        }

        else {
            return view('home');

        }

    }
}
