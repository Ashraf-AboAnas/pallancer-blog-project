<?php

namespace App\Providers;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*if(Auth::user()->usertype=='admin')
        {
           // DatabaseNotification
           $notifications =  DatabaseNotification::orderBy('read_at','Asc')->get();//where('read_at','=',null)->get();
           $countNotifications =  DatabaseNotification::where('read_at','=',null)->get();
        // dd($notifications);
         // $notifications = Auth::user()->unreadNotifications;
            view()->share([
               'notifications'=>$notifications,
               'countNotifications'=>$countNotifications

            ]);
        }
        else if(Auth::user()->usertype=='writer'){
            //unread
            $notifications = auth()->user()->Notifications;
            view()->share(compact('notifications'));
        }*/
    }
}
