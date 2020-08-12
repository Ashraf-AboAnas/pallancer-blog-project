<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\HasDatabaseNotifications;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*** using  to front end page site  */
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/post/{posts}', 'SiglepageController@show')->name('singlepage');
/*** using  to front end page site  */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['auth','admin']],function ()
{
    // Route::get('logout', 'Auth\LoginController@logout')->name('logout');
  //  Route::get('login', 'Auth\LoginController@login')->name('login');

     Route::get('/dashboard', 'Admin\DashboardController@maindashboard')->name('admindashboard');

     Route::get('/role-register', 'Admin\DashboardController@registered')->name('userslogin');
     Route::get('/role-edit/{id}', 'Admin\DashboardController@registeredit')->name('useredit');
     Route::put('/role-register-update/{id}', 'Admin\DashboardController@registerupdate')->name('userupdate');

     Route::delete('/{id}/role-destroy', 'Admin\DashboardController@roledestroy')->name('userdelete');
    // ****************
    Route::put('/makewriter/{user}/makewriter','Admin\DashboardController@makewriter')->name('user.makewriter');
    Route::put('/makeuser/{user}/makeuser','Admin\DashboardController@makeuser')->name('user.makeuser');

    // *********

     /*******All Route About Us ************ */
     Route::resource('abouts','Admin\AboutsController');
     Route::get('/role-aboutedit/{id}', 'Admin\AboutsController@aboutedit')->name('aboutedit');
     /******* End All Route About Us ************ */

        /*******All Route services ************ */
        Route::resource('services','Admin\ServicesController');
       /******* End Route services ************ */
        /*******All Route tags ************ */
        Route::resource('tags','Admin\TagsController');
        /******* End Route tags ************ */
       /*******All Route catrgories ************ */
       Route::resource('categories','Admin\CatrgoriesController');
       /******* End Route catrgories ************ */

       /*******All Route posts ************ */
       Route::resource('posts','Admin\PostsController');
       Route::get('/postsedit/{id}', 'Admin\PostsController@postsedit')->name('postsedit');
       Route::get('/trashed-posts','Admin\PostsController@trashed')->name('trashed.index');

       Route::get('/restore-posts/{id}','Admin\PostsController@restore')->name('restore');
              /******* End Route posts ************ */
              /****View Composer ************* */
              view()->composer('[*]', function ($view) {
                $notifications =  DatabaseNotification::orderBy('read_at','Asc')->get();//where('read_at','=',null)->get();
                $countNotifications =  DatabaseNotification::where('read_at','=',null)->get();
             // dd($notifications);
              // $notifications = Auth::user()->unreadNotifications;
                 return view([
                    'notifications'=>$notifications,
                    'countNotifications'=>$countNotifications

                 ]);
              });
                /****End View Composer ************* */
});
Route::group(['middleware'=>['auth']],function ()
{
  // Route::resource('profiles','ProfilesController')->except(['edit','update']);
   Route::get('/profiles/{user}/edit','ProfilesController@edit')->name('profiles.edit');
   Route::put('/profiles/{user}/update','ProfilesController@update')->name('profiles.update');
   Route::put('/role-register-update/{id}', 'ProfilesController@registerupdate')->name('userprofileupdate');
});
