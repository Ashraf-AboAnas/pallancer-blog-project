<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $profiles = Profiles::last()->get();
      // dd($profiles);

          return view('admin\profiles\edit', ['profiles' => $profiles]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id'=>[
                'unique',
                'int'

            ],
            'facebook'=>['string', 'email', 'max:255', 'unique:users'],

            'twitter'=>['string', 'email', 'max:255', 'unique:users'],
              'image' => 'image'
           ]);


            $image_path = null;
            if ($request->hasfile('image') && $request->file('image')->isvalid()) {
                $image = $request->file('image');
                $image_path = $image->store('profileimage', 'images');
            }
          $data = $request->all();
          $data['user_id']= Auth::user()->id;
          $data['image'] = $image_path;
          $profiles = Profiles::create($data);


            return Redirect::route('profiles.edit',Auth::user()->id)
            ->with('alert.success',"profiles Cerated!");

        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

      $profiles =$user->profile; //relations one to one get user from profiles
      if(Auth::user()->id===$profiles->user_id)
      {

       //dd($profiles);
        return View::make('admin.profiles.edit',
            [
                'user' => $user,
                'profiles'=>$profiles

            ]);

    }else{

        return redirect()
      ->route('admindashboard')
      ->with('alert.error',"  NoT ALLoW ... \"DoNT TrY THiS ...\" !");

    }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user,Request $request)
    {
        //dd($request->all());

      $profiles =$user->profile; //one to one Relations

        $request->validate([

            'user_id'=>['unique','int' ],
            'facebook'=>['string', 'max:255' ,'email'],
            'twitter'=>['string',  'max:255','email'],
            'city'=>['string',  'max:255'],
            'country'=>['string',  'max:255'],
              'image' => 'image'
           ]);

           $data = $request->except('image');
//dd( $data );
           if ($request->hasfile('image') && $request->file('image')->isvalid()) {
            $image = $request->file('image');

            if ($profiles->image && Storage::disk('images')->exists($profiles->image)) { //if image Exist or old image in product اذا كام المنتج الو صوره وبدك تعدل عليها

                $image_path = $image->storeAs('profileimage', basename($profiles->image), 'images'); // Updated new image same name pre-image(disk in public from file system)
            } else {
                //if not found old image -- save  New image and ne Name To Images Disk
                $image_path = $image->store('profileimage', 'images'); //storge disk
            }
            $data['image'] = $image_path;
        }

            $profiles->update($data);

            return Redirect::route('profiles.edit',Auth::user()->id)
            ->with('alert.success',"profiles Cerated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



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

                    ]

           ]);
           $user = User::findOrFail($id);
             $user->update([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'phone' => $request->post('phone')



              ]);
             // session()->flash('success','OK .ADDed') ;
             // return Redirect('role-register')->with('succsess',"The Name ({$user->name}) Updated!");  // ok

             return Redirect::route('profiles.edit',Auth::user()->id)
             ->with('alert.success',"User profiles Cerated Successfully!");




    }
}
