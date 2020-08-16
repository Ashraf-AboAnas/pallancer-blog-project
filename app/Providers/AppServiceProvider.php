<?php

namespace App\Providers;
use Illuminate\Notifications\Notification;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\User;
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
        /*
        /*if(Auth::user()->usertype=='admin')
        {
           // DatabaseNotification*/
           $notifications =  DatabaseNotification::orderBy('created_at','Desc')->get();//where('read_at','=',null)->get();
           $countNotifications =  DatabaseNotification::where('read_at','=',null)->get();
               //$countNotifications_post =  DatabaseNotification::where ('type','=','App\Notifications\AddPost')->get();
        // dd($notifications);
         // $notifications = Auth::user()->unreadNotifications;
            view()->share([
               'notifications'=>$notifications,
               'countNotifications'=>$countNotifications

            ]);

        }/*
        else if(Auth::user()->usertype=='writer'){
            //unread
            $notifications = auth()->user()->Notifications;
            view()->share(compact('notifications'));
        }
        */
/*
        $userid = User::findOrFail(auth()->user()->id)->first();

        $user_type = User::select('usertype')->where('id',$userid)->first();
*/
        /*
        if($user_type =='admin')
        {
           // DatabaseNotification
           $notifications =  DatabaseNotification::orderBy('read_at','Asc')->get();//where('read_at','=',null)->get();
           $countNotifications =  DatabaseNotification::where('read_at','=',null)->get();
           //dd($notifications);
           //$notifications = $userid->unreadNotifications;
            view()->share([
               'notifications'=>$notifications,
               'countNotifications'=>$countNotifications

            ]);
        }
        */


}
