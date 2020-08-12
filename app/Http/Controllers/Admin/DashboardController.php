<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\catrgories;
use App\Models\Posts;
use App\Models\Abouts;
use Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


  public function maindashboard(){


    return view('admin.dashboard',[
      'user_count'=>User::all()->count(),
      'posts_count'=>Posts::all()->count(),
      'cat_count'=>Catrgories::all()->count()

      ]);
  }


    public function registered()
    {

        if(Auth::user()->usertype=='admin')
        {
        //    dd(Auth::user()->usertype);
        $user = User::latest()->get();

       // dd($user);
        return view('admin.indexregister', ['user' => $user]);
       }else {
       $user= Auth::user()->usertype;
        return redirect()
      ->route('admindashboard')
      ->with('alert.error'," YOU ARE  ({$user})  NoT ALLoW To YoU... \"DoNT TrY THiS ...\" !");
       }

     }

    public function registeredit(Request $request,$id)
    {
        if(Auth::user()->usertype=='admin')
        {
        //    dd(Auth::user()->usertype);
        $user = User::findOrFail($id);

       // dd($user);
       return view('admin.register-edit', [
         'user' => $user
          ]);

       }else {
       $user= Auth::user()->usertype;
        return redirect()
      ->route('admindashboard')
      ->with('alert.error'," YOU ARE  ({$user})  NoT ALLoW To YoU... \"DoNT TrY THiS ...\" !");
       }


        /********************** */

 //dd($user);



    }
/* ******************************************/

/********************************************* */




public function registerupdate(Request $request,$id){
//dd('ashash');
    $request->validate([
        'name'=>[
              'required',
              'string',
              'max:255',
              'min:3'],

              'phone'=>[
                'required',
                'min:10',
                'max:10'
                ],
                'email'=>[
                  'required',
                  'string'

                ],
                'usertype'=>[
                    'required',
                    'string',
                    'in:admin,user,writer'
                  ]

       ]);
       $user = User::findOrFail($id);
         $user->update([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'phone' => $request->post('phone'),
            'usertype' => $request->post('usertype')


          ]);
         // session()->flash('success','OK .ADDed') ;
         // return Redirect('role-register')->with('succsess',"The Name ({$user->name}) Updated!");  // ok

         return  Redirect::route('userslogin')
        ->with('alert.success',"The Name ({$user->name}) Updated!");





}
    public function roledestroy($id)
    {
     //Category::where('id',$id)->delete();//direct delete

      $user = User::findOrFail($id);//if you checked جمله استعلام +حذف

      if(Auth::user()->id==$user->id)
      {

        return Redirect::route('userslogin')
        ->with('alert.error',"{$user->name} Is Admin This Dshboard! Can Not be Deleted !!");
      }
      else
      {

      $user->delete();

      return redirect()
      ->route('userslogin')
      ->with('alert.success',"The Name ({$user->name}) Deleted!");

      }


    }

    public function makewriter(user $user)
{
    $user->usertype='writer';
    $user->save();
      return redirect()
      ->route('userslogin')
      ->with('alert.success'," COnvert Role   \"{$user->name}\" TO Is  WRITER !");

}


public function makeuser(user $user)
{
    $user->usertype='user';
    $user->save();
      return redirect()
      ->route('userslogin')
      ->with('alert.success'," COnvert Role TO\"{$user->name}\" TO Is  USER !");

}
}
